<!DOCTYPE html>
<html lang="en">
    @extends('layouts.header')
    <title>Registro | CPCF</title>
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">
    <div class="container-fluid p-5 bg-dark"></div>

    <style type="text/css">
        #form_s, #form_gratis_s{
            display: none;
        }
        #form_p, #form_gratis_p{
            display: none;
        }

        .bienvenida h1{
            color: rgb(4, 4, 70);
            padding-top: 3%;
            padding-bottom: 2%;
            text-align: center;
            font-weight: 500;
            font-size: 30px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        #imagen{
            width: 60%;
            transition: 0.5;
            object-fit: cover;
        }
        #imagen:hover{
            transform: scale(1.2);
        }
    </style>
<body>
    
    {{-- Bienvenida a la pagina de registro --}}
<div class="alert text-center bienvenida">
    <h1>PUEDES REGISTRARTE AL EVENTO</h1>
</div>

{{-- Detalles del evento --}}
<div class="container">
    <div class="row align-items-center flex-column flex-md-row ">
        <div class="col">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                @isset($event->imagen)
                <center>
                    <img id="imagen" src="{{Storage::url($event->imagen)}}"  class="img-fluid">
                </center>
                @else
                    <div class="image-wrapper">
                        <center>
                            <img id="imagen" src="{{asset('asset/img/DSC_0111.jpg')}}" class="img-fluid">  
                        </center>
                    </div>
                @endisset
            </div>
        </div>
        <div class="col">
            <br>
                <h5 class="card-title text-center">
                    {{$event->evento}}
                </h5>
                <p class="card-text text-center">
                    {!! $event->detalle !!}
                </p>

                @if(count($event->users)>0)
                    <h5 class="card-title text-center">Expositor o Expositores</h5>
                @endif

                {{-- Lista de expositores --}}

                <ol style="text-align: left">
                    @foreach ($event->users as $user)
                        <li><a href="{{route('exhibitors.show', $user->id)}}">{{$user->name}}</a></li>
                    @endforeach
                </ol>
            <div class="card-text text-center">

                @if($date > $event->fecha_fin)
                @else 
                    @if ($event->costo_student > 0 && $event->costo_prof > 0)
                        <h6>Costo para Estudiantes</h6>
                        {{$event->costo_student}}
                        <h6>Costo para Profecionales</h6>
                        {{$event->costo_prof}}
                    @else
                        <h5>Evento gratuito</h5>
                    @endif
                    <h6>Fecha de inicio</h6>
                    {{$event->fecha_inicio}}
                    <h6>Fecha de finalizacion</h6>
                    {{$event->fecha_fin}}
                @endif
            </div>

            {{-- Ingreso al evento para los registrados --}}

                <!-- Button trigger modal -->
                <div class="text-center"><br><br>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Ingresar al evento
                    </button>
                </div>
                        {!! Form::open(['route'=>'ingresar']) !!}
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        {!! Form::hidden('id_evento', $event->id) !!}
                                    @error('id_evento')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">                                
                                            
                            {{-- Email --}}
                                <div class="form-group mb-3">
                                    {!! Form::label('email2', 'Email') !!}
                                    {{-- {!! Form::email('email2', null, ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!} --}}
                                    <input type="email" name="email2" id="email2" value="{{old('email2')}}" placeholder='Example@gmail.com' class="form-control" >
                                </div>
                                @error('email2')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                
                            {{-- Numero C.I. --}}
                                <div class="form-group mb-3">
                                    {!! Form::label('carnet_identidad2', 'Contraseña') !!}
                                    {!! Form::password('carnet_identidad2', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ']) !!}
                                </div>
                                @error('carnet_identidad2')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            {!! Form::submit('Enviar', ['class' => 'btn btn-outline-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    </div>
                </div>
        </div>
    </div>      
</div>

<br><br>
<div class="row align-items-center justify-content-center">
    @if (session('info'))
        <div class="alert alert-success text-center col-sm-6" >
            <strong>
                {{session('info')}}
            </strong>
        </div>
    @endif
</div>

@if($date > $event->fecha_fin)
    <center><h4>Evento Culminado</h4></center>
@else

    {{-- Div del contenedor de los formularios  --}}
    <div class="container">
        <h3 class="text-center">Formulario de registro al evento </h3>
        {{-- Boton para seleccionar si es estudiante o profecional  --}}
            @if ($event->costo_student > 0 && $event->costo_prof > 0)
                <div class="container text-center">
                    <input type="radio" onclick="mostrarFormStu();" name="radio" value="estudiante"> Estudiante
                    <input type="radio" onclick="mostrarFormPro();" name="radio" value="profesional"> Profesional
                </div>
            @else
                <div class="container text-center">
                    <input type="radio" onclick="mostrarFormGratisStu();" name="radio" value="estudiante"> Estudiante
                    <input type="radio" onclick="mostrarFormGratisPro();" name="radio" value="profesional"> Profesional
                </div>
            @endif

        <div class="row align-items-center justify-content-center">
            <div class="text-center col-sm-5">
        {{-- Evento pagado --}}
            {{-- Estudiantes --}}

            @if ($event->costo_student > 0)
                <div id="form_s">
                    <h3>Registro Estudiante </h3><br>
                    <div class="row justify-content-md-center">
                        {!! Form::open(['route'=>'students.store','enctype' => 'multipart/form-data' ,'files' => true]) !!}

                            {!! Form::hidden('id_evento', $event->id) !!}
                            {!! Form::hidden('estado', 'estudiante') !!}
                            {!! Form::hidden('costo_e', $event->costo_student) !!}
                            {!! Form::hidden('progreso', 'enviado') !!}

                            <div class="btn-danger">
                                <br><p>En caso de ser depósito el participante deberá apersonarse a las oficinas de 
                                    administración para poder dejar la factura de 
                                    su depósito para confirmar su inscripción.</p> <br>
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
                                {!! Form::label('carnet_universitario', 'N° Carnet Universitario') !!}
                                {!! Form::text('carnet_universitario', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de Universitario Ej. 48-1575']) !!}
                            </div>

                                @error('carnet_universitario')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            
                            @include('registers.partials.pagado')

                        <br>
                        {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-outline-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            @endif

            {{-- Profesional --}}

            @if ($event->costo_prof > 0)
                <div id="form_p" class="container">
                    <h3>Registro Profesional </h3><br>
                    <div class="row justify-content-md-center">
                        {!! Form::open(['route'=>'students.store','files' => true]) !!}

                            {!! Form::hidden('id_evento', $event->id) !!}
                            {!! Form::hidden('estado', 'profesional') !!}
                            {!! Form::hidden('costo_e', $event->costo_prof) !!}
                            {!! Form::hidden('progreso', 'enviado') !!}

                            <div class="btn-danger">
                                <br><p>En caso de ser depósito el participante deberá apersonarse a las oficinas de 
                                    administración para poder dejar la factura de 
                                    su depósito para confirmar su inscripción.</p> <br>
                            </div><br>
                        
                            <div class="form-group mb-3">
                                {!! Form::label('sufix', 'Seleccionar') !!}
                                {!! Form::select('sufix', ['Ing.'=>'Ingeniero', 
                                                            'Lic.'=>'Licenciado', 
                                                            'Dr.'=>'Doctor',
                                                            'Abg.'=>'Abogado',
                                                            ''=>'Ninguno'
                                                        ], null, ['class' => 'form-control', 'placeholder' => '--- Seleccion ---']) !!}
                            </div>
                            
                                @error('sufix')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror

                            <div class="form-group mb-3">
                                {!! Form::label('empleo', 'Lugar de trabajo y/o cargo que ocupa') !!}
                                {!! Form::text('empleo', null, ['class' => 'form-control', 'placeholder' => 'Lugar y cargo de su empleo (Si tiene)']) !!}
                            </div>
                            
                                @error('empleo')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
    

                            @include('registers.partials.pagado')

                        <br>
                        {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-outline-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            @endif

        {{-- Evento Gratuito --}}
            {{-- Estudiantes --}}

            @if ($event->costo_student <= 0 && $event->costo_prof <= 0)
                <div id="form_gratis_s" class="card ">
                    <h3>Registrate en el formulario </h3><br>
                    <div class="card-body">
                        {!! Form::open(['route'=>'students.store']) !!}

                            {!! Form::hidden('id_evento', $event->id) !!}
                            {!! Form::hidden('estado', 'estudiante') !!}
                            {!! Form::hidden('costo_e', '0') !!}
                            {!! Form::hidden('progreso', 'enviado') !!}

                            {{-- <input type="hidden" name="id_evento" value="{{$event->id}}"> --}}

                            @include('registers.partials.gratis')

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
                            {!! Form::text('carnet_universitario', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de Universitario ']) !!}
                        </div>

                            @error('carnet_universitario')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                        
                        <br>
                        {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-outline-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div> 
            @endif

            {{-- Profesionales --}}

            @if ($event->costo_student <= 0 && $event->costo_prof <= 0)
                <div id="form_gratis_p" class="card ">
                    <h3>Registrate en el formulario </h3><br>
                    <div class="card-body">
                        {!! Form::open(['route'=>'students.store']) !!}

                            {!! Form::hidden('id_evento', $event->id) !!}
                            {!! Form::hidden('estado', 'profesional') !!}
                            {!! Form::hidden('costo_e', "0") !!}
                            {!! Form::hidden('progreso', 'enviado') !!}

                            <div class="form-group mb-3">
                                {!! Form::label('sufix', 'Seleccionar') !!}
                                {!! Form::select('sufix', ['Ing.'=>'Ingeniero', 
                                                            'Lic.'=>'Licenciado', 
                                                            'Dr.'=>'Doctor',
                                                            'Abg.'=>'Abogado',
                                                            ''=>'Ninguno'
                                                        ], null, ['class' => 'form-control', 'placeholder' => '--- Seleccion ---']) !!}
                            </div>
                            
                                @error('sufix')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            @include('registers.partials.gratis')
                            
                        <br>
                        {!! Form::submit('Enviar Formulario', ['class' => 'btn btn-outline-primary']) !!}

                        {!! Form::close() !!}
                    </div>
                </div> 
            @endif
            </div>
        </div>
    </div> 

@endif
<br><br>


{{-- Js de los botones --}}

<script>
    function mostrarFormStu(){
        document.getElementById('form_s').style.display = 'block'; 
        document.getElementById('form_p').style.display = 'none';   
    }
    function mostrarFormPro(){
        document.getElementById('form_p').style.display = 'block';
        document.getElementById('form_s').style.display = 'none';     
    }

    function mostrarFormGratisStu(){
        document.getElementById('form_gratis_s').style.display = 'block';    
        document.getElementById('form_gratis_p').style.display = 'none';    
    }
    function mostrarFormGratisPro(){
        document.getElementById('form_gratis_p').style.display = 'block';    
        document.getElementById('form_gratis_s').style.display = 'none';    
    }
</script>
</body>

@extends('layouts.footer')

</html>