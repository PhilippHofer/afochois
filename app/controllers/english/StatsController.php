<?php
namespace english;
use BaseController;
use \View;
use \DB;
class StatsController extends BaseController {

	public function getIndex()
	{
		return $this->getUserPercentage();
	}


    /* correct words in percent */
    public function getUserPercentage(){
        $sql ="select u.id, u.username, sum(correct) correct, sum(wrong) wrong, concat(round(100*sum(correct)/(sum(correct) + sum(wrong)), 2), '%') percentage from users u, user_word p where u.id = p.user_id group by u.id, u.username order by sum(correct)/(sum(correct) + sum(wrong)) desc, sum(correct) desc;";
        $result = DB::select(DB::raw($sql));

        $header = array('Name' => 'nine wide', 'Richtig' => 'two wide', 'Falsch' => 'two wide', 'Prozent' => 'two wide');
        $colNames = array('username', 'correct', 'wrong', 'percentage');
        return View::make('english.stats')
            ->with('header', $header)
            ->with('colNames', $colNames)
            ->with('data', $result)
            ->with('active', 'user-percentage');
    }

    /* difference between correct words and wrong words */
    public function getUserDifference(){
        $sql ="select u.id, u.username, sum(correct) correct, sum(wrong) wrong, sum(correct)-sum(wrong) difference  from users u, user_word p where u.id = p.user_id group by u.id, u.username order by difference desc;";
        $result = DB::select(DB::raw($sql));

        $header = array('Name' => 'nine wide', 'Richtig' => 'two wide', 'Falsch' => 'two wide', 'Differenz' => 'two wide');
        $colNames = array('username', 'correct', 'wrong', 'difference');
        return View::make('english.stats')
            ->with('header', $header)
            ->with('colNames', $colNames)
            ->with('data', $result)
            ->with('active', 'user-difference');
    }

    /* count all practiced words */
    public function getUserPracticed(){
        $sql ="select u.id, u.username, sum(correct)+sum(wrong) practiced from users u, user_word p where u.id = p.user_id group by u.id, u.username order by practiced desc;";
        $result = DB::select(DB::raw($sql));

        $header = array('Name' => 'nine wide', 'Geübte Wörter' => 'six wide');
        $colNames = array('username', 'practiced');
        return View::make('english.stats')
            ->with('header', $header)
            ->with('colNames', $colNames)
            ->with('data', $result)
            ->with('active', 'user-practiced');
    }

    /* the user who has the word with the highest box level */
    public function getUserBox(){
        $sql ="select u.id, u.username, max(box_level) level from users u, user_word p where u.id = p.user_id group by u.id, u.username order by level desc;";
        $result = DB::select(DB::raw($sql));

        $header = array('Name' => 'nine wide', 'Höchste Stufe' => 'six wide');
        $colNames = array('username', 'level');
        return View::make('english.stats')
            ->with('header', $header)
            ->with('colNames', $colNames)
            ->with('data', $result)
            ->with('active', 'user-box');
    }

    /* the word which was wrong the most times */
    public function getWordHard(){
        $sql ="select w.id, w.german, w.english, sum(correct) correct, sum(wrong) wrong, concat(round(100*sum(wrong)/(sum(correct) + sum(wrong)), 2), '%') percentage from words w, user_word p where w.id = p.word_id group by w.id, w.german, w.english order by 100*sum(wrong)/(sum(correct) + sum(wrong)) desc, sum(wrong) desc limit 30;";
        $result = DB::select(DB::raw($sql));

        $header = array('Deutsch' => 'four wide', 'Englisch' => 'four wide', 'Richtig' => 'two wide', 'Falsch' => 'two wide', 'Prozent Falsch' => 'three wide');
        $colNames = array('german', 'english', 'correct', 'wrong', 'percentage');
        return View::make('english.stats')
            ->with('header', $header)
            ->with('colNames', $colNames)
            ->with('data', $result)
            ->with('active', 'word-hard');
    }

    /* the word which was correct the most times */
    public function getWordEasy(){
        $sql ="select w.id, w.german, w.english, sum(correct) correct, sum(wrong) wrong, concat(round(100*sum(correct)/(sum(correct) + sum(wrong)), 2), '%') percentage from words w, user_word p where w.id = p.word_id group by w.id, w.german, w.english order by 100*sum(correct)/(sum(correct) + sum(wrong)) desc, sum(correct) desc limit 30;";
        $result = DB::select(DB::raw($sql));

        $header = array('Deutsch' => 'four wide', 'Englisch' => 'four wide', 'Richtig' => 'two wide', 'Falsch' => 'two wide', 'Prozent Richtig' => 'three wide');
        $colNames = array('german', 'english', 'correct', 'wrong', 'percentage');
        return View::make('english.stats')
            ->with('header', $header)
            ->with('colNames', $colNames)
            ->with('data', $result)
            ->with('active', 'word-easy');
    }

    /* the word which was correct the most times */
    public function getWordPracticed(){
        $sql ="select w.id, w.german, w.english, sum(correct) correct, sum(wrong) wrong, (sum(correct) + sum(wrong)) practiced from words w, user_word p where w.id = p.word_id group by w.id, w.german, w.english order by practiced desc limit 30";
        $result = DB::select(DB::raw($sql));

        $header = array('Deutsch' => 'four wide', 'Englisch' => 'four wide', 'Richtig' => 'two wide', 'Falsch' => 'two wide', 'Geübt' => 'three wide');
        $colNames = array('german', 'english', 'correct', 'wrong', 'practiced');
        return View::make('english.stats')
            ->with('header', $header)
            ->with('colNames', $colNames)
            ->with('data', $result)
            ->with('active', 'word-practiced');
    }


}
