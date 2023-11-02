<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap CSS y JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<div class="container-fluid principal pt-3 pb-3">
<div class="row">
    <div class="col-md-2">
        @include('layouts.menu')
    </div>
    <div class="col-md-10">
        <div class="container principal pt-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <h1>Registrar Cargo</h1>
            </div>
        </div>
        <div class="container first-form pt-2 pb-2">

        <form action="{{ route('CargoRegionLagos.storeCargo') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <div class="row">
                            <div class="col-md-12 title">
                            <div class="input-group mb-3">
                                <input type="text" id="titulo" name="nombre" class="form-control" placeholder="Titulo seccion" required>
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-success" id="Enviar" name="Enviar">Guardar</button>
            </form>
        </div>
        </div>
    </div>
</div>
</div>