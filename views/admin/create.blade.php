@extends('layouts.master')

@section('content')
<div class="col-xs-12">
    <div class="col-xs-4">
        <img src="img/map.png" class="img-responsive" />
    </div>
    <div class="col-xs-8">
        {{Form::open(['url'=>'admin/post' , 'method'=>'POST' ])}}
        <div class="col-xs-6">
            {{Form::text('title', null, array('class' => 'form-control','placeholder'=>'titre'))}}
            <br />
        </div>

        <div class="col-xs-12 text-right">
            {{Form::textarea('content', null, array('class' => 'form-control','placeholder'=>'contenu'))}}
            <br />

        </div>

        <div class="col-xs-12">
            <strong>blog_category :</strong>
            @foreach($categories as $cat)
                {{Form::label($cat->title, $cat->title)}}
                {{ Form::radio('category_id',$cat->id,true,['id'=>$cat->title])}}

            @endforeach

        </div>

        <div class="col-xs-12">
            <strong>blog_status :</strong>

            <span class='btn btn-success'>
                {{Form::label('publish', 'publish')}}
                {{Form::radio('status','publish',true,['id'=>'publish'])}}
                </span>
            <span class='btn btn-warning'>
                {{Form::label('unpublish', 'unpublish')}}
                {{Form::radio('status', 'unpublish',true,['id'=>'unpublish'])}}
                </span>
            <span class='btn btn-danger'>

                {{Form::label('trash', 'trash')}}
                {{Form::radio('status', 'trash',true,['id'=>'trash'])}}
             </span>
        </div>

        <div class="col-xs-12">

            {{Form::submit('Create', array('class' => 'btn btn-success'))}}

        </div>

        {{$errors->has('email')? $errors->first('email'):''}}
        {{Form::close()}}



    </div>
</div>
@stop
