@extends('adminlte::page')

@section('title', 'Certificado')

@section('content_header')
    <center><h1>{{$event->evento}}</h1></center>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>
            {{session('info')}}
        </strong>
    </div>
    @endif

    <br><br>
<center>
    @foreach ($certificates as $certificate)
        @foreach ($images as $image)
            @if ($event->id == $certificate->id_evento && $certificate->image_id == $image->id)
                @isset($certificate->image_id)
                <body onload="certificar()">

                    {{-- Certificado del estudiante --}}
                    <div class="container relative">
                
                                <img id="fondo" src="{{Storage::url($image->imagen)}}" style="display: none" class="img-fluid">
                
                            <center>
                                <canvas id="certificado" width="877" height="620" style="border:1px sxolid #d3d3d3;" class="img-fluid"></canvas>
                            </center>
                            <br>
                        <div class="form-layout-footer">
                            <center>
                                <button class="btn btn-info btn-outline-dark" onclick="png()" id="btnpng" ><i class="fa fa-send mg-r-10">Descargar PNG</i></button>
                
                                &nbsp;&nbsp;&nbsp;&nbsp;
                
                                <a href="{{route('pdf', $student)}}" class="btn btn-info btn-outline-dark"><i class="fa fa-send mg-r-10">Descargar PDF</i></a> <br><br>
                            </center>
                        </div>
                
                
                    </div>
                </body>
                @endisset
            @endif
        @endforeach
    @endforeach

</center>

    <div class="card-header">
        <a href="javascript: history.go(-1)">Volver</a><br><br>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        #galeria img {
            width: 100%;
        }
        #galeria .col-lg-4 {
            margin: 0 !important;
            padding: 25px;
        }
        #galeria img:hover {
            border: 5px solid #f7f7f7;
        }
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
@stop

@section('js')
    <script> console.log('Hi!');</script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>

    <script src="html2pdf.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <script>
        function certificar()
    {
        var c = document.getElementById("certificado");
        var ctx = c.getContext("2d");
        
        var img = document.getElementById("fondo");
        ctx.drawImage(img, 0, 0, c.width, c.height);

        ctx.font = 'bold 30px Arial';
        ctx.fillStyle = 'black';
        ctx.fillText(<?= json_encode($nombre) ?>, 250, 205);
    }
    
    function png()
    {
        var canvas = document.getElementById("certificado");
        var ctx = canvas.getContext('2d');
        let lblpng = document.createElement('a');
        lblpng.download = "Certificado_"+<?= json_encode($nombrec) ?>+".png";
        lblpng.href = canvas.toDataURL();
        lblpng.click();
    }

    </script>
@stop