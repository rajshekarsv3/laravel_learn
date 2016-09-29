@extends('master.app')

@section('content')
@foreach ($blogs as $blog)
    <div id="row_{{$blog['id']}}" class="row">    	
    		<div><a href="blogs/{{ $blog['id'] }}">{{ $blog['title'] }}</a></div>
    		<div><a href="blogs/{{ $blog['id'] }}/edit" class="btn btn-update">Update</a></div>
    		<a href="#" id="delete_{{$blog['id']}}" data-id="{{$blog['id']}}" class="btn btn-delete">Delete</a>
    </div>
@endforeach
<a href="blogs/create" class="btn btn-create">Create Blog</a>
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('[id^=delete_]').click(function(event){
			var blog_id = $(this).data('id');
			event.preventDefault();
			$.ajax({
				"method":"delete",
				"url":"/learn/api/blogs/"+$(this).data('id'),
				"success":function(data){
					$("#row_"+blog_id).hide();
					alert("Deleted Successfully");
				}
			})
		})
	});
</script>
@stop