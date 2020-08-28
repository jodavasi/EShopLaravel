@extends('layouts.appDashAdmin')

@section('content')

@if ($message = Session::get('msg'))

<div class='alert alert-dark alert-dismissible my-3 container' id='mydiv'>
    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <h5><center><strong>{{ $message }}</strong></center></h5>
</div>
@endif

<section>
    <form method="POST" action="{{route('categorias.store')}}">
        {{ csrf_field() }}
     <div class="container py-5">
         <div class="row text-center align-items-end">

         
             <div class="col-lg-12 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <h3 class="h1 font-weight-bold">Categoria</h3>
                     <div class="custom-separator my-4 mx-auto bg-warning"></div>
                     <ul class="list-unstyled my-5 text-small text-left text-center">
                         <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> Nombre
                         <br><input type="text" id ="input" name="nombre"></li>
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
         <h1 class="text-center pricing">C A T E G O R I A S</h1> <br>
         <div class="row text-center align-items-end">
             
            @if (!empty($categorias))

            @foreach($categorias as $categoria)
             <div class="col-lg-4 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <h2 class="h3 font-weight-bold">{{ $categoria->nombre }}</h2>
                     <div class="custom-separator my-4 mx-auto bg-warning"></div>
                     <ul class="list-unstyled my-5 text-small text-left">
                         <li class="mb-3" id = "nombre{{ $categoria->nombre }}"> <i class="fa fa-check mr-2 text-primary"></i> {{ $categoria->nombre }}</li>
                     </ul> 
                     <div class = "botton">
                     <button class="primary-btn"  data-toggle="modal" data-target= "#editarcategoria{{ $categoria->id }}"  >
                         <span>Edit</span><span class="lnr lnr-arrow-right"></span></button>
                         <form method="POST" action="{{route('categorias.destroy', $categoria)}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                     <button class="primary-btn" type="submit"><span>Delete</span><span class="lnr lnr-arrow-right"></span></button>
                         </form>

                        <!-- Modal -->
                        <form method="POST" action="{{route('categorias.update', $categoria->id)}}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="modal fade" id="editarcategoria{{ $categoria->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                
                                    <h3 class="h3 font-weight-bold">categoria</h3>
                                    <div class="custom-separator my-4 mx-auto bg-warning"></div>
                                    <ul class="list-unstyled my-5 text-small text-left">
                                        <li class="mb-3"> <i class="fa fa-check mr-2 text-primary"></i> nombre
                                        <input type="text" id ="input" value = "{{ $categoria->nombre }}" name="nombre"></li>
                                    </ul> 
                                                 
                                   
                            </div>
                            <!-- content modal -->
                          </div>
                            <div class="modal-footer">
                                <button type="submit" class="primary-btn"> <span>Cancel</span><span class="lnr lnr-arrow-right"></span></button>
                                <button type="submit" class="primary-btn"> <span>Save</span><span class="lnr lnr-arrow-right"></span></button>
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