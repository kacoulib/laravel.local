@extends('layouts.master')

@section('content')
<div class="col-xs-12">
    <div class="col-xs-4">
        <img src="img/map.png" class="img-responsive" />
    </div>
    <div class="col-xs-8">
        {{Form::open(['url'=>''])}}
        <div class="col-xs-6">
            {{Form::text('nom', Input::old('nom'), array('class' => 'form-control','placeholder'=>'Nom et Prenom'))}}
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
            {{Form::select('Pays', array('disabled'=>'Disabled', 'France' => 'France','Pays-bas'=>'Pays-bas','autre'=>'...'), null, array('class' => 'form-control','placeholder'=>'Number'))}}
            <br />
        </div>

        <div class="col-xs-12 text-right">
            {{Form::textarea('message', null, array('class' => 'form-control'))}}
            <br />
            {{Form::submit('Envoyer', array('class' => 'btn btn-success'))}}

        </div>

        {{$errors->has('email')? $errors->first('email'):''}}
        {{Form::close()}}



    </div>
</div>
@stop
