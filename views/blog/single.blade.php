@extends('layouts.master')

@if(!empty($post))
    <h2>{{$post->title}}</h2>
    <p>{{$post->content}}</p>
    @if(isset($post->link_thumbnail))
    <div class="thumbnail">
        <img src="{{url('img/'.$post->link_thumbnail)}}" alt=""/>
    </div>

    @endif
    <p>auteur : <a href="{{url('users/'.$post->user->id)}}">{{$post->user->username}}</a></p>

    @if(isset($comments))
    comments : {{$comments->count()}}
    @foreach($comments as $comment)
        </br>{{$comment->username}} : {{$comment->content}}
    @endforeach

    @endif
@endif
