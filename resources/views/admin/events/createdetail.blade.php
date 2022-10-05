@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <center><h1>{{$event->evento}}</h1></center>
@stop

@section('content')
    <p> Cree nuevo detalle</p>

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route'=>'admin.details.store']) !!}

             <!-- Unidad organizadora -->
                <div class="form-group">

                    {!! Form::hidden('id_evento', $event->id) !!}
                    
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
            {!! Form::submit('Crear actividad', ['class' => 'btn btn-primary']) !!}
            <br>

            {!! Form::close() !!}
        </div>        
    </div>

    <div class="card-header">
        <a href="javascript: history.go(-1)">Volver</a> <br><br>
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

        // Para cambiar la imagen
        document.getElementById("imagen").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("img").setAttribute('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
        
        //Para mostrar los costos 
        function mostrarCosto(){
            document.getElementById('costos').style.display = 'block'; 
        }
        function ocultarCosto(){
            document.getElementById('costos').style.display = 'none'; 
        }
    </script>

@stop