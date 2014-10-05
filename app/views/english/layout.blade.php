@extends('layout')

@section('title_link')
<a href="/english">English</a>
@stop

@section('menu')
<li><a href="{{ URL::to('english/settings') }}">Einstellungen</a></li>
<li class="has-dropdown">
    <a href="{{ URL::to('english/learn') }}">Lernen</a>
    <ul class="dropdown">
        <li><a href="{{ URL::to('english/learn/list') }}">Liste</a></li>
        <li><a href="{{ URL::to('english/learn/train') }}">Trainieren</a></li>
        <li><a href="{{ URL::to('english/learn/practice') }}">Üben</a></li>
        <li><a href="{{ URL::to('english/learn/test') }}">Probetest</a></li>
    </ul>
</li>
<li><a href="{{ URL::to('english/stats') }}">Statistik</a></li>
@if(Auth::user() != null && Auth::user()->admin == 1)
<li><a href="{{ URL::to('english/admin') }}">Admin</a></li>
@endif
@stop