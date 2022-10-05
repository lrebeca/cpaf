@extends('adminlte::page')

@section('title', 'Observaciones')

@section('content_header')
    <h1>Observaciones en el formulario del participante {{$student->sufix}} {{$student->nombre}} {{$student->apellido_paterno}} {{$student->apellido_materno}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
        {!! Form::open(['route'=>['admin.student.enviado.rechazado', $student]]) !!}

            <div class="form-group">
                {!! Form::label('body', 'Observaciones del curso') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder'=>'Ingrese las observaciones de este estudiante', 'title' => 'Debe llenar ', 'required' => 'required']) !!}
            </div>

            @error('body')
                <span class="text-danger">{{$message}}</span>
            @enderror
        
            <br>
            {!! Form::submit('Enviar Observaciones', ['class' => 'btn btn-primary']) !!}
            <br>

        {!! Form::close() !!}
        </div>
        
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); 
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    {{-- <script>
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    </script> --}}
@stop