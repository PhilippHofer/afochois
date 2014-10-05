@extends('layout')

@section('title_link')
<a href="/english">English</a>
@stop

@section('menu')
<li><a href="{{ URL::to('pizza/summary') }}">Übersicht</a></li>
@if(Auth::user() != null && Auth::user()->admin == 1)
<li><a href="{{ URL::to('english/admin') }}">Admin</a></li>
@endif
@stop