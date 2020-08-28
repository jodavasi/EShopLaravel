<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        if(count($productos) && count($categorias)){
            return view('productos.index',compact('productos', 'categorias'));
        }
        return view('productos.index', compact('categorias'));
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
        $catNombre = Categoria::where('id', $request->categoria_id)->get()[0];

        #region VALIDATE
        $request->validate(
            [
                'SKU' => 'required',
                'nombre' => 'required',
                'descripcion' => 'required',
                'imagen' => 'required',
                'stock' => 'required',
                'precio' => 'required',
                'categoria_id' => 'required',
                
            ]);
        #endregion

        
         #region SAVE
         $model = new Producto;
         $model->SKU = $request->SKU;
         $model->nombre = $request->nombre;
         $model->descripcion = $request->descripcion;
         $model->imagen = $request->imagen;
         $model->stock = $request->stock;
         $model->precio = $request->precio;
         $model->categoria_id = $request->categoria_id;
         $model->categoria_nombre = $catNombre->nombre;
         $model->save();
         #endregion
         return redirect()->route('productos.index')->with('msg','Agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $catNombre = Categoria::where('id', $request->categoria_id)->get()[0];
        $model = Producto::where('id',$id)->get()[0];
        #region VALIDATE
        $request->validate(
            [
                'SKU' => 'required',
                'nombre' => 'required',
                'descripcion' => 'required',
                'imagen' => 'required',
                'stock' => 'required',
                'precio' => 'required',
                'categoria_id' => 'required',
                
            ]);
        #endregion
        
         #region SAVE
         $model->SKU = $request->SKU;
         $model->nombre = $request->nombre;
         $model->descripcion = $request->descripcion;
         $model->imagen = $request->imagen;
         $model->stock = $request->stock;
         $model->precio = $request->precio;
         $model->categoria_id = $request->categoria_id;
         $model->categoria_nombre = $catNombre->nombre;
         $model->update();
         #endregion
         return redirect()->route('productos.index')->with('msg','Actualizado carrectamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('msg','Eliminado correctamente');
    }
}
