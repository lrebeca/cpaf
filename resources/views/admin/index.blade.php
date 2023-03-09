@extends('adminlte::page')

@section('title', 'Admin')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1 id="header">BIENVENIDO</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">De los Participantes</h1>
        </div>

        <div class="card-body">
            <div class="container my-3 d-grid gap-5">
                <div class="container row row-cols-1 row-cols-md-2 g-4 text-center">
                    {{-- Participantes --}}
                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/pendiente.png')}}" width="123px" height="100px" class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                  <a href="{{route('admin.students.enviado.index')}}" class="btn btn-outline-dark">Pendientes de revición</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/aprobado.png')}}" width="150px"class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                    <a href="{{route('admin.students.aprobado.index')}}" class="btn btn-outline-dark">Aprobados</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/rechazado.png')}}" width="140px" class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                    <a href="{{route('admin.students.rechazado.index')}}" class="btn btn-outline-dark">Rechazados</a>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="card">
            <div class="card-header">
                <h1 class="card-title">Opciones de Administrador</h1>
            </div>

            <div class="container my-3 d-grid gap-5">
                <div class="container row row-cols-1 row-cols-md-2 g-4 text-center">        
                    {{-- Usuarios --}}
                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/usuarios.png')}}" width="150px"class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                    <a href="{{route('admin.users.index')}}" class="btn btn-outline-dark">Usuarios</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/eventos.png')}}" width="150px"class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                    <a href="{{route('admin.events.index')}}" class="btn btn-outline-dark">Eventos</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/certificate.png')}}"  width="150px"class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                    <a href="{{route('admin.certificates.index')}}" class="btn btn-outline-dark">Certificados</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/organizer.png')}}"  width="150px"class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                    <a href="{{route('admin.organizers.index')}}" class="btn btn-outline-dark">Organizadores</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/provinces.png')}}"  width="150px"class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                    <a href="{{route('admin.provinces.index')}}" class="btn btn-outline-dark">Provincias</a>
                                </div>
                              </div>
                        </div>                        
                        
                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/roles.png')}}"  width="150px"class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                    <a href="{{route('admin.roles.index')}}" class="btn btn-outline-dark">Roles</a>
                                </div>
                              </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 15rem;">
                                <img src="{{asset('asset/panel/images.png')}}"  width="150px"class="mx-auto d-block img-fluid mt-2">
                                <div class="card-body">
                                    <a href="{{route('admin.images.index')}}" class="btn btn-outline-dark">Imagenes</a>
                                </div>
                              </div>>
                        </div>
                
                </div>
            </div>

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .card_img{
        overflow: hidden;
        object-fit: cover;
        object-position: center;
    }
    .car{
        background-color: rgba(0, 38, 255, 0.186);
    }
    #header{
            color: rgb(5, 10, 109);
            padding-top: 3%;
            padding-bottom: 1%;
            text-align: center;
            font-weight: 500;
            font-size: 50px;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    .card-title{
            color: rgb(2, 3, 33);
            padding-top: 1%;
            padding-bottom: 1%;
            text-align: center;
            font-weight: 700;
            font-size: 25px;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); 

    Swal.fire(
        'Bienvenido a la Pagina Principal',
        'Haz clik para continuar !!!',
        'Gracias'
    )
    </script>
@stop