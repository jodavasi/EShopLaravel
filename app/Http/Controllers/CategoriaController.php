<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
        $categorias = Categoria::all();
        if(count($categorias)){
            return view('categorias.index',compact('categorias'));
        }
        return view('categorias.index');
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
         #region VALIDATE
         $request->validate(
            [
                'nombre' => 'required',
                
            ]);
        #endregion
        
         #region SAVE
         $model = new Categoria;
         $model->nombre = $request->nombre;
        //  dd($model->save());
         $model->save();
         #endregion
         return redirect()->route('categorias.index')->with('msg','Agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Categoria::where('id',$id)->get()[0];
        //  dd($model);
        #region VALIDATE
        $request->validate(
            [
                'nombre' => 'required',
                
            ]);
        #endregion
        
         #region SAVE
         
         
         $model->nombre = $request->nombre;
         

         $model->update();
         #endregion
         return redirect()->route('categorias.index')->with('msg','Actualizado carrectamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        
        $productos = Producto::where('categoria_id',$categoria->id)->get();
        if($productos->isEmpty()){
            $categoria->delete();
            return redirect()->route('categorias.index')->with('msg','Eliminado correctamente');
        }else{
            return redirect()->route('categorias.index')->with('msg','No se pudo eliminar, la categoría posee productos');
        }
        
    }
}
