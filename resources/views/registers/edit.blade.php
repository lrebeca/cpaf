<!DOCTYPE html>
<html lang="en">
    @extends('layouts.header')
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">
    <title>CPCF | Participante  </title>
    <style>
        .bienvenida h1{
            color: rgb(4, 4, 70);
            padding-top: 3%;
            padding-bottom: 2%;
            text-align: center;
            font-weight: 500;
            font-size: 30px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
<body>
    <div class="container-fluid p-5 bg-dark"></div>
    <div class="alert bienvenida">
        <h1>EDITAR REGISTRO </h1>
        <h1>{{$event->evento}}</h1>
    </div>

    <div class="row align-items-center justify-content-center">
        @if (session('info'))
            <div class="alert alert-success text-center col-sm-6" >
                <strong>
                    {{session('info')}}
                </strong>
            </div>
        @endif
    </div>

<div class="row align-items-center justify-content-center">
    <div class="text-center col-sm-5">
@if($student->estado == 'estudiante')
    {{-- Evento pagado --}}
        {{-- Estudiantes --}}

        @if ($event->costo_student > 0)

                {!! Form::model($student, ['route'=>['students.update', $student], 'files' => true, 'method' => 'put', 'enctype' => 'multipart/form-data' ]) !!}

                    {!! Form::hidden('id_evento', $event->id) !!}
                    {!! Form::hidden('estado', 'estudiante') !!}
                    {!! Form::hidden('costo_e', $event->costo_student) !!}

                    <div class="btn-danger mx-10">
                        <br><p>En caso de ser deposito el Participante deberá apersonarse a las oficinas de administracion para poder dejar la factura de su deposito para confirmar su inscripción.</p> <br>
                    </div><br>
                
                {{-- Carrera --}}
                <div class="form-group mb-3">
                    {!! Form::label('carrera', 'Carrera') !!}
                    {!! Form::select('carrera', [
                        'Contaduría Pública' => 'Contaduría Pública',
                        'Contaduría Pública T.S.'=>'Contaduría Pública T.S.',
                        'Administración Financiera T.S.'=>'Administración Financiera T.S.',
                        'Comercio Exterior y Aduanas'=>'Comercio Exterior y Aduanas'
                    ], null,['class' => 'form-control', 'placeholder'=>'--- Seleccione su carrera ---']) !!}
                </div>

                    @error('carrera')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                {{-- Numero C.U. --}}
                <div class="form-group mb-3">
                    {!! Form::label('carnet_universitario', 'Numero C.U.') !!}
                    {!! Form::text('carnet_universitario', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de Universitario ','required pattern' =>'[0-9]*.[0-9]*']) !!}
                </div>

                    @error('carnet_universitario')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                    @include('registers.partials.pagado')

                {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-outline-primary']) !!}

                {!! Form::close() !!} <br><br>

        @endif

    {{-- Evento Gratuito --}}
    {{-- Estudiantes --}}

    @if ($event->costo_student <= 0 && $event->costo_prof <= 0)
                
        {!! Form::model($student, ['route'=>['students.update', $student], 'files' => true, 'method' => 'put', 'enctype' => 'multipart/form-data' ]) !!}


            {!! Form::hidden('id_evento', $event->id) !!}
            {!! Form::hidden('estado', 'estudiante') !!}
            {!! Form::hidden('costo_e', '0') !!}


            {{-- Carrera --}}
            <div class="form-group mb-3">
                {!! Form::label('carrera', 'Carrera') !!}
                {!! Form::select('carrera', [
                    'Contaduría Pública' => 'Contaduría Pública',
                    'Contaduría Pública T.S.'=>'Contaduría Pública T.S.',
                    'Administración Financiera T.S.'=>'Administración Financiera T.S.',
                    'Comercio Exterior y Aduanas'=>'Comercio Exterior y Aduanas'
                ], null,['class' => 'form-control', 'placeholder'=>'--- Seleccione su carrera ---']) !!}
            </div>

                @error('carrera')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            {{-- Numero C.U. --}}
            <div class="form-group mb-3">
                {!! Form::label('carnet_universitario', 'Numero C.U.') !!}
                {!! Form::text('carnet_universitario', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de Universitario Ej. 48-1575 ','required pattern' =>'[0-9]*.[0-9]*']) !!}
            </div>

                @error('carnet_universitario')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            @include('registers.partials.gratis')
        
        <br>
        {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-outline-primary']) !!}

        {!! Form::close() !!} <br><br>
    @endif

@else

{{-- Evento pagado --}}
    {{-- Profesional --}}

    @if ($event->costo_prof > 0)
            
                {!! Form::model($student, ['route'=>['students.update', $student], 'files' => true, 'method' => 'put', 'enctype' => 'multipart/form-data' ]) !!}

                    {!! Form::hidden('id_evento', $event->id) !!}
                    {!! Form::hidden('estado', 'profesional') !!}
                    {!! Form::hidden('costo_e', $event->costo_prof) !!}
                
                    <div class="btn-danger mx-10 px-10">
                        <br><p>En caso de ser deposito el Participante deberá apersonarse a las oficinas de administracion para poder dejar la factura de su deposito para confirmar su inscripción.</p> <br>
                    </div><br>
                
                    <div class="form-group mb-3">
                        {!! Form::label('sufix', 'Seleccionar') !!}
                        {!! Form::select('sufix', ['Ingeniero'=>'Ingeniero', 
                        'Licenciado'=>'Licenciado', 
                        'Doctor'=>'Doctor',
                        'Abogado0'=>'Abogado'
                    ], null, ['placeholder' => '--- Seleccion ---']) !!}
                    </div>
                    
                        @error('sufix')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    
                    @include('registers.partials.pagado')

                <br>
                {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-outline-primary']) !!}

                {!! Form::close() !!} <br><br>
    @endif 

{{-- Evento gratuito --}}
    {{-- Profesionales --}}

     @if ($event->costo_student <= 0 && $event->costo_prof <= 0)
            
                {!! Form::model($student, ['route'=>['students.update', $student], 'files' => true, 'method' => 'put', 'enctype' => 'multipart/form-data' ]) !!}

                    {!! Form::hidden('id_evento', $event->id) !!}
                    {!! Form::hidden('estado', 'profesional') !!}
                    {!! Form::hidden('costo_e', "0") !!}

                    <div class="form-group mb-3">
                        {!! Form::label('sufix', 'Seleccionar') !!}
                        {!! Form::select('sufix', ['Ingeniero'=>'Ingeniero', 
                        'Licenciado'=>'Licenciado', 
                        'Doctor'=>'Doctor',
                        'Abogado0'=>'Abogado'
                    ], null, ['placeholder' => '--- Seleccion ---']) !!}
                    </div>
                    
                        @error('sufix')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                
                    @include('registers.partials.gratis')
                    
                <br>
                {!! Form::submit('Actualizar Datos', ['class' => 'btn btn-outline-primary']) !!}

                {!! Form::close() !!} <br><br>
    @endif

@endif

    </div>
</div>



</body>
</html>
@extends('layouts.footer')