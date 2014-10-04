<?php
namespace english;
use BaseController;
use english\Word;
use english\Group;
use \Illuminate\Database\Eloquent\Collection;
class JsonController extends BaseController {

    public function allWords() {
        $group = \Input::get('group_id');
        if($group == null){
            return Word::all();
        } else {
            if(is_array($group)) {
                $groups = JsonController::array_to_sql_list($group);
                return Word::whereRaw("group_id in $groups")->get();
            }
            return Word::where('group_id', '=', $group)->get();
        }
    }

    public function userWords($box = null) {
        $groups = \Auth::user()->groups;
        $words = new Collection;
        foreach($groups as $group) {
            foreach($group->words as $word)
            {
                $words->add($word);
            }
        }

        $userWords = \Auth::user()->words;
        /* replace all the words, which are already in the list and also in user_word, to get the correct statistic numbers */
        $userWords->each(function($word) use ($words)
        {
            if($words->contains($word->id)){
                $words->find($word->id)->pivot = $word->pivot;
            }
        });

        $words = $this->sortById($words);
        if($box == null) {  /* if no box is selected, return all words the user has selected */
            return $words;

        } else {
            $results = new Collection;
            $words->each(function($word) use ($results, $groups, $box)
            {
                if($groups->contains($word->group_id) && $word->box == $box) {
                    $results->add($word);
                }
            });
            return $results;
        }
    }

    public function checkWord() {
        $id = \Input::get('word');
        $mode = \Input::get('mode');
        $value = \Input::get('value');

        $user = \Auth::user();
        $words = $user->words();
        $box = 1;
        $correct = 0;
        $wrong = 0;
        $foundWord = null;
        foreach($words->get() as $word) {
            if($word->id == $id) {
                $foundWord = $word;
                $box = $word->box;
                $correct = $word->correct;
                $wrong = $word->wrong;
                break;
            }
        }

        if($foundWord != null) {    /* remove the old relation*/
            $words->detach($id);
        } else {
            $foundWord = Word::find($id);
        }


        /* check the input */
        $correctValue = $foundWord->english;
        if($mode == 'english') {
            $correctValue = $foundWord->german;
        }
        $result = 'success';
        if(JsonController::correctInput($value, $correctValue)){
            $correct++;
            $box++;
        } else {
            $result = 'error';
            $wrong++;
            $box--;
        }

        /* add the new word */
        if($box < 1) { $box = 1; }
        $words->attach($id, array('box_level' => $box, 'correct' => $correct, 'wrong' => $wrong));

        /* create new box statistic */
        $jc = new JsonController();
        $words = $jc->userWords();
        $boxes = array();
        $countWords = 0;
        foreach($words as $word){
            $box = $word->box;
            if(!array_key_exists($box, $boxes)) {
                $boxes[$box] = 1;
            } else {
                $boxes[$box]++;
            }
            $countWords++;
        }
        ksort($boxes);

        $back = array(
            'result' => $result,
            'countWords' => $countWords,
            'boxes' => $boxes
        );
        return json_encode($back);
    }


    protected function array_to_sql_list($array) {
        return '(' . implode(',', $array) . ')';
    }

    protected function sortById($collection){
        return $collection->sortBy(function($object)
        {
            return $object->id;
        });
    }

    public static function correctInput($input, $correct){
        $input = str_replace(' ', '', $input);
        $correct = str_replace(' ', '', $correct);

        $input_array = explode("/",$input);
        $correct_array = explode("/",$correct);

        foreach ($input_array as $singleSolutionInput) {
            foreach($correct_array as $singleSolutionCorrect){
                similar_text(strtolower($singleSolutionInput), strtolower($singleSolutionCorrect), $percent);
                if($percent>=80) return(true);
            }
        }

        return(false);
    }

}
