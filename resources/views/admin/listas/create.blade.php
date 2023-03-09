@extends('adminlte::page')

@section('title', 'Crear lista')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Lista {{$event->evento}}</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.readys.store']) !!}

            {!! Form::hidden('event_id', $event->id) !!}

        {{-- Nombre lista --}}
        <div class="form-group">
            {!! Form::label('nombre', 'Lista') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder'=>'Lista 1']) !!}
        </div>

        @error('nombre')
            <span class="text-danger">{{$message}}</span>
        @enderror


         {{-- Detalle --}}
         <div class="form-group">
            {!! Form::label('detalle', 'Detalle de la lista') !!}
            {!! Form::text('detalle', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el detalle ']) !!}
        </div>

        @error('detalle')
            <span class="text-danger">{{$message}}</span>
        @enderror
        
        <br>
        {!! Form::submit('Crear', ['class' => 'btn btn-outline-primary']) !!}

        {!! Form::close() !!}
    </div>        
</div>

@stop

@section('css')

@stop

@section('js')

@stop