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

            <h3>Login</h3>
            {{ Form::open(array('url' => 'login', 'method' => 'post', 'class' => 'ui form segment')) }}
                <div class="field">
                    <label for="username">Name</label>
                    <div class="ui left icon input">
                        <input type="text" placeholder="Vorname Nachname" name="name" id="name">
                        <i class="user icon"></i>
                    </div>
                </div>
                <div class="field">
                    <label for="password">Passwort</label>
                    <div class="ui left icon input">
                        <input type="password" placeholder="" name="pw" id="pw">
                        <i class="lock icon"></i>
                    </div>
                </div>
                <br><br>

                <input type="submit" class="ui blue submit button" value="Login"/>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop