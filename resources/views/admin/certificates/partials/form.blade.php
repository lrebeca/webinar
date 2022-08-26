 <!-- Evento -->
 <div class="form-group">
    {!! Form::label('id_evento', 'Evento') !!}
    
    <select name="id_evento" id="" class="form-control">
        <option value="">-- Seleccione un Evento --</option>
        @foreach ($events as $event)
            <option value="{{$event->id}}">{{$event->evento}}</option>
        @endforeach
    </select>
</div>

@error('id_evento')
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

<!-- Fecha -->

<div class="form-group">
    {!! Form::label('fecha', 'Fecha') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control', 'placeholder'=>'Ingrese el link']) !!}
</div>

@error('fecha')
    <span class="text-danger">{{$message}}</span>
@enderror

<!-- Imagen -->
<div class="form-group">
{!! Form::label('image_id', 'Imagen') !!}

<div class="row">
    @foreach ($images as $image)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <img src="{{Storage::url($image->imagen)}}" alt="Image" width="350px">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="image_id" id="image_id" value="{{$image->id}}">
                <label class="form-check-label" for="image_id">Seleccionar Imagen</label>
            </div> 
        </div>
    @endforeach
</div>

@error('image_id')
<span class="text-danger">{{$message}}</span>
@enderror
