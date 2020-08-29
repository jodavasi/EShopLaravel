@extends('layouts.appDashAdmin')

@section('content')

@if ($message = Session::get('msg'))

<div class='alert alert-dark alert-dismissible my-3 container' id='mydiv'>
    <a class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    <h5><center><strong>{{ $message }}</strong></center></h5>
</div>
@endif

<section class="sectionForm">
@foreach($numeros as $numero)
    <div class="container py-5">
        <div class="row text-center align-items-end"> 
            <div class="col-lg-12 mb-5 mb-lg-0" id ="divv">
                 <div class="bg-white p-5 rounded-lg shadow">
                     <h3 class="h1 font-weight-bold">E S T A D I S T I C A S</h3>
                     <h4>Cantidad de usuarios: {{$users}}</h4>
                     <h4>Cantidad de artículos vendidos: {{$numero->cantidad}}</h4>
                     <h4>Cantidad de dinero recaudado: {{$numero->total}}$</h4>
                </div>
            </div>
        </div>
    </div>
 </section>
 @endforeach





 @endsection
@section('script')
<script>
    $("#mydiv").delay(1900).fadeOut(800);
</script>
    
@endsection