@extends('layouts.appDashAdmin')

@section('content')

@if ($message = Session::get('msg'))

<div class='alert alert-dark alert-dismissible my-3 container' id='mydiv'>
    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <h5><center><strong>{{ $message }}</strong></center></h5>
</div>
@endif

<section class="sectionForm">
    
    <form method="POST" action="{{route('productos.store')}}">
        {{ csrf_field() }}
     <div class="container py-5">
         <div class="row text-center align-items-end">

         
             <div class="col-lg-12 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <h3 class="h1 font-weight-bold">Producto</h3>
                     <div class="custom-separator my-4 mx-auto bg-warning"></div>
                     <ul class="list-unstyled my-5 text-small text-left text-center">
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> SKU
                        <br><input type="text" id ="input" name="SKU"></li>
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Nombre
                        <br><input type="text" id ="input" name="nombre"></li>
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Descripción
                        <br><input type="text" id ="input" name="descripcion"></li>
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Imagen
                        <br><input  type="file" name="imagen">
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Stock
                        <br><input type="number" id ="input" name="stock" min="0" value="0"></li>
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Precio
                        <br><input type="number" id ="input" name="precio" min="0" value="0"></li>
                        
                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Categoria <br>
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
                     <button class="primary-btn" type="submit"><span>Guardar</span><span class="lnr lnr-arrow-right"></span></button>
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
             <div class="col-lg-4 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <li><img style="height: 100px; width: 100px" class="card-img-top rounded-circle" src="imagenes/{{ $producto->imagen }}" alt=""> </li>
                     <div class="custom-separator my-4 mx-auto bg-warning"></div>
                     <ul class="list-unstyled my-5 text-small text-center">
                            <li class="mb-3" id = "nombre{{ $producto->nombre }}">
                            <h2>{{ $producto->nombre }}</h2>
                            <li class="mb-3" id = "SKU{{ $producto->SKU }}">
                            <i class="fa fa-check mr-2 text-primary"></i> Codigo de producto: {{ $producto->SKU }}</li>
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
                     <button class="primary-btn"  data-toggle="modal" data-target= "#editarproducto{{ $producto->id }}"  >
                         <span>Editar</span><span class="lnr lnr-arrow-right"></span></button>
                         <form method="POST" action="{{route('productos.destroy', $producto)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                     <button class="primary-btn" type="submit"><span>Eliminar</span><span class="lnr lnr-arrow-right"></span></button>
                         </form>

                        <!-- Modal -->
                        <form method="POST" action="{{route('productos.update', $producto->id)}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="modal fade" id="editarproducto{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                
                            <!-- content modal -->
                            <div class="col-lg-4 mb-5 mb-lg-0" id ="divv">
                                
                                    <h3 class="h3 font-weight-bold">producto</h3>
                                    <div class="custom-separator my-4 mx-auto bg-warning"></div>
                                    <ul class="list-unstyled my-5 text-small text-left">
                                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> SKU
                                        <br><input type="text" id ="input" name="SKU" value = "{{ $producto->SKU }}"></li>
                                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Nombre
                                        <input type="text" id ="input" name="nombre" value = "{{ $producto->nombre }}"></li>
                                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Descripción
                                        <input type="text" id ="input" name="descripcion" value = "{{ $producto->descripcion }}"></li>
                                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Stock
                                        <br><input type="number" id ="input" name="stock" value = "{{ $producto->stock }}"></li>
                                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Precio
                                        <br><input type="number" id ="input" name="precio" value = "{{ $producto->precio }}"></li>
                                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Imagen </li>
                                        <input  type="file" value = "{{ $producto->imagen }}" name="imagen">
                                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Categoria <br>
                                            <select name="categoria_id" id="categoria_id">
                                            @if (!empty($categorias))
                                            @foreach($categorias as $categoria)
                                                <option name="categoria_id" value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                            @endforeach
                                            @endif
                                            </select>
                                        </li>

                                    </ul> 
                                                 
                                   
                            </div>
                            <!-- content modal -->
                          </div>
                            <div class="modal-footer">
                                <button type="submit" class="primary-btn"> <span>Cancelar</span><span class="lnr lnr-arrow-right"></span></button>
                                <button type="submit" class="primary-btn"> <span>Guardar</span><span class="lnr lnr-arrow-right"></span></button>
                            </div>
                            </div>
                        </div>
                        </div>
                        </form>
                        <!-- modal -->

                     </div>              
                    </div>

             </div>
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