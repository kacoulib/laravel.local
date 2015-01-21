@extends('layouts.master')
@section('header')
    @parent 
    <h1>Articles:</h1>
@stop

@section('content')
    @if(count($posts)>1)
    
        @foreach($posts as $post)
            <a href="{{url('single/'.$post->slug.'/'.$post->id)}}"><h2>{{$post['title']}}</h2></a>
            
            
        @endforeach
    @else
        <p>Desolé pas d'article pour l'instant</p>
    @endif
@stop

@section('sidebar')
    @parent 
@stop

@section('footer')
    @parent 
@stop