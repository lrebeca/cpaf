@extends('adminlte::page')

@section('title', 'Backup')

{{-- @section('plugins.Sweetalert2', true) --}}

@section('content_header')
<center><h1>Copias de seguridad</h1></center>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif

@can('Crear Imagenes')
    <div class="card-header">
        <a href="{{route('admin.backups.backup')}}" class="btn btn-info">Generar Backup</a>
    </div>
    <br>
@endcan    
    
<table class="table table-striped dt-responsive nowrap">
    <thead class="table-dark">
        <tr>
            <th>N°</th>
            <th>Archivo</th>
            <th>Tamaño</th>
            <th>Fecha y Hora</th>
            <th>Descargar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($backups as $backup)
            <tr>
                <td>{{ $n = $n + 1}}</td>
                <td>{{ $backup['filename'] }}</td>
                <td>{{ $backup['filesize'] }}</td>
                <td>{{ $backup['created_at'] }}</td>
                <td><a href="{{ route('admin.backups.download', $backup['filename'] ) }}"><i class="fas fa-download"></i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>

  

    <div class="card-header">
        <a href="javascript: history.go(-1)">Volver</a><br><br>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
    <style>
        #galeria img {
            width: 100%;
            transition: 0.5;
            object-fit: cover;
        }
        #galeria .col-lg-4 {
            margin: 0 !important;
            padding: 25px;
        }
        #galeria img:hover {
            border: 5px solid #f7f7f7;
            transform: scale(1.2);
        }
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
@stop

@section('js')
    <script> console.log('Hi!');</script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
@stop