@extends('master.app')

@section('content')
@foreach ($blogs as $blog)
    <div>
    	<h4>
    		<a href="blogs/{{ $blog['id'] }}">{{ $blog['title'] }}</a>
    		<a href='#' class="btn btn-update">Update</a>
    		<a href='#' class="btn btn-delete">Delete</a>
    	</h4>
    </div>
@endforeach
@stop