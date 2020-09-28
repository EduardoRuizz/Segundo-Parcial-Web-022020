<form action="{{url('/productos')}}"  class="form-horizontal " method="post" enctype="multipart/form-data">

{{csrf_field()}}


@include('productos.form',['Modo'=> 'crear'])


</form>