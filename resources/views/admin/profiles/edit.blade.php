@extends('adminlte::page')

@section('title', 'Crear Perfil')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Crear Perfil</h1>
@stop

@section('content')

    <p>Usuario</p>
    <div class="card">
        <div class="card-body">

            {!! Form::model($user, ['route'=>['admin.profiles.update', $user], 'files' => true, 'method' => 'put']) !!}


            <!-- Usuario -->
            <div class="form-group">
                {!! Form::label('id_user', 'Usuario') !!}
                {!! Form::text('id_user', null, ['class' => 'form-control', 'placeholder' => '--- Seleccione su usuario ---']) !!}

            </div>

            @error('id_user')
                <span class="text-danger">{{$message}}</span>
            @enderror

            <!-- Correo -->
            <div class="form-group">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => '--- Seleccione su usuario ---']) !!}

            </div>

            @error('id_user')
                <span class="text-danger">{{$message}}</span>
            @enderror

        <!-- Profesión  -->

            <div class="form-group">
                {!! Form::label('suffix', 'Profesión') !!} 
                {!! Form::text('suffix', null, ['class' => 'form-control', 'placeholder'=>'Ej. Licenciado, Ingeniero, ......']) !!}
            </div>
            
            @error('suffix')
                <span class="text-danger">{{$message}}</span>
            @enderror

        <!-- Dirección  -->

        <div class="form-group">
            {!! Form::label('direccion', 'Dirección') !!} 
            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder'=>'Ingrese se dirección']) !!}
        </div>
        
        @error('direccion')
            <span class="text-danger">{{$message}}</span>
        @enderror

        <!-- Número de Celular  -->

        <div class="form-group">
            {!! Form::label('num_celular', 'Número de Celular') !!} 
            {!! Form::text('num_celular', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su número de celular']) !!}
        </div>
        
        @error('num_celular')
            <span class="text-danger">{{$message}}</span>
        @enderror

        <!-- Biografia  -->

        <div class="form-group">
            {!! Form::label('biography', 'Biografia') !!} 
            {!! Form::textarea('biography', null, ['class' => 'form-control', 'placeholder'=>'Detalle una pequeña descripción']) !!}
        </div>
        
        @error('biography')
            <span class="text-danger">{{$message}}</span>
        @enderror

        <span>
           <br> Estos campos no son necesarios si no los quiere llenar. <br><br>
        </span>

        <!-- Link del perfil de Facebook  -->

        <div class="form-group">
            {!! Form::label('facebook', 'Link del perfil de Facebook') !!} 
            {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder'=>'Ingrese El link de su perfil de facebook']) !!}
        </div>
        
        @error('facebook')
            <span class="text-danger">{{$message}}</span>
        @enderror

        <!-- Link canal de YouTube  -->

        <div class="form-group">
            {!! Form::label('youtube', 'Link canal de YouTube') !!} 
            {!! Form::text('youtube', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el link de su canal de YouTube']) !!}
        </div>
        
        @error('youtube')
            <span class="text-danger">{{$message}}</span>
        @enderror

        <!-- Link de sitio Web  -->

        <div class="form-group">
            {!! Form::label('website', 'Link de sitio Web') !!} 
            {!! Form::text('website', null, ['class' => 'form-control', 'placeholder'=>'Ingrese El link de su sitio web']) !!}
        </div>
        
        @error('website')
            <span class="text-danger">{{$message}}</span>
        @enderror

            <br>
            {!! Form::submit('Agregar Perfil', ['class' => 'btn btn-primary']) !!}
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
    
@stop

@section('js')
    <script> console.log('Hi!');</script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#biography' ) )
        .catch( error => {
            console.error( error );
        } );

    </script>
@stop