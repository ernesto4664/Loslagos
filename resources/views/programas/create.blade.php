<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>


<style>
    h1 , h2{
        color: #565656;
    }
    .principal{
        border: 1px solid #CCCCCC;
        border-radius: 10px;       
    }
    .first-form{
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }
    input.form-control{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    font-style: italic;
    }
    .style-label, p.style-label{
    color: #565656;
    font-size: 16px;
    font-weight: 700;
    }
    .style-col-menu{
        background-color: #0c1e35;
    }
    button.btn.btn-link {
    color: #FFFFFF;
    text-decoration: none;
    font-family: unset;
    font-weight: 700;
    }
    li.style-li{
        list-style: none;
        padding-bottom: 10px;
    }
    a.style-a-menu{
    color: #FFFFFF;
    text-decoration: none;
    font-weight: 500;   
    }
    .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
    height: 350px;
    }
    p.ck-placeholder {
    height: 350px;
}

input:required {
    border: 1px solid red; /* Borde rojo para indicar campo obligatorio */
}

/* Estilo para el asterisco */
.required::before {
    content: '*';
    color: red;
    margin-right: 4px;
}
</style>
<div class="container-fluid body">
    <div class="row">
        <div class="col-md-2 style-col-menu">
            <div class="container menu">
            @include('layouts.menu')
            </div>
        </div>
        <div class="col-md-10">
        <div class="container principal mt-4 mb-4 pt-3 pb-3">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Formulario para creación de programas</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Crear programa</h2> 
                        </div>
                    </div>
                    <!-- Formulario para la creación de un nuevo programa -->
                    <form action="{{ route('programas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

<!-- Campos para el nuevo programa -->

                        <label class=" mt-3 style-label required" for="titulo">Título:</label>
                        <input class="form-control mt-2 mb-4" type="text" name="titulo" placeholder="Título" required>
                       
                        <label class="style-label mb-2" for="bajada">Bajada encabezado:</label>
                        <textarea class="form-control mt-2 mb-4" name="bajada" placeholder="Bajada"></textarea>

                        <label class="style-label mb-2" for="bajada_programa">Bajada programa:</label>
                        <textarea class="form-control mt-2 mb-4" placeholder="Escribe la bajada del programa aquí" style="height: 250px"  id="editor-bajada" name="bajada_programa"></textarea>

                        <label class="style-label mt-3" for="icono">Agregar imagen:</label>
                        <input class="form-control mt-2 mb-4" type="file" name="imagen" accept=".png, .jpg, .jpeg">
                
<!--TEXTOS ACORDEÓN-->
                        <div class="container">
                            <label class="style-label mb-2 mt-3">¿Deseas agregar un texto descriptivo?</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" checked>
                                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container texto-descriptivo mt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="style-label" for="url">Título:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="nombrebtn" placeholder="Agregar título">
                                </div>
                                <div class="col-md-12">
                                    <label class="style-label" for="url">Bajada:</label>
                                    <textarea class="form-control mt-2" placeholder="Agregar descripción" style="height: 250px"  id="editor-bajada-acor" name="bajada"></textarea>

                                </div>
                            </div>
                            <button type="button" id="agregarMas" class="btn btn-primary mt-2">Agregar otra descripción</button>
                        </div>
<!--FIN TEXTOS ACORDEÓN-->
                        
<!--BOTONES PARA DIRECCIONAR-->
                        <div class="container">
                            <label class="style-label mb-2 mt-5">¿Deseas agregar un botón que direccione?</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox11" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox11">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox22" value="option2" checked>
                                        <label class="form-check-label" for="inlineCheckbox22">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container botton-direccionar mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="style-label" for="url">Nombre del boton externo:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="nombrebtn" placeholder="Nombre del boton externo">
                                </div>
                                <div class="col-md-6">
                                    <label class="style-label" for="url">URL del boton externo:</label>
                                    <input class="form-control mt-2 mb-4" type="text" name="urlbtn" placeholder="URL del boton externo">
                                </div>
                            </div>
                            <button type="button" id="agregarMas2" class="btn btn-primary">Agregar Más</button>
                        </div>
<!--FIN BOTONES PARA DIRECCIONAR-->
                       
                        <div class="container agregar-documentos mt-4">
                          <label class="style-label mb-2">Deseas agregar Documentos?</label>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox111" value="option1">
                                      <label class="form-check-label" for="inlineCheckbox12">Si</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox222" value="option2" checked>
                                      <label class="form-check-label" for="inlineCheckbox21">No</label>
                                  </div>
                              </div>
                          </div>
                      </div>

                       <!--Campos para documentos-->
                      <div class="documentos-container mt-5">
                          <div class="documentos-input">
                              <label class="style-label" for="documentos">Agregar documento:</label>
                              <input class="form-control mt-2 mb-2" type="text" name="nombreDocumento[]" placeholder="Nombre del Documento" multiple>
                              <input class="form-control mt-2 mb-2" type="file" name="urlDocumento[]" accept=".pdf, .doc, .docx, .zip, .rar" multiple>
                          </div>
                          <button type="button" class="btn btn-primary agregar-documento mt-2">Agregar otro documento</button>
                      </div>

                    
                      <div class="container pregunta-doc mt-4">
                          <label class="style-label mb-2 mt-3">Deseas agregar colecciones?</label>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1111" value="option1">
                                      <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2222" value="option2" checked>
                                      <label class="form-check-label" for="inlineCheckbox25">No</label>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Campos para colecciones-->
                      <div class="colecciones-container mt-3">
                          <div class="colecciones-input">
                              <label class="style-label" for="colecciones">Añadir fotografías:</label>
                              <input class="form-control mt-2 mb-2" type="text" name="titulo[]" placeholder="Título de la colección" multiple>
                              <input class="form-control mt-2 mb-3" type="file" name="imagen[]" accept=".png, .jpg, .jpeg" multiple>
                          </div>
                          <button type="button" class="btn btn-primary agregar-coleccion">Agregar colección</button>
                      </div>


                            

                        <button class="mt-1 btn btn-success mt-5" type="submit">Crear Programa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 Y DOCUMENTOS

