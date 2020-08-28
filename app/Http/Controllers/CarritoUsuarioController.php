<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Carrito;
use App\Factura;
use Illuminate\Http\Request;

class CarritoUsuarioController extends Controller
{
    public function index()
    {
        $total = 0;
        $id = auth()->user()->id;
        $carritos = Carrito::where('id_cliente',$id)->get();
        foreach ($carritos as $carro) {
            $total += $carro->total;
        }
        $productosCarritos =[]; 
        foreach ($carritos as $carrito ) {
            array_push($productosCarritos,Producto::where('id',$carrito->id_producto)->get());

        }
        // dd($productosCarritos);
        
        if(count($productosCarritos)){
            return view('carrito.index',compact('productosCarritos', 'carritos','total'));
        }
        return view('carrito.index', compact('total'));
    }

    public function destroy($id)
    {
      
        Carrito::where('id_producto', $id)->delete();
        return redirect()->route('carrito.index')->with('msg','Eliminado del carrito correctamente');
    }





    public function store()
    {
        $hoy = date("j/n/Y"); 
        $i = 0;
        $id = auth()->user()->id;
        $carritos = Carrito::where('id_cliente',$id)->get();
         
        $productosCarritos =[]; 
        foreach ($carritos as $carrito ) {
            array_push($productosCarritos,Producto::where('id',$carrito->id_producto)->get());
        }
        foreach ($productosCarritos as $productos) {
            foreach($productos as $producto){
                $model = new Factura;
                $model->item_id = $producto->id;
                $model->cliente_id = $id;
                $model->item_cantidad = $carritos[$i]->cantidad_producto;
                $model->fecha = $hoy;
                $model->save();
                $i++;
            }
            
        }
        Carrito::where('id_cliente', $id)->delete();
        return redirect()->route('ventas.index')->with('msg','Se ha comprado correctamente!');
        
    }
}
