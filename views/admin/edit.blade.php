@extends('layouts.master')

@section('content')
<div class="col-xs-12">
    <div class="col-xs-4">
        <img src="img/map.png" class="img-responsive" />
    </div>
    <div class="col-xs-8">
        {{Form::open(['url'=>'admin/post/'.$post->id , 'method'=>'PUT' ])}}
        <div class="col-xs-6">
            {{Form::text('title', $post->title, array('class' => 'form-control','placeholder'=>'titre'))}}
            <br />
        </div>

        <div class="col-xs-12 text-right">
            {{Form::textarea('content', $post->content, array('class' => 'form-control','placeholder'=>'contenu', 'value'=> $post->contenu))}}
            <br />

        </div>

        <div class="col-xs-12">
            <strong>blog_category :</strong>
            @foreach($categories as $cat)
            {{Form::label($cat->title, $cat->title)}}
            {{ ($cat->title == $post->category->title)? Form::radio('category_id', $cat->id,true,['id'=>$cat->title]) : Form::radio('category_id', $cat->id, null, ['id'=>$cat->title])}}

            @endforeach

        </div>

        <div class="col-xs-12">
            <strong>blog_status :</strong>
            @foreach($posts as $p)
            @if($p->status == 'publish')
                <span class='btn btn-success'>
             @elseif($p->status == 'unpublish')
                <span class='btn btn-warning'>

             @else
                <span class='btn btn-danger'>
             @endif
                {{Form::label($p->status, $p->status)}}
                {{ ($p->status == $post->status)? Form::radio('status', $post->status,true,['id'=>$p->status]) : Form::radio('status', $p->status, null, ['id'=>$p->status])}}
            </span>
            @endforeach
        </div>

        <div class="col-xs-12">

            {{Form::submit('Update', array('class' => 'btn btn-success'))}}

        </div>

        {{$errors->has('email')? $errors->first('email'):''}}
        {{Form::close()}}



    </div>
</div>
@stop
