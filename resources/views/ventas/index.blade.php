@extends('layouts.appDashUser')

@section('content')

@if ($message = Session::get('msg'))

<div class='alert alert-dark alert-dismissible my-3 container' id='mydiv'>
    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <h5><center><strong>{{ $message }}</strong></center></h5>
</div>
@endif

<section class="sectionForm">
    
    <form>
        {{ csrf_field() }}
     <div class="container py-5">
         <div class="row text-center align-items-end">

         
             <div class="col-lg-12 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <h3 class="h1 font-weight-bold">C A T E G O R I A S</h3>
                     <div class="custom-separator my-4 mx-auto bg-warning"></div>
                     <ul class="list-unstyled my-5 text-small text-left text-center">
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Seleccione una Categoria <br>
                            <select name="categoria_id" id="categoria_id">
                            @if (!empty($categorias))
                            @foreach($categorias as $categoria)
                                <option name="categoria_id" value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                            @endif
                            </select>
                        </li>
                        

                     </ul> 
                     <div class = "botton">
                     <button class="primary-btn" type="submit"><span>Desplegar</span><span class="lnr lnr-arrow-right"></span></button>
                     </div>              
                    </div>
             </div>
            
         </div>
     </div>
    </form>
 </section>

 <section>
     <div class="container py-5">
         <h1 class="text-center pricing">P R O D U C T O S</h1> <br>
         <div class="row text-center align-items-end">
             
            @if (!empty($productos))

            @foreach($productos as $producto)
            @if ($producto->stock > 0)
             <div class="col-lg-4 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <li><img style="height: 100px; width: 100px" class="card-img-top rounded-circle" src="imagenes/{{ $producto->imagen }}" alt=""> </li>
                     <div class="custom-separator my-4 mx-auto bg-warning"></div>
                     <ul class="list-unstyled my-5 text-small text-center">
                            <li class="mb-3" id = "nombre{{ $producto->nombre }}">
                            <h2>{{ $producto->nombre }}</h2>
                            <li class="mb-3" id = "SKU{{ $producto->SKU }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Codigo de producto: {{ $producto->SKU }}</li>
                            <i class="fa fa-check mr-2 text-primary"></i> {{ $producto->nombre }}</li>
                            <li class="mb-3" id = "descripcion{{ $producto->descripcion }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Descripción: {{ $producto->descripcion }}</li>
                            <li class="mb-3" id = "stock{{ $producto->stock }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Unidades: {{ $producto->stock }}</li>
                            <li class="mb-3" id = "precio{{ $producto->precio }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Precio: {{ $producto->precio }} $</li>
                            <li class="mb-3" id = "categoria_nombre{{ $producto->categoria_nombre }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Categoría: {{ $producto->categoria_nombre }}</li>
                            <li class="mb-3" id = "categoria_id{{ $producto->categoria_id }}">
                            <i class="fa fa-check mr-2 text-primary"></i> identificador de la Categoría: {{ $producto->categoria_id }}</li>
                            
                            
                            
                           
                     </ul> 
                     <div class = "botton">
                         <form method="POST" action="{{route('ventas.store', $producto)}}">
                            {{ csrf_field() }}
                            <input id="id_producto" name="id_producto" type="hidden" value="{{$producto->id}}">
                            <i class="fa fa-check mr-2 text-primary"></i> Cantidad</li>
                            <br><input type="number" id ="cantidad_producto" name="cantidad_producto" min="1" max="{{ $producto->stock }}" value="1"></li>
                            <input type="hidden" id ="precio" name="precio" value="{{ $producto->precio }}">
                            <br><br><button class="primary-btn" type="submit"><span>Añadir al Carrito</span><span class="lnr lnr-arrow-right"></span></button>
                         </form>



                     </div>              
                    </div>

             </div>
             @else
             
             <div class="col-lg-4 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <li><img style="height: 100px; width: 100px" class="card-img-top rounded-circle" src="imagenes/{{ $producto->imagen }}" alt=""> </li>
                     <div class="custom-separator my-4 mx-auto bg-warning"></div>
                     <ul class="list-unstyled my-5 text-small text-center">
                            <li class="mb-3" id = "nombre{{ $producto->nombre }}">
                            <h2>{{ $producto->nombre }}</h2>
                            <li class="mb-3" id = "SKU{{ $producto->SKU }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Codigo de producto: {{ $producto->SKU }}</li>
                            <i class="fa fa-check mr-2 text-primary"></i> {{ $producto->nombre }}</li>
                            <li class="mb-3" id = "descripcion{{ $producto->descripcion }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Descripción: {{ $producto->descripcion }}</li>
                            <li class="mb-3" id = "stock{{ $producto->stock }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Unidades: {{ $producto->stock }}</li>
                            <li class="mb-3" id = "precio{{ $producto->precio }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Precio: {{ $producto->precio }} $</li>
                            <li class="mb-3" id = "categoria_nombre{{ $producto->categoria_nombre }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Categoría: {{ $producto->categoria_nombre }}</li>
                            <li class="mb-3" id = "categoria_id{{ $producto->categoria_id }}">
                            <i class="fa fa-check mr-2 text-primary"></i> identificador de la Categoría: {{ $producto->categoria_id }}</li>
                            <div class="no-disponible"><h2>Fuera de stock</h2></div>
                            
                            
                           
                     </ul> 
                                  
                    </div>

             </div>
             @endif
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
    
@endsection