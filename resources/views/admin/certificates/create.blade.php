@extends('adminlte::page')

@section('title', 'Crear Certificado')

@section('content_header')
    <h1>Crear un nuevo certificado</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        {!! Form::open(['route'=>'admin.certificates.store', 'files' => true]) !!}

            @include('admin.certificates.partials.form')

        <br>
        {!! Form::submit('Crear Certificado', ['class' => 'btn btn-primary']) !!}
        <br>

        {!! Form::close() !!}
    </div>        
</div>

<div class="card-header">
    <a href="javascript: history.go(-1)">Volver</a><br><br>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

    {{-- para el select --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
    {{-- para el select --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@stop