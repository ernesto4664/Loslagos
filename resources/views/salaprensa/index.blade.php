<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_salaprensa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush

<div id="banner" class="h-500 text-light d-flex align-items-center" style="background: #00548F !important; height: 502px; display: flex; padding-left: 50px;">
    <div>
        <h5>Home / Gobierno Regional</h5>
        <h1 class="titulobannernoticia">Sala de prensa </h1>
        <p>Infórmate aquí de las noticias más recientes del Gore</p>
    </div>
</div>

<div class="contenido bg-white rounded-left rounded-top-left-90 mt-n6" style="min-height: 800px; margin-top: -7vh; border-radius: 70px 0px 0px 0px;">
    <div class="row py-5 px-5">
        <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
            <h4 class="tituloform">Sala de Prensa</h4>

            <!-- Aquí se colocan las noticias -->
            <div class="row">
    @foreach($noticias as $noticia)
        <div class="col-md-3 mb-4">
            <div class="card card-noticias" >
                <img src="{{ asset($noticia->archivo_path) }}" class="card-img-top image-container" alt="Imagen de la noticia">
                <div class="card-img-overlay">
                    <div class="card-body text-white">
                        <p class="card-text noticia-categoria mb-2">{{ $noticia->categoria }}</p>
                        <h5 class="card-title titulonoticia mb-4">{{ $noticia->titulo }}</h5>
                        <a href="{{ $noticia->enlace }}" style="padding: 6%; position: absolute; bottom: 0; right: 0;">Ir ahora <i class="bi bi-arrow-right"></i></a>
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
        document.querySelector('.navbar').style.setProperty('background-color', '#00548F', 'important');
    });
</script>

@endsection
