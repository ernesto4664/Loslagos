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
        border-left: 2px solid #F59120;
    }
    .borderM {
        border-top: 2px solid #F59120;
        border-bottom: 2px solid #F59120;
        padding: 24px 0px;
        margin-bottom: 20px;
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
    .actividades {
        border-radius: 5px;
        height: 108px;
        border: 1px solid #F59120;
        width: 96% !important;
        margin-bottom: 20px;
    }
    .totalE{
        height: 0;
        border-left: 100px solid transparent;
        border-bottom: 106px solid #F59120;
    }
    .totalE p {
        font-family: Inter !important;
        font-size: 20px;
        font-weight: 700;
        line-height: 25px;
        letter-spacing: 0em;
        text-align: left;
        color: #fff;
        padding-top: 27px;
    }
    .totalE span {
        font-family: Inter;
        font-size: 16px;
        font-weight: 400;
        line-height: 25px;
        letter-spacing: 0em;
        text-align: left;
        color: #fff;
    }
    .tituloAct {
        font-family: Inter;
        font-size: 20px;
        font-weight: 700;
        line-height: 25px;
        letter-spacing: 0em;
        text-align: left !important;
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
    a.a4 {
        color: #00548F !important;
        border-radius: 100px !important;
        border: 1px solid #00548F !important;
        font-weight: 700 !important;
        background: #fff !important;
    }

@media (min-width: 576px) and (max-width: 768px) {
    .totalE {
        height: max-content;
        border-left: none;
        border-bottom: none;
        background: #f59120;
    }
    .totalE p {
        font-family: Inter !important;
        font-size: 20px;
        font-weight: 700;
        line-height: 25px;
        letter-spacing: 0em;
        text-align: left;
        color: #fff;
        padding: 4px 11px;
    }
    .totalE span {
        font-family: Inter;
        font-size: 16px;
        font-weight: 400;
        line-height: 25px;
        letter-spacing: 0em;
        text-align: left;
        color: #fff;
        padding: 4px 11px;
    }
    .actividades {
        border-radius: 5px;
        height: auto;
        border: 1px solid #F59120;
        width: 96% !important;
        margin-bottom: 20px;
        padding-top: 10px;
    }
}


@media (max-width: 575px) {
    .totalE {
        height: max-content;
        border-left: none;
        border-bottom: none;
        background: #f59120;
    }
    .totalE p {
        font-family: Inter !important;
        font-size: 20px;
        font-weight: 700;
        line-height: 25px;
        letter-spacing: 0em;
        text-align: left;
        color: #fff;
        padding: 4px 11px;
    }
    .totalE span {
        font-family: Inter;
        font-size: 16px;
        font-weight: 400;
        line-height: 25px;
        letter-spacing: 0em;
        text-align: left;
        color: #fff;
        padding: 4px 11px;
    }
    .actividades {
        border-radius: 5px;
        height: auto;
        border: 1px solid #F59120;
        width: 96% !important;
        margin-bottom: 20px;
        padding-top: 10px;
    }
}
.colorB{
            background-color:#00548F;
        }
        .nav-head{
            background-color:#00548f !important;
        }       
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Región de Los Lagos</title>
    <!-- Agrega aquí tus enlaces a hojas de estilo CSS, si es necesario -->
    <!-- Jquery -->
</head>
<body>
@extends('layouts.app')
@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_documentos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
<div class="container-fluid colorB">
    <div class="row">
        <div class="col-md-12">
            <div class="container pt-5 pb-5">
                <div class="row" >
                    <div class="col-md-12" >
                        <p class="style-bread"><a href="/">Home </a> / <span style="font-Weight: 700;"><a href="/gobiernoregional/asambleaclimatica">Región de Los Lagos</a></span></p>                    </div>
                    </div>
                    <div class="col-md-12 pt-5 pb-5">
                        <p class="one-title pb-4">Región de Los Lagos</p>

                        <p style="Width:auto;"  class="mb-3 descripB">Es considerada como la puerta del sur de nuestro país. Aquí comienza a sentirse de verdad el rigor del invierno</p>
                    </div>
                    
                <div class="container pt-4">
                    <div class="row">
                        
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
                        <div class="col-md-4 borderM d-block d-lg-none">
                            <div class="container img">
                                <div class="row">
                                    @include('layouts.menuestadistica') 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 ">
                            <div class="container int p-0">
                                <div class="row">
                                    <p class="style-tag pt-0 pb-4">Infórmate sobre nuestra Región...</p>
                                    <p class="title-cat pt-2 pb-2">{{ $introduccion->nombre }}</p>
                                    <p class="style-down pt-2 pb-2">Actividad Económica</p>
                                    @foreach($actividadesC as $act)
                                    <div class="container actividades ml-2 mr-2">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-7 ">
                                            <p class="tituloAct">{{ $act->nombreA }}</p>
                                            <p class="sexoAct">Hombres: {{ $act->hombres }} / Muejes: {{ $act->mujeres }}</p>
                                            </div>
                                            <div class="col-md-5 p-0">
                                                <div class="totalE">
                                                    <p>Total Exportaciones</p>
                                                    <span>{{ $act->hombres + $act->mujeres }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-md-10 mb-4">
                                        <b>Fuente:</b> Elaborado por el INE sobre la base de información del Servicio Nacional de Aduanas.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 borderR  d-none d-lg-block">
                            <div class="container img">
                                <div class="row">
                                    @include('layouts.menuestadistica') 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>    
    </main>

</body>
</html>
@endsection
 