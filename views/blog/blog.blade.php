@extends('layouts.master')
@section('content')
<div class="col-xs-9">
    <div>
        @if(!empty($posts))
        @foreach($posts as $post)
        <h2>{{$post->title}}</h2>
        <p>{{$post->content}}</p>
        <ul class="list-inline text-right">
            <li><a href="{{url('comments/'.$post->slug.'/'.$post->id)}}" >Commenter</a></li>
            <li><a href="{{url('comments')}}" >Editer</a></li>
            <li><a href="{{url('single/'.$post->slug.'/'.$post->id)}}" >Lire la suite</a></li>
        </ul>


        @endforeach
        @endif
    </div>
</div>
@stop