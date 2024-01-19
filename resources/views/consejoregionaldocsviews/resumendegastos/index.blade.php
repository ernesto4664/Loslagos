<!DOCTYPE html>
<style>
    .second{
        height: 450px;
        color: #fff; /* Cambia esto al color de texto que desees */
        padding: 20px; /* Añade relleno si es necesario */
        margin: 0; /* Elimina el margen para que ocupe toda la pantalla hacia los lados */
        top: 0; /* Lo fija en la parte superior */
        left: 0; /* Lo fija en la parte izquierda */
        z-index: 1000;
    }
    p.style-bread{
        font-family:'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 19.36px;
        color: #FFFFFF;
    }
    p.style-tag{
        font-family: 'Inter';
        font-Weight: 600;
        font-Style: italic;
        font-Size: 16px;
        color: #00548F;
    }
    p.title-cat{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        Line-height: 36.31px;
        color: #565656;
    }
    p.one-title{
        font-family:'Inter';
        font-Weight: 700;
        font-Size: 50px;
        line-height: 60.51px;
        color: #FFFFFF;
    }
    .cat{
        margin-top: -5rem;
        background-color: #FFFFFF;
        border-radius: 100px 0 0 0;
    }
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    h2.mi-style{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 20px;
        line-height: 24.2px;
        color: #F59120;
    }
    p.p-doc-tit{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 20px;
        color: #565656;
    }
    p.p-doc-baj{
        font-family: 'Inter';
        font-weight: 400;
        font-size: 16px;
        color: #565656;  
    }
    @media only screen and (max-width: 600px) {
    /* Estilos para pantallas móviles aquí */
    p.one-title{
        font-size:30px !important;
        padding-bottom: 0px!important;
    }
}
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Tu Título Aquí</title>
</head>
<body>
@extends('layouts.app')
@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
<div class="container-fluid" style="background-color:#00548F;">
    <div class="row">
        <div class="col-md-12">
            <div class="container second content-breadc pt-5 pb-5">
                <div class="row" style="padding: 10px 0px 20px 55px;">
                    <div class="col-md-12" style="padding: 0;">
                    <p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/consejoregional/introduccion"><span> Consejo Regional</span></a> /<a href="/consejoregional/resumendegastos"> <span style="font-Weight: 700;">Resumen de Gastos</span></a></p>
                    </div>
                </div>
                    
                <div class="container content-prin pt-4">
                    <div class="row" style="padding: 10px 0px 0px 25px;">
                        <div class="col-md-12">
                            <p class="one-title pb-5">Consejo Regional</p>
                        </div>
                        <div class="col-md-6">
                            <p>Tiene por finalidad hacer efectiva la participación de la comunidad regional y está investido de facultades normativas, resolutivas y fiscalizadoras.</p>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>  
<main>
    <div class="container-fluid cat">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="padding: 0 0 0 2.9rem;">
                        <p class="style-tag">Infórmate sobre nuestra Región...</p>

                        <h1 class="mititulo mt-4 mb-4">Resumen de Gastos</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container second mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        @foreach ($resumenesGastos as $resumen)
                            @if ($resumen->documentonew)
                                <div class="col-md-3 mb-4">
                                    <div class="mi-documento d-flex align-items-center" style="border: 1px solid #F59120; padding: 5px;">
                                        <a href="{{ $resumen->documentonew->archivo }}" target="_blank" class="d-flex align-items-center">
                                            <img width="43px" height="44px" src="{{ asset('storage/images/pdf.png') }}" alt="Resumen de Gastos" style="margin-right: 10px;">
                                            <div>
                                                <p class="p-doc-tit">{{ $resumen->nombre }}{{ $resumen->publicacion }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                        <!-- Enlaces de paginación -->
                        <div class="row">
                            <div class="col-12">
                                {{ $resumenesGastos->links() }} <!-- Muestra los enlaces de paginación -->
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
<script>  
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.nav-head').style.cssText = 'background-color: #00548F !important; border-bottom: 1px solid #FFFFFF;border-bottom:none !important;';
        document.querySelector('.navbar').style.cssText = 'background-color: #00548F !important; border-bottom: 1px solid #FFFFFF;';
    });
</script>
@endsection