<!DOCTYPE html>
<html lang="en">
    @extends('layouts.header')
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">
    
    <title>CPCF</title>
    <style>
        /* Bienvenida */
        .bienvenida h1{
                color: rgb(4, 4, 70);
                padding-top: 3%;
                padding-bottom: 2%;
                text-align: center;
                font-weight: 500;
                font-size: 35px;
                font-family:Verdana, Geneva, Tahoma, sans-serif;
            }
    </style>
    
<body onload="certificar()">
    <div class="container-fluid p-5 bg-dark"></div>
    {{-- Bienvenida a la pagina de registro --}}
    <div class="alert bienvenida">
        <h1>{{$event->evento}}</h1>
    </div>

    {{-- Certificado del estudiante --}}
    <div class="container relative">

                <img id="fondo" src="{{Storage::url($image->imagen)}}" style="display: none" class="img-fluid">

            <center>
                <canvas id="certificado" width="877" height="620" style="border:1px sxolid #d3d3d3;" class="img-fluid"></canvas>
            </center>
            <br>
            <center>
                <div class="btn-light text-center col-sm-5">
                    <br><p>
                        !!! El certificado estará disponible para su descarga solamente durante un determinado tiempo !!! 
                    </p><br>
                </div>
            </center>
            
        <p>
        </p>

        <div class="form-layout-footer">
            <center>
                <button class="btn btn-info btn-outline-dark" onclick="png()" id="btnpng" ><i class="fa fa-send mg-r-10">Descargar PNG</i></button>

                &nbsp;&nbsp;&nbsp;&nbsp;

                <a href="{{route('pdf', $student)}}" class="btn btn-info btn-outline-dark"><i class="fa fa-send mg-r-10">Descargar PDF</i></a> <br><br>
            </center>
        </div>


    </div>
</body>
    @extends('layouts.footer')

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>

    <script src="html2pdf.bundle.min.js"></script>

    {{-- <script src="{{asset('js/certificate.js')}}"></script> --}}


    <script>
        function certificar()
    {
        var c = document.getElementById("certificado");
        var ctx = c.getContext("2d");
        
        var img = document.getElementById("fondo");
        ctx.drawImage(img, 0, 0, c.width, c.height);

        ctx.font = 'bold 30px Arial';
        ctx.fillStyle = 'black';
        ctx.fillText(<?= json_encode($nombre) ?>, 150, 205);
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

</html>