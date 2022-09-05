<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}} 

    <style>
        #fondo{
            background-image: url({{Storage::url($image->imagen)}});
        }
    </style>

</head>
<body >
    <div id="fondo">
        <div>
            {{-- <img id="" src="{{Storage::url($image->imagen)}}"  width="508" height="480"> --}}
            <h1>CERTIFICADO</h1> <br><br>
            A: {{$student->nombre}} {{$student->apellido_paterno}} {{$student->apellido_materno}}
        </div>
        <div>
            
            {{-- @foreach ($events as $event)
                @if ($student->id_evento == $event->id)
                    
                @endif
            @endforeach
            @foreach ($certificates as $certificate)
                @if ($student->id_evento == $certificate->id_evento)
                    {{$certificate->detalle}}
                @endif
            @endforeach --}}
        </div>
    </div>
</body>
</html>