<script>
    $(document).ready(function() {
        // Agregar más documentos 
        $(".agregar-documento").click(function() {
            var documentosContainer = $(".documentos-container");
            var nuevoDocumentoInput = documentosContainer.find(".documentos-input:first").clone(); // Clona el primer conjunto de campos

            // Limpia los valores en los campos clonados
            nuevoDocumentoInput.find("input[type='file']").val('');
            nuevoDocumentoInput.find("input[type='text']").val('');

            // Genera un nuevo nombre único para cada campo clonado
            var nuevoId = Date.now(); // Utiliza la marca de tiempo actual como identificador único
            nuevoDocumentoInput.find("input[type='file']").attr('id', 'ruta_documento_' + nuevoId);
            nuevoDocumentoInput.find("input[type='file']").attr('name', 'ruta_documento[]');
            nuevoDocumentoInput.find("input[type='text']").attr('id', 'nombre_documento_' + nuevoId);
            nuevoDocumentoInput.find("input[type='text']").attr('name', 'nombre_documento[]');

            // Agrega los campos clonados al contenedor
            documentosContainer.append(nuevoDocumentoInput);
        });


        
        // Agregar más Fotografias 
        $(".agregar-coleccion").click(function() {
            var coleccionesContainer = $(".colecciones-container");
            var nuevoFotografiaInput = coleccionesContainer.find(".colecciones-input:first").clone(); // Clona el primer conjunto de campos

            // Limpia los valores en los campos clonados
            nuevoFotografiaInput.find("input[type='file']").val('');
            nuevoFotografiaInput.find("input[type='text']").val('');

            // Genera un nuevo nombre único para cada campo clonado
            var nuevoId = Date.now(); // Utiliza la marca de tiempo actual como identificador único
            nuevoFotografiaInput.find("input[type='file']").attr('id', 'imagen' + nuevoId);
            nuevoFotografiaInput.find("input[type='file']").attr('name', 'imagen[]');
            nuevoFotografiaInput.find("input[type='text']").attr('id', 'titulo' + nuevoId);
            nuevoFotografiaInput.find("input[type='text']").attr('name', 'titulo[]');

            // Agrega los campos clonados al contenedor
            coleccionesContainer.append(nuevoFotografiaInput);
        });
    });
</script>


<script>
  $(document).ready(function () {
    // Ocultar el container add-boton inicialmente
    $(".texto-descriptivo").hide();
    $(".botton-direccionar").hide();
    $(".agregar-documentos").hide();
    $(".colecciones-container").hide();
    $(".documentos-container-comprimido").hide();
    $(".open-other-site").hide();
    
    // Desactivar la opción "No" cuando se selecciona "Si"
    $("#inlineCheckbox1").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox2").prop("checked", false);
        $(".texto-descriptivo").slideDown(); // Mostrar el container add-boton
      } else {
        $(".texto-descriptivo").slideUp(); // Ocultar el container add-boton
      }
    });

    $("#inlineCheckbox11").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox22").prop("checked", false);
        $(".botton-direccionar").slideDown(); 
      } else {
        $(".botton-direccionar").slideUp(); 
      }
    });

    $("#inlineCheckbox111").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox222").prop("checked", false);
        $(".agregar-documentos").slideDown(); 
      } else {
        $(".agregar-documentos").slideUp(); 
      }
    });

    $("#inlineCheckbox1111").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox2222").prop("checked", false);
        $(".colecciones-container").slideDown(); 
      } else {
        $(".colecciones-container").slideUp(); 
      }
    });


    // Desactivar la opción "Si" cuando se selecciona "No"
    $("#inlineCheckbox2").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox1").prop("checked", false);
        $(".texto-descriptivo").slideUp();    
      }
    });

    $("#inlineCheckbox22").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox11").prop("checked", false);
        $(".botton-direccionar").slideUp();    
      }
    });

    $("#inlineCheckbox222").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox111").prop("checked", false);
        $(".agregar-documentos").slideUp();    
      }
    });

    $("#inlineCheckbox2222").change(function () {
      if ($(this).prop("checked")) {
        $("#inlineCheckbox1111").prop("checked", false);
        $(".colecciones-container").slideUp();    
      }
    });

  

    // Botón "Agregar Más" para duplicar los inputs
    $("#agregarMas").click(function () {
      // Clonar el primer par de inputs y agregar al final
      var nuevoBoton = $(".texto-descriptivo .row").first().clone();
      $(".texto-descriptivo .row:last").after(nuevoBoton);
    });

    $("#agregarMas2").click(function () {
      // Clonar el primer par de inputs y agregar al final
      var nuevoBoton = $(".botton-direccionar .row").first().clone();
      $(".botton-direccionar .row:last").after(nuevoBoton);
    });
   
  });


  
</script>
// ClassicEditor
<script>
ClassicEditor
    .create(document.querySelector('#editor-bajada' ), {
        allowedContent: true
    })
    .catch(error => {
        console.error(error);
    });
</script>

<script>
ClassicEditor
    .create(document.querySelector('#editor-bajada-acord'), {
        allowedContent: true
    })
    .catch(error => {
        console.error(error);
    });
</script>