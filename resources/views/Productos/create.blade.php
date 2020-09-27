Seccion para crear productos


<form action="{{url('/Productos')}}" method="post" enctype="multipart/form-data">


{{csrf_field()}}


<label for="Nombre">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" value="">

<label for="Nombre">{{'Cantidad'}}</label>
<input type="number" name="Cantidad" id="Nombre" value="">

<label for="Nombre">{{'Precio'}}</label>
<input type="number" name="Precio" id="Nombre" value="">

<input type="submit" value="Registrar">
</form>