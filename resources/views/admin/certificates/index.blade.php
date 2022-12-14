@extends('adminlte::page')

@section('title', 'Certificados')

{{-- @section('plugins.Sweetalert2', true) --}}

@section('content_header')
    <h1>Certificados</h1>
@stop

@section('content')

@can('Crear Certificados')
    <div class="card-header">
        <a href="{{route('admin.certificates.create')}}" class="btn btn-primary">Agregar nuevo certificado</a>
    </div>
    <br>
@endcan

@if (session('info'))
<div class="alert alert-success">
    <strong>
        {{session('info')}}
    </strong>
</div>
@endif

<div class="card">
    <div class="card-body">
        <table id="certificados" class="table table-striped dt-responsive nowrap">
            <thead class="table-dark items-center">
                <th>Id</th>
                <th>Evento</th>
                <th>Detalle</th>
                <th>Fecha</th>
                <th>Fondo</th>
                @can('Editar Certificados')
                <th>Editar</th>
                @endcan
                @can('Eliminar Certificados')
                <th>Eliminar</th>
                @endcan
            </thead>
            <tbody>
                @foreach ($events as $event)
                    @foreach ($certificates as $certificate)
                    @foreach ($images as $image)
                        @if ($event->id == $certificate->id_evento && $certificate->image_id == $image->id)
                            <tr>
                                <td>{{$certificate->id}}</td>
                                <td>{{$event->evento}}</td>
                                <td>{!!$certificate->detalle!!}</td>
                                <td>{{$certificate->fecha}}</td>
                                <td>
                                    <img src="{{Storage::url($image->imagen)}}" width="200px">
                                </td>
                                @can('Editar Certificados')
                                <td> 
                                    <a href="{{route('admin.certificates.edit', $certificate)}}" class="btn btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                        </svg>    
                                    </a>
                                </td>
                                @endcan
                                @can('Eliminar Certificados')
                                <td>
                                    <form action="{{route('admin.certificates.destroy', $certificate)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" value="Eliminar" class="btn btn-outline-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                @endcan
                            </tr>
                        @endif
                    @endforeach
                    @endforeach
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<div class="card-header">
    <a href="javascript: history.go(-1)">Volver</a><br><br>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
@stop

@section('js')
    <script> console.log('Hi!');</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js" defer></script>
    <script>
        $(document).ready(function () {
            $('#certificados').DataTable({
                reponsive: true,
                autoWidth: false,
                "language": {
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ registros por p??gina",
                    "info": "Mostrando p??gina _PAGE_ de _PAGES_",
                    "paginate": {
                                    "previous": "Anterior",
                                    "next": "Siguiente",
                                    "first": "Primero",
                                    "last": "??ltimo"
                    }
                }
                
            });
        });
    </script>
@stop