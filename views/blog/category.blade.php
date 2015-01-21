@extends('layouts.master')

<h1>{{$title}}</h1>
@if(!empty($posts))
    @foreach($posts as $post)
            <br/><p><a href="{{url('single/'.$cat->slug.'/'.$cat->id)}}">{{$post->title}}</a></p>

    @endforeach
@endif
