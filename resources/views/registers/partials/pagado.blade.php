{{-- Nombre Y apellidos --}}

<div class="form-group mb-3">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => '', 'placeholder'=>'Nombre']) !!}

    {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
    {!! Form::text('apellido_paterno', null, ['class' => '', 'placeholder'=>'Primer apellido ']) !!}

    {!! Form::label('apellido_materno', 'Apellido Materno') !!}
    {!! Form::text('apellido_materno', null, ['class' => '', 'placeholder'=>'Segundo apellido']) !!}
</div>

    @error('nombre')
        <span class="text-danger">{{$message}}</span>
    @enderror
    @error('apellido_paterno')
        <span class="text-danger">{{$message}}</span>
    @enderror    
    @error('apellido_materno')
        <span class="text-danger">{{$message}}</span>
    @enderror

{{-- Email --}}
<div class="form-group mb-3">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null , ['class' => 'form-control', 'placeholder'=>'Example@gmail.com']) !!}
</div>

    @error('email')
        <span class="text-danger">{{$message}}</span>
    @enderror

{{-- Numero C.I. --}}
<div class="form-group mb-3">
    {!! Form::label('carnet_identidad', 'Numero C.I.') !!}
    {!! Form::number('carnet_identidad', null, ['class' => 'form-control', 'placeholder'=>'Ingrese su numero de carnet de identidad ']) !!}
</div>

    @error('carnet_identidad')
        <span class="text-danger">{{$message}}</span>
    @enderror

{{-- Numero de Celular --}}
<div class="form-group mb-3">
    {!! Form::label('n_celular', 'Numero de Celular') !!}
    {!! Form::number('n_celular', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el numero de celular ']) !!}
</div>

    @error('n_celular')
        <span class="text-danger">{{$message}}</span>
    @enderror

