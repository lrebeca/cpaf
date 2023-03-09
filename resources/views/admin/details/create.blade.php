@extends('adminlte::page')

@section('title', 'Añadir Información')

@section('content_header')
    <h1>Detalles</h1>
@stop

@section('content')
    <p>Agregue información para el evento </p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>'admin.details.store']) !!}

             <!-- Unidad organizadora -->
                <div class="form-group">
                    {!! Form::label('id_evento', 'Evento') !!}
                    
                    <select name="id_evento" id="" class="form-control">
                        <option value="">-- Seleccione un Evento --</option>
                        @foreach ($events as $event)
                            <option value="{{$event->id}}">{{$event->evento}}</option>
                        @endforeach
                    </select>
                </div>

                @error('id_evento')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            <!-- detalle  -->

                <div class="form-group">
                    {!! Form::label('detalle', 'Detalle') !!} 
                    {!! Form::textarea('detalle', null, ['class' => 'form-control', 'placeholder'=>'Ingrese los detalles del evento']) !!}
                </div>
                
                @error('detalle')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            <!-- link -->

                <div class="form-group">
                    {!! Form::label('link', 'Link') !!}
                    {!! Form::text('link', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el link']) !!}
                </div>

                @error('link')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            <br>
            {!! Form::submit('Crear actividad', ['class' => 'btn btn-info']) !!}
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
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        #costos{
            display: none;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
        .create( document.querySelector( '#detalle' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>

@stop