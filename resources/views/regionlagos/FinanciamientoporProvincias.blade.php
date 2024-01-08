<!DOCTYPE html>
<style>
    .enlaceM {
        color: #565656;
    }
    .enlaceM:hover {
        font-Weight: 700;
    }
    .enlaceM{
        padding: 10px 0px;
        width: fit-content;
    }
    .infoR{
        font-family: Inter;
         font-size: 20px;
          font-weight: 700;
           line-height: 24px;
            letter-spacing: 0em;
             text-align: left;
              color: #F59120;
    }
    .borderR{ 
        border-right: 2px solid #F59120;
    }
    header{
       /* width: 100%;*/
        height: 450px;
        background-color: #00548F;
        color: #fff; /* Cambia esto al color de texto que desees */
        padding: 20px; /* Añade relleno si es necesario */
        margin: 0; /* Elimina el margen para que ocupe toda la pantalla hacia los lados */
        /*position: fixed;*/
        top: 0; /* Lo fija en la parte superior */
        left: 0; /* Lo fija en la parte izquierda */
        z-index: 1000;
    }
    .top-bar{
        border-bottom: 1px solid #FFFFFF;
    }
    nav ul {
        list-style: none; 
        padding: 0; 
        display: flex; 
    }

    nav li {
        margin-right: 20px; 
    }

    nav a {
        text-decoration: none; 
    }
    p.style-bread{
        font-family:'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 19.36px;
        color: #FFFFFF;
    }
    p.style-tag {
        font-family: Inter;
        font-size: 30px;
        font-weight: 700;
        line-height: 36px;
        letter-spacing: 0em;
        text-align: left;
        color: #565656;
    }
    p.title-cat{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        Line-height: 36.31px;
        color: #565656;
    }
    p.style-down{
        width: auto;
        font-family: 'Inter';
        font-Weight: 500;
        font-Size: 16px;
        Line-height: 24px;
        color: #565656;
        text-align: justify;
    }
    p.style-btn {
        padding: 7px 27px;
    }
    a.style-btn, p.style-btn{
        Width: 175px;
        Height: 40px;
        background-color: #FFFFFF33;
        color: #FFFFFF;
        font-family:'Inter';
        font-Weight: 700;
        font-Size: 16px;
        border-radius: 100px;
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
    /*lista categorias*/
    .lista-categorias {
        width: 100%;
        box-sizing: border-box;
    }

    #categoriasToggle {
        display: none;
    }

    #categorylist {
        display: table;
    }

    #categorylist li:first-child {
        position: relative;
    }

    #categorylist li {
        margin-right: 30px;
        margin-top: 10px;
        float: left;
    }

    #categorylist li a {
        box-sizing: border-box;
        font-family: 'Inter';
        background: none repeat scroll 0 0 #E5E8ED;;
        border: 1px solid #E5E8ED;
        border-radius: 8px;
        color: #565656;
        display: block;
        font-size: 16px;
        font-weight: 400;
        padding: 4px 12px;
        margin-top: 5px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: none;
    }

    #categorylist li a:hover{
        background-color: #64C69F;
        color: #FFFFFF;
    }

    #categoriasToggle {
        display: none;
    }
    .enlaces{
        Width: 392px !important;
        Height: 292px!important;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    footer{
        height:535px;
        background-color: #389144;
    }
    .fotoA img {
        width: 313px;
        height: 348px;
        border-radius: 0px 0px 100px 0px;
        object-fit: cover;
    }
    p.style-nombre {
        font-family: Inter;
        font-size: 20px;
        font-style: italic;
        font-weight: 600;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        color: #00548F;
    }
    .info h3 {
        font-family: Inter;
        font-size: 20px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    p.style-B{
        font-family: Inter;
        font-size: 20px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        color: #565656;
    }
    p.descripcion-B {
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
    }
    table.table, .table th,.table td  {
        border: 1px solid #F59120;
    }
    .tituloTable{
        background-color: #F59120 !important;
        height: 48px;
        font-family: Inter;
        font-size: 18px;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
        color: #fff !important;
    }
    th.tituloT {
        font-family: Inter;
        font-size: 18px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
    }
    th.tituloTS{
        font-family: Inter;
        font-size: 18px;
        font-weight: 500;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
    }
    .cajaElementor {
        border: 1px solid #F59120;
        border-radius: 5px;
    }
    p.titulo {
        font-family: Inter;
        font-size: 20px;
        font-weight: 700;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
    }
    p.mb-2.subtitulo {
        font-family: Inter;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        letter-spacing: 0em;
        text-align: left;
    }
    p.fechas {
        font-family: Inter;
        font-size: 16px;
        font-weight: 700;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
    }
    p.fechas span {
        font-family: Inter;
        font-size: 16px;
        font-weight: 400;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
    }
    p.style-tag {
    font-family: 'Inter';
    font-Weight: 600;
    font-Style: italic;
    font-Size: 16px;
    color: #00548F;
}
p.descripcion1.pt-0.pb-4 {
    font-family: Inter;
    font-size: 20px;
    font-weight: 700;
    line-height: 24px;
    letter-spacing: 0em;
    text-align: left;
}
p.valor1.mb-5 {
    font-family: Inter;
    font-size: 20px;
    font-weight: 400;
    line-height: 24px;
    letter-spacing: 0em;
    text-align: left;
}
.totalE{
    height: 0;
    border-left: 100px solid transparent;
    border-bottom: 100px solid #f0ad4e;
}
.backgroundB{
        background-color: #00548F !important;
    }
    .descripB{
        font-family: Inter;
        font-size: 16px;
        font-weight: 500;
        line-height: 19px;
        letter-spacing: 0em;
        text-align: left;
        color:#fff;

    }
    a.a5 {
    color: #00548F !important;
    border-radius: 100px !important;
    border: 1px solid #00548F !important;
    font-weight: 700 !important;
}
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Región de los Lagos</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo CSS, si es necesario -->
    <!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
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
            <div class="container pt-5 pb-5">
                <div class="row" >
                    <div class="col-md-12" >
                        <p class="style-bread"><a href="/">Home </a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/asambleaclimatica">Región de los Lagos</a></span></p>                    </div>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">Región de los Lagos</p>

                        <p style="Width:623px;"  class="mb-3 descripB">Es considerada como la puerta del sur de nuestro país. Aquí comienza a sentirse de verdad el rigor del invierno</p>
                    </div>
                    
                <div class="container pt-4">
                    <div class="row">
                        
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div> 
    <!-- Contenido principal de tu página -->
    <main>
    <div class="container-fluid cat">
        <div class="row">
            <div class="col-md-12 pt-4 pb-4">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 mt-5 pb-4">
                            <p class="title-cat mt-5">Selecciona una Categoría</p>
                        </div>
                    </div>
                </div>
                <div class="container set pb-4">
                    @include('layouts.listacategoriasRegionLagos')
                </div>
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-8 borderR">
                            <div class="container int">
                                <div class="row">
                                    <p class="title-cat mb-5">{{ $articulo1->titulo }}</p>
                                    <p class="subtitle-cat mb-5"><b>Periodo: </b>{{ $articulo1->periodo }}</p>

                                    <div class="col-md-6 mb-4">
                                        <div class="col-md-12 cajaElementor mb-4 p-3">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="titulo pb-2">Llanquihue</p>
                                                        <div class="container p-0">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <b>Inversión $</b>
                                                                    <?php
                                                                    $Llanquihue = number_format($articulo1->provinciaInversionLD, 0, ',', '.');
                                                                    ?> 
                                                                    {{ $Llanquihue }}
                                                                    
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>Inversión %</b>
                                                                    {{ $articulo1->provinciaInversionLP }}%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="col-md-12 cajaElementor mb-4 p-3">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="titulo pb-2">Chiloe</p>
                                                        <div class="container p-0">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <b>Inversión $</b>
                                                                    <?php
                                                                    $Chiloe = number_format($articulo1->provinciaInversionCD, 0, ',', '.');
                                                                    ?> 
                                                                    {{ $Chiloe }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>Inversión %</b>
                                                                    {{ $articulo1->provinciaInversionCP }}%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="col-md-12 cajaElementor mb-4 p-3">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="titulo pb-2">Osorno</p>
                                                        <div class="container p-0">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <b>Inversión $</b>
                                                                    <?php
                                                                    $Osorno = number_format($articulo1->provinciaInversionOD, 0, ',', '.');
                                                                    ?> 
                                                                    {{ $Osorno }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>Inversión %</b>
                                                                    
                                                                    {{ $articulo1->provinciaInversionOP }}%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="col-md-12 cajaElementor mb-4 p-3">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="titulo pb-2">Palena</p>
                                                        <div class="container p-0">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <b>Inversión $</b>
                                                                    <?php
                                                                    $Palena = number_format($articulo1->provinciaInversionPD, 0, ',', '.');
                                                                    ?> 
                                                                    {{ $Palena }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>Inversión %</b>
                                                                    {{ $articulo1->provinciaInversionPP }}%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="col-md-12 cajaElementor mb-4 p-3">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="titulo pb-2">Regional</p>
                                                        <div class="container p-0">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <b>Inversión $</b>
                                                                    <?php
                                                                    $Regional = number_format($articulo1->provinciaInversionRD, 0, ',', '.');
                                                                    ?> 
                                                                    {{ $Regional }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <b>Inversión %</b>
                                                                    {{ $articulo1->provinciaInversionRP }}%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pb-5">
                                    <div class="container cajaElementor p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="titulo pb-2">Total Región</p>
                                                <div class="container p-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <b>Inversión $</b>
                                                            <?php
                                                                $TotalD=0;
                                                                $TotalD = $articulo1->provinciaInversionRD + $articulo1->provinciaInversionLD + $articulo1->provinciaInversionCD+$articulo1->provinciaInversionOD+$articulo1->provinciaInversionPD;
                                                                $TotalD = number_format($TotalD, 0, ',', '.');
                                                            ?> 
                                                            
                                                            {{ $TotalD }}
                                                        </div>
                                                        <div class="col-md-6">
                                                            <b>Inversión %</b>
                                                            <?php
                                                                $TotalP=0;
                                                                $TotalP = $articulo1->provinciaInversionRP + $articulo1->provinciaInversionLP + $articulo1->provinciaInversionCP+$articulo1->provinciaInversionOP+$articulo1->provinciaInversionPP;
                                                                
                                                            ?> 
                                                            {{ $TotalP }}%
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <p class="subtitle-cat"><b>Fuente: </b>{{ $articulo1->fuente }}</p>
                                    <p class="subtitle-cat"><b>Periodo: </b>{{ $articulo1->descripcion }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <p class="infoR pb-4">Información de Inversiones</p>
                            <div class="container img">
                                <div class="row">
                                
                                <a  href="{{ route('Inversiones.index') }}" class="p-0 pt-2 pb-2" style="{{ request()->is('regionlagos/inversiones') ? 'font-weight: 700;' : '' }}">
                                    Descripción General
                                </a>
                                <a  href="{{ route('InversionPublicaEfectivaWeb.index') }}" class="p-0 pt-2 pb-2" style="{{ request()->is('regionlagos/InversionPublicaEfectiva') ? 'font-weight: 700;' : '' }}">
                                    Inversión Pública Efectiva Según Sectores
                                </a>
                                <a  href="{{ route('FinanciamientoporProvinciasWeb.index') }}" class="p-0 pt-2 pb-2" style="{{ request()->is('regionlagos/FinanciamientoporProvincias') ? 'font-weight: 700;' : '' }}">
                                    Financiamiento por Provincias
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
    </main>

    <!-- Agrega aquí tus scripts de JavaScript, si es necesario -->
</body>
</html>
@endsection
