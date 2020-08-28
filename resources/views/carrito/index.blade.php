@extends('layouts.appDashUser')

@section('content')

@if ($message = Session::get('msg'))

<div class='alert alert-dark alert-dismissible my-3 container' id='mydiv'>
    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <h5><center><strong>{{ $message }}</strong></center></h5>
</div>
@endif

<section class="sectionForm">
    
    
     <div class="container py-5">
         <div class="row text-center align-items-end">

         
             <div class="col-lg-12 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <h3 class="h1 font-weight-bold">C A R R I T O</h3>
                                  
                    </div>
             </div>
            
         </div>
     </div>
 </section>

 <section>
     <div class="container py-5">
         <div class="row text-center align-items-end">
         <?php $i = 0?>
            @if (!empty($productosCarritos))
           
            @foreach($productosCarritos as $productos)
            @foreach($productos as $producto)
            
             <div class="col-lg-4 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <li><img style="height: 100px; width: 100px" class="card-img-top rounded-circle" src="imagenes/{{ $producto->imagen }}" alt=""> </li>
                     <div class="custom-separator my-4 mx-auto bg-warning"></div>
                     <ul class="list-unstyled my-5 text-small text-center">
                            <li class="mb-3" id = "nombre{{ $producto->nombre }}">
                            <h2>{{ $producto->nombre }}</h2>
                            <li class="mb-3" id = "precio{{ $producto->precio }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Precio: {{ $producto->precio }} $</li>
                            <li class="mb-3" id = "precio{{ $producto->precio }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Subtotal producto: {{ $carritos[$i]->total }} $</li>
                            <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Cantidad: {{$carritos[$i]->cantidad_producto}}</li>
                            
                            <?php $i++?>
                            
                            
                     </ul> 
                     <div class = "botton">
                    <form method="POST" action="{{route('carrito.destroy', $producto->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                     <button class="primary-btn" type="submit"><span>Eliminar</span><span class="lnr lnr-arrow-right"></span></button>
                         </form>



                     </div>              
                    </div>

             </div>
             
             @endforeach
            @endforeach
            @endif
         </div>
     </div>
 </section>
 <section class="sectionForm">
    
    
    <div class="container py-5">
        <div class="row text-center align-items-end">

        
            <div class="col-lg-12 mb-5 mb-lg-0" id ="divv">
                <div class="bg-white p-5 rounded-lg shadow">
                    <h3 class="h1 font-weight-bold">T O T A L</h3>
                    <div>
                        <input type="number" id ="inputTotal" name ="inputTotal" value="{{$total}}" disabled>$</li>
                        
                        <form method="POST" action="{{route('carrito.store')}}">
                            {{ csrf_field() }}
                            <input type="hidden" id ="inputTotal" name ="inputTotal" value="{{$total}}">
                            <br><button class="primary-btn" type="submit"><span>Formalizar Compra</span><span class="lnr lnr-arrow-right"></span></button>
                         </form>
                    </div>
                                 
                   </div>
            </div>
           
        </div>
    </div>
</section>



 @endsection
@section('script')
<script>
    $("#mydiv").delay(1900).fadeOut(800);

</script>
    


<script>
    // function updateCartItem(obj,id){
    //             alert(id);
            
        
    // }

//     $(":input").bind('keyup mouseup', function () {
//     alert($(this));    
// });
    </script>

@endsection