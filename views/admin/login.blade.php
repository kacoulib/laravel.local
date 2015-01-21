@extends('layouts.master')

@section('content')
<div class="col-xs-12">
    
   
    <div class="col-xs-8">
        {{Form::open(['url'=>'login'])}}
        <div class="col-xs-6">
            {{Form::text('username', Input::old('username'), array('class' => 'form-control','placeholder'=>'Nom et Prenom'))}}
            <br />
        </div>

        <div class="col-xs-6">
            {{Form::password('password')}}
            <br />
        </div>

        <div class="col-xs-6">
            {{Form::checkbox('token', 'oui', true)}}
            <br />
        </div>
        
        <div class="col-xs-12 text-right">
            {{Form::submit('Envoyer', array('class' => 'btn btn-success'))}}

        </div>
        {{Form::close()}}

    </div>
</div>
@stop
