<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Carrito;
use Illuminate\Http\Request;

class CarritoUsuarioController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $carritos = Carrito::where('id_cliente',$id)->get();
        $productosCarritos =[]; 
        foreach ($carritos as $carrito ) {
            array_push($productosCarritos,Producto::where('id',$carrito->id_producto)->get());

        }
        // dd($productosCarritos);
        
        if(count($productosCarritos)){
            return view('carrito.index',compact('productosCarritos'));
        }
        return view('carrito.index');
    }

    public function destroy($id)
    {
      
        Carrito::where('id_producto', $id)->delete();
        return redirect()->route('carrito.index')->with('msg','Eliminado del carrito correctamente');
    }
}
