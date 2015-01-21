@extends('layouts.master')
@section('header')
<a href="{{url('admin/trash')}}"" class="pull-right"><span class="glyphicon glyphicon-trash "></span>Corbeille</a>
<a href="{{url('admin/dashboard')}}"" class="pull-left"><span class="glyphicon"></span>Dashboard</a>

@stop
@section('content')
<div class="col-xs-12">
    <div class="text-center">
        <ul class="pagination">
            <li>{{$links}}</li>
    </div>
</div>
<div>

    <div class="panel panel-info">
        @if(isset($posts))

        {{Form::open(['url'=>'admin/status'])}}

        <div class="panel-heading">
            {{Form::submit('Envoyer', array('class' => 'btn btn-success'))}}
        </div>
        <div class="panel-body">
            {{Form::select('status', array('delete'=>'delete', 'publish' => 'publish','unpublish'=>'unpublish'), null, array('class' => 'form-control','placeholder'=>'Number'))}}
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>{{Form::checkbox('',null,null,['class'=>'action','id'=>'checkedAll'])}}</th>
                    <th>blog.see</th>
                    <th>Status</th>
                    <th>date de création</th>
                    <th>date de mise à jour</th>
                    <th>author</th>
                    <th>title</th>
                    <th>cathegories</th>
                    <th>tags</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th>{{Form::checkbox('posts[]',$post->id,null,['class'=>'action'])}}</th>
                    <th>vue</th>
                    <th>{{($post->status !== 'publish')?'<span class="btn btn-danger">'.$post->status.'</span>' : $post->status }}</th>
                    <th>{{$post->created_at}}</th>
                    <th>{{$post->updated_at}}</th>
                    <th>{{$post->user->username}}</th>
                    <th><a href="{{url('single/'.$post->slug.'/'.$post->id)}}">{{$post->title}}</a></th>
                    <th>{{$post->category->title}}</th>
                    <th>{{$post->tags}}</th>
                </tr>
                @endforeach


            </tbody>
        </table>
        {{Form::close()}}

        @else
        <p>desoller il n'y a pas de poste</p>
        @endif
    </div>

    <div class="text-center">
        <ul class="pagination">
            <li>{{$links}}</li>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('.action').each(function () {
            this.checked = false;
        });

        $('#checkedAll').on('click', function () {
            if (this.checked == true) {
                $('.action').each(function () {
                    this.checked = true;
                });
            } else {
                $('.action').each(function () {
                    this.checked = false;
                });
            }
        });
    });
</script>

@stop
