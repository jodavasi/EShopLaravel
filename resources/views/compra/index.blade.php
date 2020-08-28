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
                     <h3 class="h1 font-weight-bold">C O M P R A S - R E A L I Z A D A S</h3>
                                  
                    </div>
             </div>
            
         </div>
     </div>
 </section>

 <section>
     <div class="container py-5">
         <div class="row text-center align-items-end">
         <?php $i = 0; $total = 0?>
            @if (!empty($productosComprados))
           
            @foreach($productosComprados as $productos)
            @foreach($productos as $producto)
            
             <div class="col-lg-4 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <li><img style="height: 100px; width: 100px" class="card-img-top rounded-circle" src="imagenes/{{ $producto->imagen }}" alt=""> </li>
                     <div class="custom-separator my-4 mx-auto bg-warning"></div>
                     <ul class="list-unstyled my-5 text-small text-center">
                            <li class="mb-3" id = "nombre{{ $producto->nombre }}">
                            <h2>{{ $producto->nombre }}</h2>
                            <i class="fa fa-check mr-2 text-primary"></i> Fecha de compra: {{ $facturas[$i]->fecha}}</li>
                            <li class="mb-3" id = "precio{{ $producto->precio }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Precio: {{ $producto->precio }} $</li>
                            <li class="mb-3" id = "precio{{ $producto->precio }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Descripcion producto: <br>{{$producto->descripcion}}</li>
                            <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Cantidad: {{$facturas[$i]->item_cantidad}}</li>
                            <?php $total = $producto->precio * $facturas[$i]->item_cantidad?>
                            <h3>Total compra: {{$total}}</h3>
                            
                            <?php $i++?>
                            
                            
                     </ul> 
                     <div class = "botton">
                     </div>              
                    </div>

             </div>
             
             @endforeach
            @endforeach
            @endif
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