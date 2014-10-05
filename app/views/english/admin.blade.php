@extends('english.layout')

@section('scripts')
{{ HTML::script('js/admin.js') }}

@show

@section('content')
<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            @if(Auth::user() != null && Auth::user()->admin == 1)
            <h1>Admin</h1>

            <div class="ui accordion">
                <div class="active title">
                    <i class="dropdown icon"></i>
                    Groups
                </div>
                <div class="active content">
                    <table class="ui table segment" id="wholeTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $groups = english\Group::all();
                        foreach ($groups as $group) {
                            echo "<tr id='row" . $group->id . "''>";
                            echo "<td><div id=" . $group->id . ">" . $group->name . "</div></td>";
                            echo '<td><div id="edit' . $group->id . '"><div class="ui button" onclick="editGroup(' . $group->id . ');"><i class="edit icon"></i></div></div></td>';
                            echo '<td><div class="ui button" onclick="deleteGroup(' . $group->id . ');"><i class="remove icon"></i></div></td>';
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="3">
                                <div id="insertGroupTextField"></div>
                                <div id="insertGroupButton">
                                    <div class="ui blue labeled icon button" onclick="insertGroup();"><i
                                            class="lab icon"></i> Add Group
                                    </div>
                                </div>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="title">
                    <i class="dropdown icon"></i>
                    Vocabulary
                </div>


                <div class="content">
                    <div class="ui selection dropdown">
                        <input id="selectAGroup" value="0" name="selectAGroup" type="hidden">

                        <div class="text">Select your category</div>
                        <i class="dropdown icon"></i>

                        <div class="menu">
                            <?php
                            $groups = english\Group::all();
                            foreach ($groups as $group) {
                                echo '<div class="item" data-value="' . $group->id . '">' . $group->name . '</div>';
                            }
                            ?>

                        </div>
                    </div>
                    <br/><br/>

                    <input id="uploadFile" name="uploadFile" type="file" size="50" maxlength="100000" accept="*.csv">

                    <div class="ui vertical labeled icon buttons" onclick="uploadCsv();">
                        <div class="ui button">
                            <i class="file icon"></i>Upload CSV
                        </div>
                    </div>
                </div>
            </div>
            @else
            <h2>Keine Berechtigung</h2>
            <hr/>
            Du hast keine Berechtigung, diese Seite aufzurufen!
            @endif


        </div>
    </div>
</div>

@stop