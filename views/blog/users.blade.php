@extends('layouts.master')
@section('content')
@if(!empty($user))
<div class="col-xs-2">
    <img class="avatar mini img-responsive" />
</div>

<div class="col-xs-2">
    <address>
        <strong>{{$user->username}}</strong><br />
        12 rue des machins<br />
        75000 Paris<br />
        <abbr title="phone">P:</abbr> 0123456789<br />
        <abbr title="email">@:</abbr> <a href="mailto:{{$user->email}}">{{$user->email}}</a><br />
    </address>
</div>
@if($user->posts->count()>0)
<h3>article</h3>
@foreach($user->posts as $post)
<p><a href="{{url('single/'.$post->slug.'/'.$post->id)}}">{{$post->title}}</a></p>
<p><small>{{$post->updated_at->format('d/m/Y h:i:s')}}</small></p>
@endforeach
@endif
@endif
@stop
