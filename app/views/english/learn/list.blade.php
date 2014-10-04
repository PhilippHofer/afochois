@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabelliste</h3>
            
            <?php
                $groups = \Auth::user()->groups;

                foreach($groups as $group) {
                    echo "<hr />";
                    echo "<h5>".$group->name."</h5>";
                    echo '<table class="ui celled table segment">
                            <thead>
                                <tr>
                                    <th>Deutsch</th>
                                    <th>English</th>
                                </tr>   
                            </thead>
                            <tbody>';
                    foreach($group->words as $word)
                    {
                        echo "<tr>";
                            echo "<td>".$word->german."</td>";
                            echo "<td>".$word->english."</td>";

                        echo "</tr>";
                    }

                    echo "</tbody></table>";
                }
            ?>
                
            
            <hr/>
            
            </table>

            <a href="{{ \URL::to('english/learn') }}" class="ui blue submit button">Fertig</a>

        </div>
    </div>
</div>
@stop