@extends('adminlte::page')

@section('title', 'Admin')

{{-- @section('plugins.Sweetalert2', true) --}}

@section('content_header')
    <h1>Perfil de usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{session('info')}}
            </strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            @isset($perfil)
                
                @isset($perfil->foto)
                    <center><img src="{{Storage::url($perfil->foto)}}" id="perfil" class="img-fluid"></center>
                @else
                    No tiene una foto de perfil
                @endisset
                <hr>
            <center style="padding-left: 25%; padding-right: 25%;">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">Nombre: </th><td>{{ $user->name }}</td>
                        </tr><tr>
                            <th scope="row">Email:</th><td>{{ $user->email }}</td>
                        </tr><tr>
                            <th scope="row">Sufijo:</th><td>{{ $perfil->suffix }}</td>
                        </tr><tr>
                            <th scope="row">Dirección:</th><td> {{ $perfil->direccion }}</td>
                        </tr><tr>
                            <th scope="row">Número de celular:</th><td> {{ $perfil->num_celular }}</td>
                        </tr><tr>
                            <th scope="row">Biografía:</th><td> {!!strip_tags($perfil->biography)!!}</td>
                        </tr><tr>
                            <th scope="row">Link de Facebook:</th><td> {{ $perfil->facebook }}</td>
                        </tr><tr>
                            <th scope="row">Link de Youtube:</th><td> {{ $perfil->youtube }}</td>
                        </tr><tr>
                            <th scope="row">Link de website: </th><td> {{ $perfil->website }}</td>
                        </tr>
                      </tbody>
                </table>
                <div>
                    <a href="{{route('admin.profiles.edit', $perfil)}}" class="btn btn-outline-primary">
                        Editar Perfil   
                    </a>
                </div>            
            </center>
            @endisset
        </div>
    </div>
   
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

    <style>
        #perfil{
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }
    </style>
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