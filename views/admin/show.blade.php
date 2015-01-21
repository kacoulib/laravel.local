@extends('layouts.master')
@section('content')
<div class="col-xs-12">
    <div>
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
        <li>{{$comment->username}}
            <br/>{{$comment->content}}
            <br/><small>{{$comment->updated_at}}</small>
        </li>
        @endforeach
        @endif
        @endif
    </div>
    <div class="col-xs-8">
        {{($errors->has('email') ? '<p class="col-xs-8">'.$errors->first('email').'</p>' : '')}}
        {{($errors->has('username') ? '<p>'.$errors->first('username').'</p>' : '')}}
        </br>

        {{Form::open(['url'=>'comment'])}}
        <div class="col-xs-6">
            {{Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder'=>'Nom et Prenom'))}}
            <br />
        </div>

        <div class="col-xs-6">
            {{Form::text('email', Input::old('email'), array('class' => 'form-control','placeholder'=>'Email (*)','required'=>'required'))}}
            <br />
        </div>

        <div class="col-xs-6">
            {{Form::number('number', Input::old('number'), array('class' => 'form-control','placeholder'=>'Number'))}}
            <br />
        </div>

        <div class="col-xs-6">
            {{Form::select('Pays', array('France' => 'France','Pays-bas'=>'Pays-bas','autre'=>'...'), null, array('class' => 'form-control','placeholder'=>'Number'))}}
            <br />
        </div>

        <div class="col-xs-12 text-right">
            {{Form::textarea('content', null, array('class' => 'form-control'))}}
            <br />
            {{Form::submit('Envoyer', array('class' => 'btn btn-success'))}}

            {{Form::hidden('post_id', $post->id)}}

        </div>

        {{$errors->has('email')? $errors->first('email'):''}}
        {{Form::close()}}
    </div>
</div>


@stop
