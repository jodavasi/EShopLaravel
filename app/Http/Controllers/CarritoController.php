<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Producto;
use App\Carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $categorias = Categoria::all();
        $cat = $request->get('categoria_id');

        $productos = Producto::where('categoria_id','like',"%$cat%")->get();
        
        return view('ventas.index', compact('productos','categorias'));
        // $productos = Producto::all();
      
        //return view('ventas.index', compact('categorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = auth()->user()->id;

        //dd($id,$request->id_producto,$request->cantidad_producto);
        
        $request->validate(
            [
                'id_producto' => 'required',
                'cantidad_producto' => 'required',
                
            ]);
        $intId=(int)$request->id_producto;
        $intCantidad=(int)$request->cantidad_producto;
            

        $model = new Carrito;
        $model->id_cliente = $id;
        $model->id_producto = $intId;
        $model->cantidad_producto = $intCantidad;
        $model->save();
            //dd($model);

        return redirect()->route('ventas.index')->with('msg','Se ha agregado correctamente a su carrito!');
            
            

        
    }
    
   

    /**
     * Display the specified resource.
     *
     * @param  \App\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function show(carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function edit(carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\carrito  $carrito
     * @return \Illuminate\Http\Response
     */
    public function destroy(carrito $carrito)
    {
        //
    }
}
