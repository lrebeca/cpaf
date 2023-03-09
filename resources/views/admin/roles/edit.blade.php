@extends('adminlte::page')

@section('title', 'Editar Rol')

@section('content_header')
    <h1>Editar el rol</h1>
@stop

@section('content')
    <p>Cree un nuevo rol</p>

    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($role, ['route'=> ['admin.roles.update', $role], 'method' => 'put']) !!}

                @include('admin.roles.partials.form')

            <br>
            {!! Form::submit('Actualizar', ['class' => 'btn btn-warning']) !!}
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