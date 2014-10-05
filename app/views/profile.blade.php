@extends('layout')

@section('content')

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            @if(Session::has('message'))
            <div class="ui {{ Session::get('status') }} message">
                <i class="close icon"></i>

                <div class="header">
                    {{ Session::get('message') }}
                </div>
            </div>
            @endif


            <h3>Eingeloggt als {{{ Auth::user()->username }}}</h3>
            <hr/>
            <h5>Passwort ändern</h5>
            {{ Form::open(array('url' => 'user/profile', 'method' => 'post', 'class' => 'ui form segment')) }}
            <div class="field">
                <label for="oldPW">aktuelles Passwort</label>

                <div class="ui left icon input">
                    <input type="password" placeholder="" name="oldPW" id="oldPW">
                    <i class="lock icon"></i>
                </div>
            </div>
            <div class="field">
                <label for="newPW1">neues Passwort</label>

                <div class="ui left icon input">
                    <input type="password" placeholder="" name="newPW1" id="newPW1">
                    <i class="lock icon"></i>
                </div>
            </div>
            <div class="field">
                <label for="newPW2">neues Passwort wiederholen</label>

                <div class="ui left icon input">
                    <input type="password" placeholder="" name="newPW2" id="newPW2">
                    <i class="lock icon"></i>
                </div>
            </div>
            <br><br>

            <input type="submit" class="ui blue submit button" value="Ändern"/>
            {{ Form::close() }}

        </div>
    </div>
</div>
@stop