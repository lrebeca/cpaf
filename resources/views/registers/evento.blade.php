<!DOCTYPE html>
<html lang="en">
    @extends('layouts.header')
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">
    <title>CPCF | {{$event->evento}}</title>

    <style>
        #detalle{
            margin-left: 1cm;
            margin-left: 1cm;  
            text-align: center; 
        }
        #datos{
            margin-left: 1cm;
            margin-left: 1cm; 
        }
        #contenido{
            padding-bottom: 2cm;
        }
        #evento{
            padding-top: 1cm;
            padding-bottom: 1cm;
            padding-left: 2cm;
            padding-right: 2cm; 
        }
    </style>
<body>

<div class="container-fluid p-5 bg-dark"></div>
{{-- Bienvenida a la pagina de registro --}}
<div class="alert alert-dark text-center">
    <h1>BIENVENIDO AL EVENTO </h1>
    <h1>{{$event->evento}}</h1>
</div>

{{-- Evento si es virtual links si es presencial información --}}
<div class="container-fluid" id="contenido">

    <div id="evento">
        {!!$event->detalle!!}
    </div>
        
<div class="row flex-column flex-md-row ">

    <div class="col-8 btn-secondary" id="detalle">
        <br><br>
        @if($student->progreso == 'aprobado')

            <h4>Información del Evento</h4> <br>

            @foreach ($details as $detail)
                @if ($detail->id_evento == $event->id)
                    {!!$detail->detalle!!} <br>
                    <a href="{{$detail->link}}">{{$detail->link}}</a> <br><br>
                @endif
            @endforeach
        <br><br>
            <h4>Material necesario para el participar del evento</h4>

            @foreach ($documents as $document)
                @if ($document->id_evento == $event->id)
                {{$document->titulo}} <br>

                <iframe src="{{Storage::url($document->documento)}}" frameborder="0"></iframe> <br>

                @endif
            @endforeach
            <br><br>
          <h4>El certificado se visualizará aquí una ves se publique</h4> 
            @foreach($students as $stu)
                @foreach($certificates as $certificate)
                    @if($student->id == $stu->id)
                        @if($date > $event->fecha_fin )
                        @if($certificate->id_evento == $event->id)
                            <div class="container">
                                <a href="{{route('certificado',$stu)}}" class="btn btn-outline-light">Ver certificado</a> <br><br>
                            </div>
                        @endif
                        @endif
                    @endif
                @endforeach
            @endforeach
            

        @elseif($student->progreso == 'enviado') 
            <h4>"Su formulario aún no se reviso"</h4>
        @else 
             <h4>Su registro ha sido rechazado por las siguientes observaciones que se encontraron:</h4>
            <br><br>
           {!! $observaciones->body !!}

        @endif
        

    </div>

    <div class="col-3 " id="datos">

        <table class="table table-responsive-sm " border>
            <thead>
                @isset($student->carrera)
                <tr>
                    <th>Carrera:</th>
                    <td>{{$student->carrera}}</td>
                </tr>
                @endisset
                @isset($student->sufix)
                <tr>
                    <th>Sufijo:</th>
                    <td>{{$student->sufix}}</td>
                </tr>
                @endisset
                @isset($student->empleo)
                <tr>
                    <th>Empleo:</th>
                    <td>{{$student->empleo}}</td>
                </tr>
                @endisset
                <tr>
                    <th>Nombres:</th>
                    <td>{{$student->nombre}}</td>
                </tr>
                <tr>
                    <th>Apellido Paterno:</th>
                    <td>{{$student->apellido_paterno}}</td>
                </tr>
                <tr>
                    <th>Apellido Materno:</th>
                    <td>{{$student->apellido_materno}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{$student->email}}</td>
                </tr>
                <tr>
                    <th>Carnet Identidad:</th>
                    <td>{{$student->carnet_identidad}}</td>
                </tr>
                <tr>
                    <th>Numero Celular:</th>
                    <td>{{$student->n_celular}}</td>
                </tr>
                @isset($student->n_celular2)
                <tr>
                    <th>Numero celular referencia:</th>
                    <td>{{$student->n_celular2}}</td>
                </tr>
                @endisset
                @isset($student->carnet_universitario)
                <tr>
                    <th>Carnet Universitario:</th>
                    <td>{{$student->carnet_universitario}}</td>
                </tr>
                @endisset
                <tr>
                    <th>Estado:</th>
                    <td>{{$student->estado}}</td>
                </tr>
                <tr>
                    <th>Tipo de pago:</th>
                    <td>{{$student->pago}}</td>
                </tr>
                <tr>
                    <th>Costo del Evento: </th>
                    <td>{{$student->costo_e}}</td>
                </tr>
                <tr>
                    <th>Progreso de formulario:</th>
                    <td>{{$student->progreso}}</td>
                </tr>
                <tr>
                    <th colspan="2">
                        @if($student->progreso == 'rechazado')
                        @foreach($students as $stu)
                            @if($student->id == $stu->id)
                                <div class="container">
                                    <a href="{{route('students.edit', $stu)}}" class="btn btn-primary">Editar Formulario</a>
                                </div>
                            @endif
                        @endforeach
                        @endif
                    </th>
                </tr>
            </thead>
        </table>
                   
    </div>
</div>
</div>

</body>
</html>

@extends('layouts.footer')