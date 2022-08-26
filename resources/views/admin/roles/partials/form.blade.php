<!-- Nombre del rol -->
<div class="form-group">
    {!! Form::label('name', 'Nombre: ') !!} 
    {!! Form::text('name', null, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : '') , 'placeholder'=>'Ingrese nombre del rol']) !!}
</div>

@error('name')
    <span class="text-danger">{{$message}}</span>
@enderror

<!-- permisos --> <br>
<strong>Permisos</strong>
@foreach ($permissions as $permission)
    <div>
        <label for="">
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{$permission->name}}
        </label>
    </div>
@endforeach
@error('permissions')
    <span class="text-danger">{{$message}}</span>
@enderror 

