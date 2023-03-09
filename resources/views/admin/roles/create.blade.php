@extends('adminlte::page')

@section('title', 'Crear Rol')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <p>Cree un nuevo rol</p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>'admin.roles.store']) !!}

                @include('admin.roles.partials.form')

            <br>
            {!! Form::submit('Crear Rol', ['class' => 'btn btn-warning']) !!}
            <br>

            {!! Form::close() !!}
        </div>        
    </div>

    <div class="card-header">
        <a href="javascript: history.go(-1)">Volver</a><br><br>
    </div>

@stop

@section('css')
    
@stop

@section('js')
    
@stop