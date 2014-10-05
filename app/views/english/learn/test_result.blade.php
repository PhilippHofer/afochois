@extends('english.layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Probetest - Auswertung</h3>
            <?php
            use english\JsonController;

            $correct = 0;
            $wrong = 0;

            $language = Input::get('language');
            $input = Input::get('input');
            $groups = Auth::user()->groups;
            $words = array();
            $currGroup = 0;

            foreach ($groups as $group) {
                $i = 0;
                array_push($words, array());
                foreach ($group->words as $word) {
                    $word->input = $input[$i];
                    $word->mode = $language[$i];
                    if ($word->mode == 'ger') {
                        $inputTmp = $input[$i];
                        if (JsonController::correctInput($inputTmp, $word->german)) {
                            $correct++;
                            $word->result = 'correct';
                        } else {
                            $wrong++;
                            $word->result = 'wrong';
                        }

                    } else {
                        $inputTmp = $input[$i];
                        if (JsonController::correctInput($inputTmp, $word->english)) {
                            $correct++;
                            $word->result = 'correct';
                        } else {
                            $wrong++;
                            $word->result = 'wrong';
                        }
                    }
                    array_push($words[$currGroup], $word);
                    $i++;
                }
                $currGroup++;
            }

            if (($correct + $wrong) == 0) {
                $percentage = 100;
            } else {
                $percentage = round((($correct / ($correct + $wrong)) * 100), 2);
            }
            ?>
            Du hast {{{ $correct }}} von {{{ ($correct + $wrong) }}} Wörtern richtig! Das sind {{{ $percentage }}}%!
            <div class="ui blue progress">
                <div class="bar" style="width: {{{ $percentage }}}%;">
                </div>
            </div>

            <?php $currGroup = 0; ?>
            @foreach($groups as $group)
            <h5>{{{$group->name}}}</h5>
            <table class="ui celled table segment">
                <thead>
                <tr>
                    <td>Deutsch</td>
                    <td>English</td>
                </tr>
                </thead>
                <tbody>
                @foreach($words[$currGroup] as $word)
                <tr>
                    @if($word->result == 'correct')
                    @if($word->mode == 'ger')
                    <td class="testresult {{$word->result}}">{{{ $word->german }}}</td>
                    <td>{{{ $word->english }}}</td>
                    @else
                    <td>{{{ $word->german }}}</td>
                    <td class="testresult {{$word->result}}">{{{ $word->english }}}</td>
                    @endif
                    @else
                    @if($word->mode == 'ger')
                    <td class="testresult {{$word->result}}">
                        {{{ $word->input }}}
                        <span class="testresult solution"> Lösung: {{{ $word->german }}}</span>
                    </td>
                    <td>{{{ $word->english }}}</td>
                    @else
                    <td>{{{ $word->german }}}</td>
                    <td class="testresult {{$word->result}}">
                        {{{ $word->input }}}
                        <span class="testresult solution"> Lösung: {{{ $word->english }}}</span>
                    </td>
                    @endif
                    @endif

                </tr>
                @endforeach
                </tbody>
            </table>
            <?php $currGroup++; ?>
            @endforeach


        </div>
    </div>
</div>
@stop