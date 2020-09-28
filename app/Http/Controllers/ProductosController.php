<?php



namespace App\Http\Controllers;

use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     


        
        $name = $request->get('buscarpor');


        $datos=productos:: where('Nombre', 'LIKE', "%$name%") -> paginate(5);
        return view('productos.index',compact('datos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //



        

        return view('productos.create');

        



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        // $datosProductos = request() -> all();

        $datosProductos = request() -> except('_token');


        if($request -> hasFile('Imagen')){

            $datosProductos['Imagen']= $request -> file('Imagen') -> store('uploads','public');
        }

        productos::insert($datosProductos);

        // return response() -> json($datosProductos);

      return redirect('productos') -> with('Mensaje','Producto Agregado con Exito');








    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      

        $producto = productos::findOrFail($id);

        return view('productos.edit',compact('producto'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $datosProductos = request() -> except(['_token','_method']);


        if($request -> hasFile('Imagen')){


            $producto = productos::findOrFail($id);

            Storage::delete('public/'.$producto -> Imagen);



            $datosProductos['Imagen']= $request -> file('Imagen') -> store('uploads','public');
        }

        productos::where('id','=',$id) -> update($datosProductos);


       return redirect('productos') -> with('Mensaje','Producto Modificado con Exito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $producto = productos::findOrFail($id);

        if(Storage::delete('public/'.$producto -> Imagen)){
            productos::destroy($id);
        }

        return redirect('productos') -> with('Mensaje','Producto Eliminado con Exito');



    }
}
