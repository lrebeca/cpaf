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
            <div class="container my-3 d-grid gap-5">

                <div class="container row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($events as $event)
                    <div class="col-lg-4 col-md-12">
                        <div class="card-body ">
                            <div>
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    @isset($event->imagen)
                                        <img id="img" src="{{Storage::url($event->imagen)}}"  class="img-fluid" alt="">
                                    @else
                                        <div class="image-wrapper">
                                            <img id="img" src="{{asset('asset/img/DSC_0006.jpg')}}"  width="350px" >
                                        </div>
                                    @endisset
                                </div>
                                <div>
                                    <h5 class="card-title text-center">
                                        {{$event->evento}}
                                    </h5>
                                    {{-- <p class="card-text">
                                        {!!$event->detalle!!}
                                    </p> --}}
                                </div>
                            </div>
                            <div class="card-text text-center">
                                @if ($event->costo_student > 0 && $event->costo_prof > 0)
                                    <h6>Costo para Estudiantes</h6>
                                    {{$event->costo_student}}
                                    <h6>Costo para Profesionales</h6>
                                    {{$event->costo_prof}}
                                @else
                                    <h5>Evento gratuito</h5>
                                @endif
                                
                                <h6>Fecha de inicio</h6>
                                {{$event->fecha_inicio}}
                                <h6>Fecha de finalizacion</h6>
                                {{$event->fecha_fin}}
            
                                <br><br>
            
                                {{-- <a href="{{route('events.show', $event)}}" class="btn btn-primary">Ver evento</a> --}}
                                {{-- {{ $event->id }} --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
            
                    {{-- <div>
                        {!! $events->links() !!}
                    </div> --}}
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