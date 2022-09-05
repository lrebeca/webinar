<!DOCTYPE html>
<html lang="en">
    @extends('layouts.header')
    <link rel="shortcut icon" href="{{asset('favicons/favicon.ico')}}" type="image/x-ico">
    <title>CPCF</title>
<body onload="certificar()">
    <div class="container-fluid p-5 bg-dark"></div>
    {{-- Bienvenida a la pagina de registro --}}
    <div class="alert alert-dark text-center">
        <h1>Su certificado es:  </h1>
    </div>

        {{$student->nombre}}
        {{$student->id_evento}}

    {{-- Certificado del estudiante --}}
    <div class="container relative">

        @foreach ($certificates as $certificate)
        @foreach ($images as $image)
            @if ($student->id_evento == $certificate->id_evento)
            @if ($certificate->image_id == $image->id)
                <img id="fondo" src="{{Storage::url($image->imagen)}}" style="display: none">
            @endif
            @endif
        @endforeach
        @endforeach
        <br>

        <canvas id="certificado" width="900" height="600" style="border:1px solid #d3d3d3;" ></canvas>


        <p>
            Este certificado solamente estará disponible para su descarga durante un mes, en caso de no descargarlo en ese tiempo deve apersonarse a las oficinas de la institución
        </p>

        <div class="form-layout-footer">
            <button class="btn btn-info btn-outline-dark" ><i class="fa fa-send mg-r-10"></i> PNG</button>
            <button class="btn btn-info" onclick="certificado()"><i class="fa fa-send mg-r-10"></i>PDF</button> 
            <br>
        </div>
    </div>

    


    <script type="text/javascript" charset="utf-8" >

        function certificar()
        {
            var c = document.getElementById("certificado");
            var ctx = c.getContext("2d");
            
            var img = document.getElementById("fondo");
            ctx.drawImage(img, 0, 0, c.width, c.height);

            ctx.font = '60px Arial';
            ctx.fillText('nombre', 40, 180);

            console.log($student);
            
        }
        
    </script>
</body>
</html>


@extends('layouts.footer')