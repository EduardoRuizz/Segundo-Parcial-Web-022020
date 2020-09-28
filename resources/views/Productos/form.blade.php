



<link rel="stylesheet" href="style.css">

@extends('plantilla')

@section('content')


<div class="container px-2">
    <br><br>
{{$Modo == 'crear' ? 'Agregar Producto' : 'Modificar Producto'}}
</div>
<BR></BR>


<div class="container-fluid px-5 bg-light ">

<form action="{{url('/productos')}}"  class="form-horizontal " method="post" enctype="multipart/form-data">


{{csrf_field()}}




<div class="form-group">
<label for="Nombre" class="control-label ">{{'Nombre'}}</label>
<input class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" type="text" name="Nombre" id="Nombre" value="{{isset($producto->Nombre)?$producto->Nombre:'' }}">
</div>


<div class="form-group">
<label for="Cantidad" class="control-label" >{{'Cantidad'}}</label>
<input class="form-control" type="number" name="Cantidad" id="Nombre" value="">
</div>

<div class="form-group">
<label class="control-label" for="Precio">{{'Precio'}}</label>
<input class="form-control" type="number" name="Precio" id="Nombre" value="">
</div>

<div class="form-group">
<label class="control-label"  for="Imagen">{{'Imagen'}}</label>
<input  class="form-control" type="file" name="Imagen" id="Nombre" value="">
</div>

<input class="btn btn-success" type="submit" value="Registrar">

<a class="btn btn-primary" href="{{url('productos')}}" >Regresar</a>

</form>

</div>
@endsection