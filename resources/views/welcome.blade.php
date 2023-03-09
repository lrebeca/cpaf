<!DOCTYPE html>
<html lang="es">
    @extends('layouts.header')
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <body>
        <section class="home">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active" style="background-image:url('asset/img/1.jpg'); height: 100px;">
                    <div class="contenido">
                        <h2>Facultad de Contaduría Pública y Ciencias Financieras</h2>
                        <img src="{{asset('asset/img/escudo_3.png')}}" alt="" width="30%" class="img-fluid">
                        <p>Contaduría Pública</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image:url('asset/img/2.jpg')">
                    <div class="contenido">
                        <h2>Facultad de Contaduría Pública y Ciencias Financieras</h2>
                        <img src="{{asset('asset/img/escudo_3.png')}}" alt="" width="30%" class="img-fluid">
                        <p>Ciencias Financieras</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image:url('asset/img/3.jpg')">
                    <div class="contenido">
                        <h2>Facultad de Contaduría Pública y Ciencias Financieras</h2>
                        <img src="{{asset('asset/img/escudo_3.png')}}" alt="" width="30%" class="img-fluid">
                        <p>Comercio Exterior</p>
                    </div>
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

    <!-- Area de contenido -->
            <!--  bienvenida   -->
    <div class="bienvenida">
            <h1>BIENVENIDO</h1>
            <p class="has-text-aling-left text-center">
                "La Facultad de Contaduría Pública y Ciencias Financieras tiene el agrado 
                de ofrecer diferentes tipos de eventos de los cuales los
                estudiantes y/o profesionales pueden ser parte. <br>
                Hecha un vistazo a los eventos disponibles a los cuales puedes registrarte, 
                para poder aumentar tus conocimientos."
            </p>
    </div>

    <!-- inicio de seccion -->
    <div class="container my-3 d-grid gap-5">
        <div class="container row row-cols-1 row-cols-md-3 g-4">
            @foreach ($events as $event)
            @foreach ($users as $user)
            @if ($event->user_id == $user->id)
            <div class="col-lg-4 col-md-12">
                <div class="card-body card" style="width: 90%;">
                   
                        <div class="bg-image hover-overlay ripple card__img" data-mdb-ripple-color="light">
                            @isset($event->imagen)
                                <center>
                                    <img id="imagen" src="{{Storage::url($event->imagen)}}" class="img-fluid" alt="">
                                </center>
                            @else
                                <div class="image-wrapper">
                                    <center>
                                        <img id="imagen" src="{{asset('asset/img/DSC_0111.jpg')}}" class="img-fluid" alt="">
                                    </center>
                                </div>
                            @endisset
                        </div>
                        <div class="card__body">
                            <h5 class="card-title text-center card__title">
                                {{$event->evento}}
                            </h5>
                                {!!$event->detalle!!}
                        </div>                        
                                       
                        
                    <div class="card-text text-center">

                        @if($date > $event->fecha_fin)
                            
                            <h4 class="txt__evento-culminado">Evento Culminado</h4>
                        @else 
                            @if(count($event->users)>0)
                                <h5>Expositor o Expositores</h5>
                            @endif
                            
                            <ol style="text-align: left">
                                @foreach ($event->users as $exhibitor)
                                    <li> {{$exhibitor->name}} </li>
                                @endforeach
                            </ol>

                            @if ($event->costo_student > 0 && $event->costo_prof > 0)
                                <h6>Costo para Estudiantes: {{$event->costo_student}}</h6>
                                
                                <h6>Costo para Profesionales: {{$event->costo_prof}}</h6>
                                
                            @else
                                
                                <h5 class="txt__evento-gratuito">Evento gratuito</h5>
                            @endif
                            
                            <h6>Fecha de inicio: {{$event->fecha_inicio}}</h6>
                            
                            <h6>Fecha de finalizacion: {{$event->fecha_fin}}</h6>
                            
                        @endif
                        <br><br>
                        <a href="{{route('events.show', $event)}}" class="btn btn-outline-dark">Ver evento</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>

    </div>
    <!-- Fin de la seccion -->

    <style>
        .card__img{
            height: 70%;
            overflow: hidden;
            object-fit: cover;
            transition: 0.5;
            object-position: center;
        }
        .card__img:hover{
            transform: scale(1.2);
        }
        .txt__evento-culminado{
            color:#ff0000;
            font-size: 22px;
        }
        .txt__evento-gratuito{
            color: #008000;
            font-size: 22px;
        }
        .card__title{
            height: 80px;
            text-align: center;
            justify-content: center;
            padding: 20px;
        }
        .card__body *{
            display: flex;
            flex-direction: column;
            text-align: justify;
            align-items: center;
            justify-content: center;
        }
        .card__body p:first-child{
            display: none;
            height: 0;
            width: 0;
        }

        /* sliders Home*/
            
            .home .carousel-item{
                min-height: 95vh;
                background-position: center;
                background-size: cover;
                position: relative;
                z-index: 1;
            }
            .home .carousel-item:before{
                content: '';
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: -1;
            }
            .home .carousel-item .contenido{
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
            }
            .home .carousel-item h2{
                font-size: 50px;
                font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                color: white;
                margin: 0 0 10px;
            }
            .home .carousel-item img{
                margin: 0 0 10px;
            }
            .home .carousel-item p{
                font-size: 30px;
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                margin: 0;
                color: #ffffff;
            }
            .home .carousel-item.active h2{
                animation: fadeInLeft 1.5s ease forwards;
            }
            .home .carousel-item.active p{
                animation: fadeInRight 1.5s ease forwards;
            }
            @keyframes fadeInLeft{
                0%{
                    opacity: 0;
                    transform: translateX(-200px);
                }
                100%{
                    opacity: 1;
                    transform: translateX(0px);
                }
            }
            @keyframes fadeInRight{
                0%{
                    opacity: 0;
                    transform: translateX(200px);
                }
                100%{
                    opacity: 1;
                    transform: translateX(0px);
                }
            }
        /* bienvenida */
            .bienvenida h1{
                color: rgb(4, 4, 70);
                padding-top: 3%;
                padding-bottom: 1%;
                text-align: center;
                font-weight: 500;
                font-size: 50px;
                font-family:Verdana, Geneva, Tahoma, sans-serif;
            }
            .bienvenida p{
                color: rgb(6, 6, 46);
                padding-bottom: 2%;
                text-align: justify;
                font-size: 26px;
                font-weight: 500;
                font-family:Geneva, Tahoma, sans-serif;
                margin-left: 10%;
                margin-right: 10%;
            }
    </style>

    </body>
    @extends('layouts.footer')
</html>