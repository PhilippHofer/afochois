@extends('layout')

@section('content')

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Afochois</h3>
            <hr/>
            Coming soon
            <hr/>
            Seiten: <br/>
            <ul>
                <li><a href="{{ URL::to('english') }}">English</a></li>
                <li><a href="http://drive.google.com/folderview?id=0B54l2O_fJff4MWltUHc0bWIyS1E&usp=sharing" target="_blank">Google Docs</a></li>
                <li><a href="https://euterpe.webuntis.com/WebUntis/?school=htl-perg#main" target="_blank">Webuntis</a></li>
            </ul>
        </div>
    </div>
</div>
@stop