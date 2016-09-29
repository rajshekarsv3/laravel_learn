@extends('master.app')

@section('content')
<h3>Create Blog</h3>
@include('blogs.shared.form') 
@stop

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$("#blog-submit").click(function(){
			if(not_valid()){
				alert("Title and Description should not be empty")
				return false;
			}
			$.ajax({
				"method": 'post',
				"url": '/learn/blogs',
				"Content-Type":"application/json",
				"data":{
					"_token": "{{ csrf_token() }}",
					"title":$("#title").val(),
					"description":$('#desc').val()
				},
				"success" : function(data){
						if(data.hasOwnProperty("errors")){
							alert("validation failed");
						}
						if(data.hasOwnProperty("success")){
							window.location="/learn/blogs"
						}
					}
			})
		})
	})
	function not_valid(){
		return (($("#title").val().trim()=='') || ($("#desc").val().trim()==''))
	}
</script>
@stop