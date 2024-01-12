<!DOCTYPE html>
<style>
    .second{
       /* width: 100%;*/
        height: 450px;
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
    p.style-down{
        width: 580px;
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
    .enlaces{
        Width: 392px !important;
        Height: 292px!important;
        border-radius: 10px;
        background-color: #00548F;
        color:#FFFFFF;
    }
    /*css contenido*/
    h1.mititulo{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 30px;
        color: #565656;
    }
    .accordion-item {
    		border: none !important;
		}
		button.accordion-button {
    		background-color: rgba(0, 0, 0, 0) !important;
		}
        .accordion-button:focus, .accordion-button:not(.collapsed) {
            border: none !important;
            box-shadow: none !important;
        }
        button.accordion-button::before, button.accordion-button::after{
            border: none !important;
        }

    p.title-acord-one{
		font-family: 'Inter';
		font-Weight: 700;
		font-Size: 30px;
		color: #565656;0
	}

    p.title-acord{
			font-family: 'Inter';
			font-Weight: 700;
			font-Size: 20px;
			color: #565656;0
		}
	.bajada-acord{
			font-family: 'Inter';
			font-Weight: 500;
			font-Size: 16px;
			Line-height: 19.36px;
			color: #565656;
			text-align: justify;
	}

    p.title-categ{
        font-family: 'Inter';
        font-Weight: 700;
        font-Size: 20px;
        line-height: 24.2px;
        color: #F59120
    }

    h2.mi-style-h2{
        font-family: 'Inter';
        font-Weight: 600;
        font-Size: 20px;
        font-style: italic;
        line-height: 24.2px;
        color: #F59120;
        
    }
    .mi-documento{
        display: flex;
    }
    p.mistyle-final-pcateg{
        font-family: 'Inter';
        font-weight: 500;
        font-size: 16px;
        line-height: 19.36px;
        color: #565656;
    }
    h2.h2-seccion-btn-extras{
        font-family: 'Inter';
        font-weight: 700;
        font-Size: 16px;
        line-height: 19.36px;
        color: #565656;
    }
    a.final-btn{
        padding: 10px 20px;
        border-Radius: 100px;
        background-color: #F59120;
        color: #FFFFFF;
        font-Weight: 700;
    }
    footer{
        height:535px;
        background-color: #389144;
    }
    h2.mi-style{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 20px;
        line-height: 24.2px;
        color: #F59120;
    }
    h3.mi-style{
        font-family: 'Inter';
        font-weight: 700;
        font-size: 30px;
        line-height: 24.2px;
        color: #F59120;
    }
</style>
<html>
    <head>
        <meta charset="utf-8">
        <title>Tu Título Aquí</title>
        <!-- jQuery (asegúrate de incluirlo antes de Bootstrap JS) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Bootstrap JS y Popper (incluye Bootstrap Bundle) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- Tu archivo de estilos personalizados -->
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
                    <div class="container second content-breadc pt-5 pb-5">
                        <div class="row" style="padding: 10px 0px 20px 55px;">
                            <div class="col-md-12" style="padding: 0;">
                                <p class="style-bread"><p class="style-bread"><a href="http://127.0.0.1:8000/">Home </a>/<a href="/gobiernoregional/acerca"> Gobierno Regional</a> / <a href ="/documentosdegestion">Documentos de Gestion</a> / <a style="font-Weight: 700;" href ="/documentosdegestion">Comisión Regional de Uso del Borde Costero</a></p>
                            </div>
                        </div>
                            
                        <div class="container content-prin pt-4">
                            <div class="row" style="padding: 10px 0px 0px 25px;">
                                <div class="col-md-12">
                                    <p class="one-title pb-5">Gobierno Regional</p>

                                    <p style="Width:623px;">El Gobierno Regional (GORE) es un organismo autónomo, que tiene por objetivo la administración de la región, impulsando su desarrollo económico, cultural y social</p>
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
                                    <div class="col-md-12" style="padding: 0 0 0 2.5rem;">
                                    <p class="title-cat">Selecciona una Categoría</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container set pb-4">
                        @include('layouts.listacategorias')
                        </div>
                        <div class="container content mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="accordion" id="accordionone">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <p class="title-acord-one">¿Qué es la Comisión Regional de Uso del Borde Costero?</p>
                                            </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionone">
                                                <div class="accordion-body">
                                                    <div class="bajada-acord">
                                                    <p class="bajada-acord">La CRUBC es una instancia de gestión costera en las regiones, formal, de representatividad y colegiada,
                                                    creada en 1997 y que aplica territorialmente, la Política Nacional de Uso del Borde Costero que busca compatibilizar los usos sobre las zonas costero - marinas del país, disminuyendo los conflictos por ocupación de espacios.
                                                    <br>
                                                    <br>
                                                    La misma está presidida la zona por el Gobernador Regional de Los Lagos, Patricio Vallespin,
                                                    quien está convocando a quienes estén interesados y cumplan con los requisitos para que postulen,
                                                    enviando sus datos a más tardar el viernes 10 de febrero de 2023 a las 12 horas.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="accordion" id="accordionTwo">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    <p class="title-acord">¿Cuál es el cupo disponible?</p>
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionTwo">
                                                <div class="accordion-body">
                                                    <div class="bajada-acord">
                                                        <p class="bajada-acord">La CRUBC es una instancia de gestión costera en las regiones, formal, de representatividad y colegiada,
                                                            creada en 1997 y que aplica territorialmente, la Política Nacional de Uso del Borde Costero que busca compatibilizar los usos sobre las zonas costero - marinas del país, disminuyendo los conflictos por ocupación de espacios.
                                                            <br>
                                                            <br>
                                                            La misma está presidida la zona por el Gobernador Regional de Los Lagos, Patricio Vallespin,
                                                            quien está convocando a quienes estén interesados y cumplan con los requisitos para que postulen,
                                                            enviando sus datos a más tardar el viernes 10 de febrero de 2023 a las 12 horas.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>

                                    <div class="accordion" id="accordionTree">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTree">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
                                                    <p class="title-acord">Requisitos para postular</p>
                                                </button>
                                            </h2>
                                            <div id="collapseTree" class="accordion-collapse collapse" aria-labelledby="headingTree" data-bs-parent="#accordionTree">
                                                <div class="accordion-body">
                                                    <div class="bajada-acord">
                                                        <p class="bajada-acord">La CRUBC es una instancia de gestión costera en las regiones, formal, de representatividad y colegiada,
                                                            creada en 1997 y que aplica territorialmente, la Política Nacional de Uso del Borde Costero que busca compatibilizar los usos sobre las zonas costero - marinas del país, disminuyendo los conflictos por ocupación de espacios.
                                                            <br>
                                                            <br>
                                                            La misma está presidida la zona por el Gobernador Regional de Los Lagos, Patricio Vallespin,
                                                            quien está convocando a quienes estén interesados y cumplan con los requisitos para que postulen,
                                                            enviando sus datos a más tardar el viernes 10 de febrero de 2023 a las 12 horas.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>

                                <div class="col-md-4" style="border-left: 2px solid #F59120;">
                                    <div>
                                        <h2 class="mi-style mb-4" style="width: 322px;">Selecciona una Categoría para los Documentos de Gestión</h2>
                                    </div>
                                    @include('layouts.categoriasdocumentos')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container docs">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="mi-style">Documentos</h3>

                        <div>

                        </div>
                        <div class="nota mt-4 mb-4">
                            <p class="not mb-4" style="font-family: 'Inter'; font-weight: 700; font-size: 16px; line-height: 19.36px; color: #565656;">Nota:</p>
                            <p style="font-family: 'Inter'; font-weight: 500; font-size: 16px; line-height: 19.36px; color: #565656;">Si no puede abrir directamente el documento, presione el botón derecho del mouse sobre
                               el icono de descarga y luego seleccionar "Guardar destino como...". Esto le permite guardar
                               el documento directamente a su equipo.</p>
                        </div>
                    </div>
                </div>
            </div>    
        </main>
    </body>
</html>
<script>  
    document.addEventListener("DOMContentLoaded", function() {
      
        document.querySelector('.navbar').style.cssText = 'background-color: #00548F !important; border-bottom: 1px solid #FFFFFF;';
    });
</script>
@endsection