<!DOCTYPE html>
<html lang="en">
    @extends('layouts.header')
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">
    <title>CPCF | {{$event->evento}} </title>

    <style>
        /* Bienvenida */
            .bienvenida h1{
                color: rgb(4, 4, 70);
                padding-top: 3%;
                padding-bottom: 2%;
                text-align: center;
                font-weight: 500;
                font-size: 50px;
                font-family:Verdana, Geneva, Tahoma, sans-serif;
            }
            
        /* detalles */
            #evento p{
                text-align: justify;
                font-size: 16px;
                font-family:Geneva, Tahoma, sans-serif;
            }
            #detalle{
                margin-left:5%;
                margin-bottom: 15%;
                text-align: center; 
            }
            #datos{
                margin-left: 1%;
                margin-right: 1%; 
            }
            #evento{
                padding-bottom: 2%;
                padding-left: 10%;
                padding-right: 10%; 
            }
            .link{
                text-align: center;
                padding-bottom: 5%;
                font-weight: 600;
                font-size: 16px;
                font-family:Verdana, Geneva, Tahoma, sans-serif;
            }
            .link p{
                color: rgb(252, 0, 0);
            }
            
            .embed-container {
                position: relative;
                padding-bottom: 56.25%;
                height: 0;
                overflow: hidden;
            }
            .embed-container iframe {
                position: absolute;
                top:0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        /* Enviado */
            #enviado{
                color: rgb(54, 152, 41);
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
        
        /* Aprobado */
            #descargar{
                text-align: center;
                font-size: 20px;
                font-family:Verdana, Geneva, Tahoma, sans-serif;
            }
            #descargar i{
                color: rgb(25, 12, 92);
                width:25px;
            }
            #descargar a{
                color: rgb(25, 12, 92);
                width:25px;
            }
            #descargar a{
                color: rgb(25, 12, 92);
            }

        h4{
            color: rgb(4, 4, 70);
            padding-top: 3%;
            padding-bottom: 2%;
            text-align: center;
            font-weight: 800;
            font-size: 50px;
            font-family:Georgia, 'Times New Roman', Times, serif;
        }

        #imagen{
            transition: 0.5;
            object-fit: cover;
        }
        #imagen:hover{
            transform: scale(1.1);
        }
    </style>
<body>

<div class="container-fluid p-5 bg-dark"></div>
{{-- Bienvenida a la pagina de registro --}}
<div class="alert bienvenida">
    <h1>{{$event->evento}}</h1>
</div>
 
{{-- Evento si es virtual links si es presencial información --}}
<div class="container-fluid mb-5">
    
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
        @isset($event->imagen)
            <center><img id="imagen" width="500px" src="{{Storage::url($event->imagen)}}"  class="img-fluid"></center>
        @else
            <center><img id="imagen" width="500px" src="{{asset('asset/img/DSC_0111.jpg')}}" class="img-fluid"></center>
        @endisset
    </div>
    <br><br>
    <div id="evento">
        <p>{!!$event->detalle!!}</p>
        
        {{-- <h5 class="card-title text-center">Expositor o Expositores</h5>
            <ol style="text-align: left">
                @foreach ($event->users as $exhibitor)
                    <li> {{$exhibitor->name}} </li>
                @endforeach
            </ol> --}}
    </div>

    
        
    <div class="row flex-column flex-md-row ">

        {{-- Detalles del evento --}}
        <div class="col-7" id="detalle">
            
            @if($student->progreso == 'aprobado')

            <div class="full-width link">
                @if($event->link_whatsapp)
                    @if ($event->link_telegram)
                        <p>!!! Debe ingresar a los grupos para poder estar mas informado !!!</p>
                        Grupo de WhatsApp ->
                        <a href="{{$event->link_whatsapp}}" class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" color="#25D366" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"></path>
                            </svg>
                        </a> <br>
                        Grupo de telegram ->
                        <a class="btn" href="{{$event->link_telegram}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" color="#0088cc" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"></path>
                            </svg>
                        </a>
                    @endif 
                @endif
            </div>
            
                <h4>Del Evento</h4> <br>

                @foreach ($details as $detail)
                    @if ($detail->id_evento == $event->id)
                        {!!$detail->detalle!!}
                        <a href="{{$detail->link}}">{{$detail->link}}</a> <br><br>
                    @endif
                @endforeach <br>

                <h4>Material para el evento</h4><br>
                @foreach ($documents as $document)
                    @if ($document->id_evento == $event->id)
                        {{-- <div class="embed-container">
                            <iframe src="{{Storage::url($document->documento)}}">{{$document->documento}}</iframe>
                        </div> --}}
                        <div id="descargar">
                            {{$document->titulo}}
                            <a href="{{route('documents.descargar',$document)}}" > Descargar
                                <i class="fas fa-download"></i>
                            </a> <br>
                        </div>
                        
                    @endif
                @endforeach <br>
                
            <h4>El certificado se visualizará aquí una ves se publique</h4> 
                @foreach($students as $stu)
                    @foreach($certificates as $certificate)
                        @if($student->id == $stu->id)
                            {{-- @if($date > $event->fecha_fin )  --}}
                                @if($certificate->id_evento == $event->id)
                                    @if($date >= $certificate->fecha)
                                        <a href="{{route('certificado',$stu)}}" class="btn btn-outline-dark">Ver certificado</a> <br><br>
                                    @endif
                                @endif
                            {{-- @endif --}}
                        @endif
                    @endforeach
                @endforeach
            
            @elseif($student->progreso == 'enviado') 
                <h4 id="enviado">"Su formulario se encuentra en revisión"</h4>

            @else 
                <h4>Su registro ha sido rechazado por las siguientes observaciones que se encontraron:</h4>
                <br><br> 
                {{-- @isset($student->observation) --}}
                    <p >{!! $observaciones->body !!}</p>
                {{-- @endisset --}}

            @endif
        </div>

        {{-- Datos del participante --}}
        <div class="col-4" id="datos">
            <center><h5>Datos del Participante</h5></center>
            <table class="table table-responsive-sm table-striped table-hover" border="2px">
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
                            @if($student->progreso == 'rechazado')
                                @foreach($students as $stu)
                                    @if($student->email == $stu->email)
                                        <th>
                                            Editar
                                        </th>
                                        <td>
                                            <a href="{{route('students.edit', $stu)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                                </svg>  
                                            </a>
                                        </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
            </table>            
        </div>
    </div>
</div>
</body>
</html>
@extends('layouts.footer')