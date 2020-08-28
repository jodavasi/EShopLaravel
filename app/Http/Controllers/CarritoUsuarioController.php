<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Carrito;
use App\Factura;
use App\Numeros;
use App\usuario;
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





    public function store(Request $request)
    {
        $hoy = date("j/n/Y"); 
        $i = 0;
        $id = auth()->user()->id;
        $cantidadGlobal = 0;
        $totalProducto = 0;
        $restaStock = 0;
        $idProducto;
        $totalGeneral = 0;
        $carritos = Carrito::where('id_cliente',$id)->get();
        $modelEst = Usuario::where('usuario_id',$id)->get()[0];
        $modelGeneral = Numeros::where('id',1)->get()[0];

        $totalProducto = $modelEst->total;
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
                $restaStock += $carritos[$i]->cantidad_producto;
                $idProducto = $producto->id;
                
                $cantidadGlobal += $carritos[$i]->cantidad_producto; 
                
            }
            $modelPro = Producto::where('id',$idProducto)->get()[0];
            $modelPro->stock -= $restaStock; 
            $modelPro->update();
            $i++;
                
        }
        
        $totalProducto += $request->inputTotal;
        
        $modelEst->total = $totalProducto;
        $modelEst->cantidad += $cantidadGlobal;
        $modelEst->update();

        $modelGeneral->total += $totalProducto;
        $modelGeneral->cantidad += $cantidadGlobal;
        $modelGeneral->update();
        
        Carrito::where('id_cliente', $id)->delete();
        return redirect()->route('ventas.index')->with('msg','Se ha comprado correctamente!');
        
    }
}
