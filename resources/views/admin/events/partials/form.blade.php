<!-- Nombre del Evento -->

<div class="form-group">
    {!! Form::label('evento', 'Evento') !!}
    {!! Form::text('evento', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el evento que se realizara']) !!}
</div>

@error('evento')
    <span class="text-danger">{{$message}}</span>
@enderror

<!-- detalle  -->

<div class="form-group">
    {!! Form::label('detalle', 'Detalle') !!} 
    {!! Form::textarea('detalle', null, ['class' => 'form-control', 'placeholder'=>'Ingrese los detalles del evento']) !!}
</div>

@error('detalle')
    <span class="text-danger">{{$message}}</span>
@enderror

{{-- Seleccionar si el evento tiene costo --}}

<div class="form-group">
    {{-- <button type="button" onclick="mostrarCosto();" >Evento tiene Costo</button> --}}
    {!! Form::label('', 'El evento tendrá Costos:') !!} <br>
    <input type="radio" onclick="mostrarCosto();" name="radiob"> SI
    <input type="radio" onclick="ocultarCosto();" name="radiob"> NO
</div>

<!-- Costo de la actividad -->
<div id="costos">
    
    <div class="form-group">
        {!! Form::label('costo_student', 'Costo Para Estudiantes') !!}
        {!! Form::number('costo_student', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el costo para estudiantes']) !!}
    </div>

    @error('costo_student')
        <span class="text-danger">{{$message}}</span>
    @enderror

    <div class="form-group">
        {!! Form::label('costo_prof', 'Costo Para Profesionales') !!}
        {!! Form::number('costo_prof', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el costo para profesionales']) !!}

    </div>

    @error('costo_prof')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>   

<!-- Fecha inicio de la Actividad -->

<div class="form-group">
    {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
    {!! Form::date('fecha_inicio', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la fecha de inicio del evento']) !!}
</div>

@error('fecha_inicio')
    <span class="text-danger">{{$message}}</span>
@enderror

<!-- Fecha finalizacion de la actividad -->

<div class="form-group">
    {!! Form::label('fecha_fin', 'Fecha Finalizacion') !!}
    {!! Form::date('fecha_fin', null, ['class' => 'form-control', 'placeholder'=>'Ingrese la fecha de finalizacion del evento']) !!}
</div>

@error('fecha_fin')
    <span class="text-danger">{{$message}}</span>
@enderror

<!-- link de whatsapp -->

<div class="form-group">
    {!! Form::label('link_whatsapp', 'WhatsApp') !!}
    {!! Form::text('link_whatsapp', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el link para whatsapp']) !!}
</div>

@error('link_whatsapp')
    <span class="text-danger">{{$message}}</span>
@enderror

<!-- Link de telegram -->

<div class="form-group">
    {!! Form::label('link_telegram', 'Telegram') !!}
    {!! Form::text('link_telegram', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el link de telegram']) !!}
</div>

@error('link_telegram')
    <span class="text-danger">{{$message}}</span>
@enderror


<!-- estado del evento -->

<div class="form-group">
    Estado: &nbsp;<br>
    {!! Form::label('estado', 'Borrador') !!}
    {!! Form::radio('estado', 1, true )!!}
    {!! Form::label('estado', 'publicado') !!}
    {!! Form::radio('estado', 2) !!}
</div>

@error('estado')
    <span class="text-danger">{{$message}}</span>
@enderror



<!-- Imagen  -->

<div class="row mb-3">
    <div class="col">
        @isset ($event->imagen)
            <div class="image-wrapper">
                <img id="img" src="{{Storage::url($event->imagen)}}" alt="">
            </div> 
        @else
            <div class="image-wrapper">
                <img id="img" src="{{asset('asset/img/DSC_0006.jpg')}}" alt="">
            </div>
        @endisset  
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('imagen', 'Imagen') !!} <br>
            {!! Form::file('imagen', ['accept'=>'image/*', 'class' => 'form-control-file']) !!}
        </div>
        @error('imagen')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
<!-- Expositor o expositores -->

<div class="form-group">
    {!! Form::label('users', 'Seleccionar Expositores') !!}
    
    <select name="users[]" class="form-control selectpicker" id="users" title="--- Seleccione expositores ---" multiple>
        @foreach ($users as $user)
            <option value="{{$user->id}}"> {{$user->name}}</option>
        @endforeach
    </select>
</div>

@error('users')
    <span class="text-danger">{{$message}}</span>
@enderror

{{-- Organizador --}}

<div class="form-group">
    {!! Form::label('id_organizador', 'Organizador') !!}
    {!! Form::select('id_organizador', $organizers, null, ['class' => 'form-control', 'placeholder' => '--- Seleccione al organizador ---']) !!}


    {{-- <select name="id_organizador" class="form-control selectpicker" id="id_organizador" title=" --- Seleccionar Organizador ---">
        @foreach ($organizers as $organizer)
            <option value="{{$organizer->id}}"> {{$organizer->unidad}} - {{$organizer->provincia}}</option>
        @endforeach
    </select> --}}
</div>

@error('id_organizador')
    <span class="text-danger">{{$message}}</span>
@enderror

<div class="form-group">
    {!! Form::label('province_id', 'Organizador') !!}
    {!! Form::select('province_id', $provinces, null, ['class' => 'form-control', 'placeholder' => '--- Seleccione la provincia ---']) !!}
</div>

@error('province_id')
    <span class="text-danger">{{$message}}</span>
@enderror
