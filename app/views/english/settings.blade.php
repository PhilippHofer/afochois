@extends('english.layout')

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


            <h3>Englisch Einstellungen</h3>
            <hr/>
            <h5>Vokabelgruppen</h5>
            {{ Form::open(array('url' => 'english/settings', 'method' => 'post', 'class' => 'ui form segment')) }}
            <?php
            use english\Group;

            $groups = Group::all();
            $i = 1;
            foreach ($groups as $group) {
                $checked = '';
                foreach ($group->users as $user) {
                    if ($user->id == Auth::user()->id)
                        $checked = 'checked';
                }
                ?>
                <div class="inline field">
                    <div class="ui toggle checkbox">
                        <input tabindex="{{$i}}" name="group[]" id="group{{$i}}" type="checkbox" value="{{$group->id}}"
                        {{$checked}}/>
                        <label for="group{{$i}}">{{{ $group->name }}}</label>
                    </div>
                </div>
                <?php
                $i = $i + 1;
            }
            ?>

            <hr/>

            <input type="submit" class="ui blue submit button" value="Speichern"/>

            {{ Form::close() }}

    </div>
</div>
@stop