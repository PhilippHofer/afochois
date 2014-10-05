@extends('english.layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Probetest</h3>
            {{ Form::open(array('url' => 'english/test_result', 'method' => 'post', 'class' => 'ui form segment')) }}
            <?php
            $random = 50;

            $groups = Auth::user()->groups;
            $counter = 0;
            foreach ($groups as $group) {
                echo '<table class="ui celled table segment">
                            <thead>
                                <tr>
                                    <th>Deutsch</th>
                                    <th>English</th>
                                </tr>   
                            </thead>
                            <tbody>';
                echo "<hr />";
                echo "<h5>" . $group->name . "</h5>";
                foreach ($group->words as $word) {
                    echo "<tr>";
                    $rand = rand(1, 100);
                    if ($random > $rand) {
                        echo "<td>" . $word->german . "</td>";
                        echo "<td><input type='text' name='input[]'/></td>";
                        echo "<input type='hidden' name='language[]' value='eng' />";
                    } else {
                        echo "<td><input type='text' name='input[]'/></td>";
                        echo "<input type='hidden' name='language[]' value='ger' />";
                        echo "<td>" . $word->english . "</td>";
                    }
                    $counter++;


                    echo "</tr>";
                }

                echo "</tbody></table>";
            }
            ?>
            <input type="submit" value="Auswerten" class="ui purple submit button"/>
            {{ Form::close() }}

        </div>
    </div>
</div>
@stop