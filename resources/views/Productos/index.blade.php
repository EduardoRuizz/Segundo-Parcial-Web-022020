
@extends('plantilla')

@section('content')

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif





<br>


<div class="container-fluid px-4">

<a href="{{url('productos/create')}}" class="btn btn-success">Agregar Producto</a> 
</div>



   

<div class="container-fluid px-4">

    <br><br>
    <table class="table table-hover">


        <thead class="thead-dark">
            <tr>
                <th>#</th>

                <th>Imagen</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr class="shadow-sm ">
                <td>{{$loop -> iteration}}</td>

                <td><img src="{{ asset('storage').'/'.$producto-> Imagen}}"  class="img-thumbnail img-fluid" alt="" width="100"></td>
                <td>{{$producto-> Nombre}}</td>
                <td>{{$producto-> Cantidad}}</td>
                <td>{{$producto-> Precio}}</td>
                
                <td>  
                    <form method="post" action="{{url('/productos/'.$producto ->id)}}" style="display:inline">

                    {{csrf_field()}}

                    {{method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                        
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
 </div>

@endsection


