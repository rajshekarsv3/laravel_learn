@extends('master.app')

@section('content')
<div class="blog">
<h3>{{$blog['title']}}</h3>
<p>{{$blog['description']}}</p>
</div>
<div class="comments">
<h5>Comments</h5>
<ul>
@foreach ($comments as $comment)
    <li>{{ $comment['comment'] }}</li>
@endforeach
</ul>
</div>
@stop