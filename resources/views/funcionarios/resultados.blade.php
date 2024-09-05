<!-- resources/views/documentos/index.blade.php -->

@extends('layouts.app')

@section('content')
@push('styles')
    <link href="{{ asset('css/estilos_funcionarios.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endpush
    

    <div id="banner" class=" h-500  text-light colorB" style="background-color: #389144 ; height: 502px; display: flex;
        flex-wrap: wrap;
        align-content: center;
        align-items: center;
        padding-left: 50px;">
        <div class="container">
            <h5>Home / Directorio funcionarios</h5>
            <h1 class="titulofun" style="text-align: left;">Funcionarios </h1>
            <p>Proveer servicios de información de los funcionarios públicos de la Región De Los Lagos</p>
        </div>
    </div>

    <div class="contenido colorB seleccionycategoria" style=" margin-top: -6vh;
    ">
        <div class="container py-3">
            <div id="divformulario" class="col-md-8 col-lg-12" style="padding: 4%;">
            <p class="parrafo1 p-1 colorB">Infórmate sobre nuestra Región...</p>
                <h4 class="tituloform colorB">Nuestro Directorio</h4>
                <p class="parrafo2 p-1 colorB">El objetivo del Directorio Funcionario Digital es el proveer servicios de información de los funcionarios públicos de la Región De Los Lagos para la institucionalidad pública regional y la comunidad en general.</p>
                <form action="{{ url('/funcionarios/buscar') }}" method="POST">
            @csrf
            <div class="row">
            <div class="col-md-6">
                    <select class="form-select mt-4" aria-label="Default select example" id="departamento" name="departamento" >
               
                    <option value="" disabled selected>Seleccione Departamento</option>
                    @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento }}">{{ $departamento }}</option>
                    @endforeach
                </select>
                    </div>

                    <div class="col-md-6">
                    <select class="form-select mt-4" aria-label="Default select example" id="division" name="division" >
                        
                    <option value="" disabled selected>Seleccione División</option>
                    @foreach ($divisiones as $division)
                    <option value="{{ $division }}">{{ $division }}</option>
                    @endforeach
                    </select>
                    </div>

            </div>
            
            
            
            
            
            <input class="form-control mt-2" name="nombre" id="nombre" placeholder="Ingrese Nombre y/o Apellido de Funcionario">
                <div class="pt-5" style="direction: rtl;">
                <button class="btn text-light" style="background-color: #F59120;">Buscar Ahora</button>
                </div>
                </form>
            </div>
            
        </div>
   
  
        <div class="row p-5">
        @foreach($funcionarios as $funcionario)
    <div class="col-md-4">
        <a style="margin-bottom:15px">
            <div class="divtitulodocsdes" style="display: inline-flex; padding-bottom: 50px;">
                <div>
                    @if ($funcionario->foto)
                        <img src="{{ route('mostrar.imagen', ['carpeta' => 'funcionarios', 'imagen' => basename($funcionario->foto)]) }}" alt="" style="max-width: 100px; height: 100px; border-radius: 50%; overflow: hidden;">
                    @else
                        <img src="{{ asset('images/Rectangle190.png') }}" alt="Imagen por defecto" style="max-width: 100px; height: 100px; border-radius: 50%; overflow: hidden;">
                    @endif
                </div>
                <div style="padding-left:3%">
                    <p class="tituloresultadobuscador1 colorB">{{ $funcionario->nombre }}</p>
                    <p class="textoresultadobuscador1 colorB">Institución: <span class="textoresultadobuscador2 colorB">Gobierno Regional de Los Lagos</span></p>
                    <p class="textoresultadobuscador1 colorB">Cargo: <span class="textoresultadobuscador2 colorB">{{ $funcionario->cargo }}</span></p>
                    <p class="textoresultadobuscador1 colorB">Departamento: <span class="textoresultadobuscador2 colorB">{{ $funcionario->departamento }}</span></p>
                    <p class="textoresultadobuscador1 colorB">Correo: <span class="textoresultadobuscador2 colorB">{{ $funcionario->email }}</span></p>
                    <p class="textoresultadobuscador1 colorB">División: <span class="textoresultadobuscador2 colorB">{{ $funcionario->division }}</span></p>
                    <p class="textoresultadobuscador1 colorB">Teléfono: <span class="textoresultadobuscador2 colorB">{{ $funcionario->telefono }}</span></p>
                    <p class="textoresultadobuscador1 colorB">Dirección: <span class="textoresultadobuscador2 colorB">{{ $funcionario->direccion }}</span></p>
                </div>

            </div>
        </a>
    </div>
@endforeach

<!-- Mostrar enlaces de paginación -->
<div class="pagination">
{{ $funcionarios->appends(request()->except('page'))->links() }}
</div>

            </div>
        </div>
    </div>
<script>
    // En tu script JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        var divisionSelect = document.getElementById('division');
        var departamentoSelect = document.getElementById('departamento');

        divisionSelect.addEventListener('change', function () {
            var selectedDivision = this.value;
            var departamentos = <?php echo json_encode($departamentos); ?>;

            // Limpiar opciones anteriores
            departamentoSelect.innerHTML = '<option value="" disabled selected>Seleccione Departamento</option>';

            // Agregar nuevas opciones
            if (departamentos[selectedDivision]) {
                departamentos[selectedDivision].forEach(function (departamento) {
                    var option = document.createElement('option');
                    option.value = departamento;
                    option.text = departamento;
                    departamentoSelect.add(option);
                });
                departamentoSelect.disabled = false; // Habilitar el segundo select
            } else {
                departamentoSelect.disabled = true; // Deshabilitar si no hay departamentos
            }
        });
    });
</script>

<script>
    // Función para capitalizar la primera letra de cada palabra
    function capitalizeWords(str) {
        return str.replace(/\b\w/g, function(char) {
            return char.toUpperCase();
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        var nombreInput = document.getElementById('nombre');

        nombreInput.addEventListener('input', function () {
            this.value = capitalizeWords(this.value);
        });
    });
</script>

@endsection
