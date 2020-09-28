





@extends('plantilla')

@section('content')



<div class="container-fluid bg-dark text-light align-text-top" style="Height:50">


<span class="px-4">{{$Modo == 'crear' ? 'Agregar Producto' : 'Modificar Producto'}}</span>
</div>

<div class="container-fluid px-5 bg-light ">
<br>

<div class="form-group">
<label for="Nombre" class="control-label ">{{'Nombre'}}</label>
<input class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" type="text" name="Nombre" id="Nombre" value="{{ isset($producto -> Nombre)?$producto->Nombre:''}}">
</div>

<div class="form-group">
<label for="Cantidad" class="control-label" >{{'Cantidad'}}</label>
<input class="form-control" type="number" name="Cantidad" id="Nombre" value="{{ isset($producto -> Cantidad)?$producto->Cantidad:''}}">
</div>

<div class="form-group">
<label class="control-label" for="Precio">{{'Precio'}}</label>
<input class="form-control" type="number" name="Precio" id="Nombre" value="{{ isset($producto -> Precio)?$producto->Precio:''}}">
</div>


<div class="form-group">
<label class="control-label"  for="Imagen">{{'Imagen'}}</label>


@if(isset($producto->Imagen))
<br>
<img src="{{ asset('storage').'/'.$producto-> Imagen}}"  class="img-thumbnail img-fluid" alt="" width="100">
<br>
@endif


<input  class="form-control" type="file" name="Imagen" id="Nombre" value="">
</div>

<input class="btn btn-success" type="submit" value="{{$Modo == 'crear' ? 'Agregar' : 'Modificar'}}">

<a class="btn btn-primary" href="{{url('productos')}}" >Regresar</a>



</div>
@endsection