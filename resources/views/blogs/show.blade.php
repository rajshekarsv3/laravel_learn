@extends('master.app')

@section('content')
<div class="blog">
<h3>{{$blog['title']}}</h3>
<p>{{$blog['description']}}</p>
</div>
<div class="comments">
@if (count($comments) > 0)
<h5>Comments</h5>
<ul style="list-style: none;">
@foreach ($comments as $comment)
    <li>{{ $comment['comment'] }}</li>
@endforeach
</ul>
@endif
<input type="text" id="new_comment"> <button id="add_comment">New Comment</button>
</div>
@stop

@section('script')
<script type="text/javascript">
	$("#add_comment").click(function(){
		if($("#new_comment").val().trim()==''){
			alert("comment cant be empty");
			return false;
		}
		$.ajax({
			"method":"post",
			"url":"/learn/api/blogs/{{$blog['id']}}/comments",
			"Content-Type":"application/json",
			"data":{
				"comment":$('#new_comment').val()
			},
			"success" : function(data){
					if(data.hasOwnProperty("errors")){
						alert("validation failed");
					}
					if(data.hasOwnProperty("success")){
						window.location="/learn/blogs/{{$blog['id']}}"
					}
				}
		});
	})
</script>
@stop
