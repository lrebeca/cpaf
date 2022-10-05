@extends('adminlte::page')

@section('title', 'Admin')

{{-- @section('plugins.Sweetalert2', true) --}}

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{session('info')}}
            </strong>
        </div>
    @endif
    
    @foreach($profiles as $profile)
    
    @if(auth()->user())
        {{$profile}}
    @else
    <tr>
        Perfil no actualizado: 
        <a href="{{route('admin.profiles.create')}}" class="btn btn-primary">Actualizar</a>
    </tr>
    @endif
    <br><br>

    <div class="card">
        <div class="card-body">
        
            <table class="table table-responsive-sm " border>
                <tr>
                    <th>Nombre Completo:</th>
                    <td>{{auth()->user()->name}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{auth()->user()->email}}</td>
                </tr>
                <tr>
                    <th colspan="2">                       
                        <a href="{{route('admin.profiles.edit', $user = auth()->user()->id)}}" class="btn btn-primary">Editar Formulario</a>
                    </th>   
                </tr> 
            </table>
        </div>
    </div>

    @endforeach

    <div class="card-header">
        <a href="javascript: history.go(-1)">Volver</a><br><br>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js" defer></script>
    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                reponsive: true,
                autoWidth: false,
                "language": {
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "paginate": {
                                    "previous": "Anterior",
                                    "next": "Siguiente",
                                    "first": "Primero",
                                    "last": "Último"
                    }
                }
            });
        });
    </script>
@stop