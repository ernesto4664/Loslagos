<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_salaprensa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

<div id="banner" class="h-500 text-light d-flex align-items-center colorB" style="background: #00548F ; height: 502px; display: flex; padding-left: 50px;">
    <div class="container">
        <h5>Home / Sala de prensa</h5>
        <h1 class="titulobannernoticia" style="text-align: left;">Sala de prensa </h1>
        <p>Visualiza aquí las noticias, fotografías y videos relacionados a nuestra región</p>
    </div>
</div>

<div class="contenido bg-white rounded-left rounded-top-left-90 mt-n6 colorB" style="min-height: 800px; margin-top: -7vh; border-radius: 70px 0px 0px 0px;">
    <div class="row  px-5" style="padding-right: 10rem!important;
    padding-left: 10rem!important;">
        <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
            <h4 class="tituloform mb-5 colorB">Sala de Prensa</h4>

            <!-- Aquí se colocan las noticias -->
            <div class="row">
    @foreach($noticias as $noticia)
        <div class="col-md-3 mb-4">
            <div class="card card-noticias" >
             
                <img src="{{ route('mostrar.imagen', ['carpeta' => 'saladeprensa', 'imagen' => basename($noticia->archivo_path)]) }}" class="card-img-top image-container img-fluid" alt="Imagen de la noticia">
                
                <div class="card-img-overlay">
                    <div class="card-body text-white">
                       
                        <h5 class="card-title titulonoticia mb-4">{{ $noticia->titulo }}</h5>
                      <!-- Cambia el enlace existente en index.blade.php -->
<a href="{{ route('salaprensa.show', ['id' => $noticia->id]) }}" style="padding: 6%; position: absolute; bottom: 0; right: 25px;">Ir ahora <i class="bi bi-arrow-right"></i></a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>




            <!-- Paginación -->
            <div class="row">
                <div class="col-12">
                    {{ $noticias->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


<script>
   
   document.addEventListener("DOMContentLoaded", function() {
     
       document.querySelector('.nav-head').style.setProperty('background-color', '#00548F');
       document.querySelector('.backgroundB').style.setProperty('background-color', '#00548F');
   });
</script> 

@endsection
