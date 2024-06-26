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
    .style-label{
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
                        <h1>Crear Popups</h1>
                    </div>
                </div>
                <div class="container first-form pt-2 pb-2">

                <form action="{{ route('popups.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group">
                            <div class="row">
                                 <div class="col-md-12 title">
                                    <div class="input-group mb-3">
                                        <input type="text" id="titulo" name="title" class="form-control" placeholder="Título sección" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  add-boton">
                                <div class="col-md-12 pb-3">
                                    <div id="text">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Escribe tu contenido aquí" style="height: 250px"  id="editor" name="description"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="form-group imgUrl">
                            <div class="col-md-12 tag-comentario">
                                <div class="input-group mb-3">
                                    <input type="text" id="url" name="url" class="form-control" placeholder="Url" value="" >
                                </div>
                            </div>
                            <div class="col-md-12 pt-3 pb-3">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label style-label">Selecciona una imagen para la sección</label>
                                        <input class="form-control" type="file" name="image_url" id="img" accept="image/*" >
                                </div>
                            </div>
                        </div>
                        <div class="container pregunta mb-3">
                            <label class="style-label mb-2">Deseas agregar descripción?</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1" name="option[]">
                                        <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2" checked name="option[]">
                                        <label class="form-check-label" for="inlineCheckbox2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="container pregunta mb-3">
                            <label class="style-label mb-2">Activar el Popup?</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="" value="Si"  name="accion">
                                        <label class="form-check-label" for="">Si</label>
                                        </div>
                                </div>
                            </div>
                        </div> -->

                        <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Guardar</button>
                    </form>
                </div>
            </div>
</div>
<script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                allowedContent: true
            })
            .catch(error => {
                console.error(error);
            });
</script>
<script>
  $(document).ready(function () {
    // Ocultar el container add-boton inicialmente
    $(".add-boton").hide();
    $(".documentos-container").hide();
    $(".documentos-container-comprimido").hide();
    $(".open-other-site").hide();
    
    // Desactivar la opción "No" cuando se selecciona "Si"
    $('#inlineCheckbox1').on('click', function() {
        $('.add-boton').show();  // Mostrar la div adicional cuando se selecciona la opción 1
        $('.imgUrl').hide();
    });

    // Manejar el evento clic en la opción 2
    $('#inlineCheckbox2').on('click', function() {
        $('.add-boton').hide();  // Ocultar la div adicional cuando se selecciona la opción 2
        $('.imgUrl').show();
    });

});
    </script>