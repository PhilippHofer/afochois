@extends('english.layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Statistik</h3>
            <hr/>

            <div class="row">
                <div class="small-12 medium-2 large-2 column">
                    <div class="ui orange secondary vertical pointing menu" style="width: 110%;">
                        <div class="header item">
                            <i class="user icon"></i>
                            Benutzer
                        </div>
                        <a class="@if($active=='user-percentage') active @endif item"
                           href="{{{ URL::to('english/stats/user-percentage') }}}">Richtige Wörter</a>
                        <a class="@if($active=='user-difference') active @endif item"
                           href="{{{ URL::to('english/stats/user-difference') }}}">Richtig/Falsch Differenz</a>
                        <a class="@if($active=='user-practiced') active @endif item"
                           href="{{{ URL::to('english/stats/user-practiced') }}}">Wörter geübt</a>
                        <a class="@if($active=='user-box') active @endif item"
                           href="{{{ URL::to('english/stats/user-box') }}}">Höchste Wortstufe</a>

                        <div class="header item">
                            <i class="book icon"></i>
                            Wörter
                        </div>
                        <a class="@if($active=='word-hard') active @endif item"
                           href="{{{ URL::to('english/stats/word-hard') }}}">Schwierigstes Wort</a>
                        <a class="@if($active=='word-easy') active @endif item"
                           href="{{{ URL::to('english/stats/word-easy') }}}">Einfachstes Wort</a>
                        <a class="@if($active=='word-practiced') active @endif item"
                           href="{{{ URL::to('english/stats/word-practiced') }}}">Am öftesten geübtes Wort</a>
                    </div>
                    <br/><br/>

                </div>
                <div class="small-12 medium-10 large-10 column">
                    <table class="ui celled table segment">
                        <thead>
                        <th class="one wide">#</th>
                        @foreach($header as $value => $class)
                        <th class="{{{ $class }}}">{{{ $value }}}</th>
                        @endforeach
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $i }}.</td>
                            @foreach($colNames as $col)
                            <td>{{{ str_replace('/', ' / ', $row->$col) }}}</td>
                            @endforeach
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop