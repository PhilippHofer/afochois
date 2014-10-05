@extends('layout')

@section('scripts')
<script type="text/javascript">var percent = 50;</script>
{{ HTML::script('js/practice.js') }}

@show

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabeln üben</h3>
            <hr/>

            <?php
            $jc = new english\JsonController();
            $words = $jc->userWords();
            $boxes = array();
            $countWords = 0;
            foreach ($words as $word) {
                $box = $word->box;
                if (!array_key_exists($box, $boxes)) {
                    $boxes[$box] = 1;
                } else {
                    $boxes[$box]++;
                }
                $countWords++;
            }
            ksort($boxes);
            ?>

            <div id="boxes">
                @foreach($boxes as $key => $value)
                <div class="row">
                    <div class="small-12 medium-2 large-2 column">
                        Stufe {{$key}}: {{$value}}/{{$countWords}}
                    </div>
                    <div class="small-12 medium-6 large-8 column">
                        <div class="ui blue progress">
                            <div class="bar" style="width: {{($value/$countWords)*100}}%;">
                            </div>
                        </div>
                    </div>
                    <div class="small-12 medium-4 large-2 column">
                        <a class="ui green submit button" onclick="chooseBox({{$key}})">Üben</a>
                    </div>
                </div>
                @endforeach
            </div>


            <hr/>
            <div class="row">
                <div class="small-12 column" id="practiceContent">
                    <div id="error" style="display: none" class="ui error message">
                        <i class="close icon"></i>

                        <div id="errorContent" class="header"></div>
                    </div>
                    <div id="success" style="display: none" class="ui success message">
                        <i class="close icon"></i>

                        <div id="successContent" class="header"></div>
                    </div>
                    <div id="text">
                        Bitte wähle eine Stufe aus.
                    </div>
                    <div class="row">
                        <div class="small-12 column">
                            <h4 id="currBox"></h4>
                        </div>
                    </div>
                    <div class="row" id="inputForm" style="display: none">
                        <div class="small-12 medium-3 column small-text-left medium-text-right">
                            <h5 id="word"></h5>
                        </div>
                        <div class="small-12 medium-6 column">
                            <div class="ui fluid action input">
                                <input type="text" id="wordInput"/>
                            </div>
                        </div>
                        <div class="small-12 medium-3 column">
                            <div class="ui green right labeled icon button" onclick="submitWord()">
                                <i class="checkmark icon"></i>
                                Prüfen
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>

            <a href="{{ URL::previous() }}" class="ui green submit button">Zurück</a>
        </div>
    </div>
</div>
@stop