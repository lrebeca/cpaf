@extends('adminlte::page')

@section('title', 'Admin')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <h1>Tablero</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">BIENVENIDO</h1>
        </div>

        <div class="card-body">

            <center><h2>Participantes</h2></center>
            <div class="container my-3 d-grid gap-5">
                <div class="container row row-cols-1 row-cols-md-2 g-4">
                    {{-- Participantes --}}
                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('asset/panel/2895133.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">Pendientes de Aprobación</h5><br>
                                  <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Aprobados</h5><br>
                                    <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Rechazados</h5><br>
                                    <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>

            <center><h2>Opciones de administrador</h2></center>
            <div class="container my-3 d-grid gap-5">
                <div class="container row row-cols-1 row-cols-md-2 g-4">        
                    {{-- Usuarios --}}
                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('asset/panel/2895133.jpg')}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Usuarios</h5><br>
                                    <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Eventos</h5><br>
                                    <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Certificados</h5><br>
                                    <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Organizadores</h5><br>
                                    <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                              </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Provincias</h5><br>
                                    <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                              </div>
                        </div>                        
                        
                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Roles</h5><br>
                                    <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                              </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-12">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Imagenes</h5><br>
                                    <a href="#" class="btn btn-primary">Ver</a>
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
@stop

@section('js')
    <script> console.log('Hi!'); 

    Swal.fire(
        'Bienvenido a la Pagina Principal',
        'Haz clik en el boton',
        'Gracias'
    )
    </script>
@stop