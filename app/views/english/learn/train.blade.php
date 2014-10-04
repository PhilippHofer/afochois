@extends('layout')

@section('scripts')
<script>

    $("#words li div").each(function(){
        var biggestHeight = 0;
        $(this).children().each(function(){
            if ($(this).height() > biggestHeight ) {
                biggestHeight = $(this).height();
            }
        });
        $(this).height(biggestHeight);
        $(this).children().each(function(){
            $(this).height(biggestHeight);
        });
    });

</script>
@show

@section('content')
<style>

ul li{
    padding-bottom: 5px !important;
}

.ui.reveal{
	position:relative;
    width: 100%;
}
.hidden.content{
	position: absolute;
    display: block;
    background-color: white;
    width: 100%;
}
.visible.content{
    position: relative;
    display: block;
    width: 100%;
}
</style>

<div class="row">
    <div class="small-12 small-centered column">
        <div class="ui segment">
            <h3>Vokabeln Trainieren</h3>
            <?php
            	$groups = Auth::user()->groups;
                $counter = 0;

                foreach($groups as $group) {
                    echo "<hr /><h5>".$group->name."</h5>";
                    echo '<ul id="words" class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">';
                	foreach($group->words as $word){
                		echo '<li><div class="ui fade reveal">';
                		echo '<span class="visible content">'.$word->german.'</span>';
                		echo '<span class="hidden content">'.$word->english.'</span>';
                		echo '</div></li>';
                	}
                    echo '</ul>';
                }

            ?>
			<br /><br />
            <a href="{{ URL::to('english/learn') }}" class="ui teal submit button">Fertig</a>
        </div>
    </div>
</div>



@stop