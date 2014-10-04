function editGroup(counter){
    var text = $("#"+counter).text();
    //$("#"+counter).text("");
    $("#"+counter).empty().append('<input id="input'+counter+'" type="text" value="'+text+'"/>');
    $("#edit"+counter).empty().append('<div class="ui button"onclick="saveGroup('+counter+');"><i class="save icon"></i></div>');
    }

function saveGroup(counter){
    var text = $("#input"+counter).val();
    $("#edit"+counter).empty().append('<div class="ui button"onclick="editGroup('+counter+');"><i class="edit icon"></i></div>');
    $("#"+counter).empty().append(text);
    $.ajax({
        type: 'PUT',
        url: 'group/' + counter,
        data: { to: text}
    }).done(function( data ) {
        location.reload();
    });
}

function deleteGroup(counter){
    if(!confirm("Wollen sie diese Gruppe wirklich löschen?"))
        return;
    $('#row'+counter).remove();
    $.ajax({
        type: 'DELETE',
        url: 'group/' + counter,
    }).done(function( data ) {
        location.reload();
    });
}

function insertGroup(){
    $("#insertGroupTextField").empty().append('<input id="insertGroupText" type="text"/>');
    $("#insertGroupButton").empty().append('<div class="ui blue labeled icon button" onclick="insertGroupReally();"><i class="save icon"></i> Add Group</div>');

    }

function insertGroupReally(){
    var text = $("#insertGroupText").val();

    $("#insertGroupTextField").empty();
    $("#insertGroupButton").empty().append('<div class="ui blue labeled icon button" onclick="insertGroup();"><i class="lab icon"></i> Add Group</div>');

    $.ajax({
        type: 'POST',
        url: 'group',
        data: { name: text }
    }).done(function( data ) {
        location.reload();
    });
}

function uploadCsv(){
    //Retrieve the first (and only!) File from the FileList object
    var f = document.getElementById("uploadFile").files[0];

    if (f) {
        var r = new FileReader();
        r.onload = function(e) {
            var contents = e.target.result;
            parseCsv(contents);
        }
        r.readAsText(f,'UTF-8');
    } else {
    alert("Failed to load file");
    }
}

function parseCsv(content){
    var group = $("#selectAGroup").val();
    var lines = content.split("\n");
    for(var i = 0;i<lines.length;i++){
        var match = lines[i];
        var keyValue = match.split(";");

        var german = keyValue[0];
        var english = keyValue[1];

        insertVocab(group,german,english);
    }
}

function insertVocab(group, german, english){
    $.ajax({
        type: 'POST',
        url: 'insert-vocab',
        data: { group: group, german: german, english: english }
    });
}