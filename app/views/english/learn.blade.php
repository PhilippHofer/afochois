@extends('english.layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabeln lernen</h3>
            <hr/>

            <ul id="learn-list" class="small-block-grid-1 medium-block-grid-2 large-block-grid-4" data-equalizer>
                <li>
                    <div class="ui raised segment" data-equalizer-watch>
                        <div class="ui blue ribbon label">Liste</div>
                        <p>Lerne die Vokabeln alle aufgelistet in einer Liste.</p>
                        <a href="{{ URL::to('english/learn/list') }}" class="ui blue submit button">Start</a>
                    </div>
                </li>
                <li>
                    <div class="ui raised segment" data-equalizer-watch>
                        <div class="ui teal ribbon label">Trainieren</div>
                        <p>Lerne die Vokabeln, indem zuerst immer das deutsche Wort erscheint und danach durch klicken
                            das englische. </p>
                        <a href="{{ URL::to('english/learn/train') }}" class="ui teal submit button">Start</a>
                    </div>
                </li>
                <li>
                    <div class="ui raised segment" data-equalizer-watch>
                        <div class="ui green ribbon label">Üben</div>
                        <p>Lerne die Vokabeln, indem du sie selbst der Reihe nach eingibst.</p>
                        <a href="{{ URL::to('english/learn/practice') }}" class="ui green submit button">Start</a>
                    </div>
                </li>
                <li>
                    <div class="ui raised segment" data-equalizer-watch>
                        <div class="equalheight"></div>
                        <div class="ui purple ribbon label">Probetest</div>
                        <p>Fülle alle Vokablen aus und überprüfe am Ende, wieviel Prozent du richtig hast.</p>
                        <a href="{{ URL::to('english/learn/test') }}"
                           class="cta-button ui purple submit button">Start</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</div>
@stop