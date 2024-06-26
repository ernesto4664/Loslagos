<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programas;
use App\Models\Programasbtn;
use App\Models\ProgramasColecciones;
use App\Models\ProgramasDescripciones;
use App\Models\ProgramasDocumentos;
use App\Models\ProgramasFotografias;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;





class ProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programas::all(); // Cambiar el nombre del modelo

        return view('programas.index', compact('programas'));
    //IMPRESION DE LA RELACION DE TABLAS
        $programas = Programas::with('descripcion')->get();
        return view('programas.index', compact('programas'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required',
            'bajada' => 'required',
            'bajada_programa' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          //  'imagen' => 'required|image|mimes:png,jpg,jpeg|max:2048', // Ajusta los formatos y el tamaÃ±o segÃºn tus necesidades
        ]);

        
        $programas = Programas::create($data);
        $programasid = $programas->id;
        $seleccion = $request->input('si_descripcion');
        $seleccion_btn = $request->input('si_btn');
        $seleccion_coleccion = $request->input('si_coleccion');

   // Procesar la imagen si estÃ¡ presente
   if ($request->hasFile('imagen')) {
    $iconoPath = $request->file('imagen')->store('imagenes_programas', 'public');
    $programas->update(['imagen' => $iconoPath]);
}

try {
    // Procesar documentos (individuales y comprimidos)
    $nombresDocumentos = $request->input('nombreDocumento');
    $urlDocumentos = $request->file('urlDocumento') ?? [];

    foreach ($urlDocumentos as $key => $documento) {
        // Obtener el nombre proporcionado por el usuario
        $nombreIngresado = $nombresDocumentos[$key];

        // Obtener la extensiÃ³n original del documento
        $extension = $documento->getClientOriginalExtension();

        // Generar un nombre Ãºnico para el archivo
        $nombreUnico = uniqid('documento_', true) . '.' . $extension;

        // Definir la ruta donde se guardarÃ¡ el documento
        $ruta = 'public/documentosdelosprogramas';

        // Crear la carpeta si no existe
        if (!Storage::exists($ruta)) {
            Storage::makeDirectory($ruta);
        }

        // Guardar el documento con el nombre Ãºnico en la ruta definida
        $urlDocumento = $documento->storeAs($ruta, $nombreUnico);

        // Almacenar en la base de datos el nombre proporcionado por el usuario
        ProgramasDocumentos::create([
            'programa_id' => $programas->id,
            'nombreDocumento' => $nombreIngresado, // Usar el nombre ingresado por el usuario
            'urlDocumento' => $urlDocumento,
        ]);
    }
} catch (\Exception $e) {
    // Manejar la excepciÃ³n, por ejemplo, registrar un mensaje en los logs
    \Log::error('Error al procesar documentos: ' . $e->getMessage());
}


        
          //DESCRIPCION
        if ($seleccion=="option1"){
            $titulo_descripcion = $request->input('titulo_descripcion', []);
            $bajada_descripcion = $request->input('bajada_descripcion', []);

            foreach ($titulo_descripcion ?? [] as $key => $campo) {
              ProgramasDescripciones::create(['titulo_descripcion' => $titulo_descripcion[$key],'bajada_descripcion' => $bajada_descripcion[$key],'programa_id' => $programasid]); // Ajusta segÃºn tus necesidades
             }
        }
            //botones
            if ($seleccion_btn=="option1"){
                $nombrebtn = $request->input('nombrebtn', []);
                $urlbtn = $request->input('urlbtn', []);

                foreach ($nombrebtn ?? [] as $key => $campo) {
                Programasbtn::create(['nombrebtn' => $nombrebtn[$key],'urlbtn' => $urlbtn[$key],'programa_id' => $programasid]); // Ajusta segÃºn tus necesidades
                }
            }

            if ($seleccion_coleccion == "option1") {
                $titulo_coleccion = $request->input('titulo_coleccion', []);
                
                foreach ($titulo_coleccion ?? [] as $key => $titulo) {
                    $coleccionesid = ProgramasColecciones::create([
                        'titulo_coleccion' => $titulo_coleccion[$key],
                        'programa_id' => $programasid
                    ]);
            
                    $coleccionesid = $coleccionesid->id;
            
                    if ($request->hasFile('ruta')) {
                        // Recorrer cada archivo asociado a la colecciÃ³n actual
                        foreach ($request->file('ruta') ?? [] as $archivo) {
                            $nombreArchivo = $archivo->getClientOriginalName();
                            $ruta = 'imagenes_programas/' . $nombreArchivo;
                            $archivo->storeAs('imagenes_programas', $nombreArchivo, 'public');
            
                            $fotografiasid = ProgramasFotografias::create([
                                'ruta' => $ruta,
                                'coleccion_id' => $coleccionesid
                            ]);
                        }
                    }
                }
            }            
                return redirect()->route('programas.index')->with('success', 'Programa creado exitosamente.');
    }
    public function mostrarImagen($imagen) {
        return response()->file(storage_path('app/public/imagenes_programas/' . $imagen));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
            $programaColecciones = Programas::with('colecciones')->findOrFail($id);
            $programa  = Programas::findOrFail($id);
            $programaDescripcion = $programa->descripcion;
            $programaBtn = $programa->botones; 
            $programaDocumentos = $programa->documentos; 
            /*$programaColecciones = $programa->colecciones; 
            $programaFotografias = $programaColecciones->fotografias; */

          
           

            //$programa = Programas::where('id', $id)->get();
            return view('programas.show', compact('programa', 'programaDescripcion', 'programaBtn', 'programaDocumentos'));
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
{
    $programa = Programas::findOrFail($id);
    $botones = $programa->botones;
    $descripciones = $programa->descripcion;
    $documentos = $programa->documentos;
    $colecciones = $programa->colecciones;

    // Obtener las fotografÃ­as de cada colecciÃ³n
    foreach ($colecciones as $coleccion) {
        $coleccion->fotografias;
    }

    return view('programas.edit', compact('programa', 'botones', 'descripciones', 'documentos', 'colecciones'));
}



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validar los datos entrantes
    $request->validate([
        'titulo' => 'required|string|max:255',
        'bajada' => 'nullable|string',
        'bajada_programa' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Encontrar el programa
    $programa = Programas::findOrFail($id);

    // Actualizar los campos del programa
    $programa->titulo = $request->input('titulo');
    $programa->bajada = $request->input('bajada');
    $programa->bajada_programa = $request->input('bajada_programa');

    // Procesar la imagen si estÃ¡ presente
    if ($request->hasFile('imagen')) {
        // Eliminar la imagen anterior si existe
        if ($programa->imagen) {
            Storage::delete('public/' . $programa->imagen);
        }

        // Guardar la nueva imagen
        $iconoPath = $request->file('imagen')->store('imagenes_programas', 'public');
        $programa->imagen = $iconoPath;
    }

    // Guardar los cambios
    $programa->save();

    // Redirigir con mensaje de Ã©xito
    return redirect()->route('programas.index')->with('success', 'Programa editado exitosamente.');
}


    public function agregarDescripcion(Request $request, $id)
{
    // ValidaciÃ³n de los datos del formulario si es necesario

    // Buscar el programa por ID
    $programa = Programas::find($id);
    $seleccion = $request->input('si_descripcion');

    // Verificar si el programa existe
    if ($programa) {
        if ($seleccion == "si") { // Corregir aquÃ­ para que coincida con el valor del formulario
            $titulo_descripcion = $request->input('titulo_descripcion', []);
            $bajada_descripcion = $request->input('bajada_descripcion', []);

            foreach ($titulo_descripcion as $key => $titulo) { // No necesitas el operador de fusiÃ³n de null aquÃ­
                ProgramasDescripciones::create([
                    'titulo_descripcion' => $titulo,
                    'bajada_descripcion' => $bajada_descripcion[$key], // Accede al mismo Ã­ndice en el array de bajada_descripcion
                    'programa_id' => $programa->id
                ]);
            }

            return redirect()->back()->with('success', 'Texto descriptivo agregado correctamente.');
        } else {
            // No se seleccionÃ³ agregar descripciÃ³n, puedes agregar un mensaje de error si lo deseas
            return redirect()->back()->with('error', 'No se seleccionÃ³ agregar descripciÃ³n.');
        }
    }

    return redirect()->back()->with('error', 'No se encontrÃ³ el programa.');
}



public function agregarBoton(Request $request, $id)
{
    // Buscar el programa por ID
    $programa = Programas::find($id);
    $seleccion = $request->input('si_boton');

    // Verificar si el programa existe
    if ($programa) {
        if ($seleccion == "si") {
            

// Obtener los datos del formulario
$textos_boton = $request->input('nombrebtn', []);
$urls_boton = $request->input('urlbtn', []);


            // Verificar si se han proporcionado datos para los botones
            if (!empty($textos_boton) && !empty($urls_boton)) {
                // Iterar sobre los botones proporcionados
                foreach ($textos_boton as $key => $texto) {
                    // Crear un nuevo botÃ³n en la base de datos
                    Programasbtn::create([
                        'nombrebtn' => $texto,
                        'urlbtn' => $urls_boton[$key],
                        'programa_id' => $programa->id

                    ]);
                }

                return redirect()->back()->with('success', 'Botones agregados correctamente.');
            } else {
                // No se proporcionaron datos para los botones
                return redirect()->back()->with('error', 'Por favor, proporcione al menos un botÃ³n para agregar.');
            }
        } else {
            // No se seleccionÃ³ agregar botones
            return redirect()->back()->with('info', 'No se seleccionÃ³ agregar botones.');
        }
    }

    return redirect()->back()->with('error', 'No se encontrÃ³ el programa.');
}





public function agregarDocumento(Request $request, $id)
{
    // Buscar el programa por ID
    $programa = Programas::find($id);

    // Verificar si el programa existe
    if ($programa) {
        // Obtener los nombres de los documentos y los archivos cargados
        $nombresDocumentos = $request->input('nombreDocumento');
        $documentos = $request->file('urlDocumento');

        // Verificar si se han cargado archivos y se han proporcionado nombres
        if ($documentos && $nombresDocumentos) {
            // Definir la ruta donde se guardarÃ¡n los documentos
            $ruta = 'public/documentosdelosprogramas';
            
            // Crear la carpeta si no existe
            if (!Storage::exists($ruta)) {
                Storage::makeDirectory($ruta);
            }

            foreach ($documentos as $index => $documento) {
                // Obtener el nombre del documento proporcionado por el usuario
                $nombreDocumento = $nombresDocumentos[$index];
                
                // Generar un nombre Ãºnico para el archivo
                $extension = $documento->getClientOriginalExtension();
                $nombreUnicoArchivo = uniqid('documento_', true) . '.' . $extension;

                // Guardar el archivo con el nombre Ãºnico
                $documento_path = $documento->storeAs($ruta, $nombreUnicoArchivo);

                // Registrar la informaciÃ³n en la base de datos
                ProgramasDocumentos::create([
                    'nombreDocumento' => $nombreDocumento,  // Guardar el nombre proporcionado por el usuario
                    'urlDocumento' => $documento_path,
                    'programa_id' => $programa->id
                ]);
            }
            return redirect()->back()->with('success', 'Documentos agregados correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se seleccionaron documentos o no se proporcionaron nombres para agregar.');
        }
    }

    return redirect()->back()->with('error', 'No se encontrÃ³ el programa.');
}



public function agregarFotografia(Request $request, $id)
{
    // Buscar el programa por ID
    $programa = Programas::find($id);
    $seleccion = $request->input('si_fotografia');

    // Verificar si el programa existe
    if ($programa) {
        if ($seleccion == "si") {
            // Obtener las fotografÃ­as cargadas
            $fotografias = $request->file('fotografias');

            // Verificar si se han cargado fotografÃ­as
            if ($fotografias) {
                // Asumiendo que el programa tiene una colecciÃ³n existente
                $coleccion = $programa->colecciones()->first(); // Obtener la primera colecciÃ³n asociada al programa

                if ($coleccion) {
                    foreach ($fotografias as $fotografia) {
                        // Guardar cada fotografÃ­a en la carpeta 'public/imagenes_programas'
                        $nombreArchivo = $fotografia->getClientOriginalName();
                        $ruta = 'imagenes_programas/' . $nombreArchivo;
                        $fotografia->storeAs('imagenes_programas', $nombreArchivo, 'public');

                        // Agregar la fotografÃ­a a la colecciÃ³n existente
                        $coleccion->fotografias()->create([
                            'nombre' => $nombreArchivo,
                            'ruta' => $ruta,
                        ]);
                    }
                    return redirect()->back()->with('success', 'FotografÃ­as agregadas correctamente a la colecciÃ³n.');
                } else {
                    return redirect()->back()->with('error', 'No se encontrÃ³ una colecciÃ³n asociada al programa.');
                }
            } else {
                return redirect()->back()->with('error', 'No se seleccionaron fotografÃ­as para agregar.');
            }
        } else {
            // No se seleccionÃ³ agregar fotografÃ­as
            return redirect()->back()->with('info', 'No se seleccionÃ³ agregar fotografÃ­as.');
        }
    }

    return redirect()->back()->with('error', 'No se encontrÃ³ el programa.');
}


    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Buscar el programa por ID
    $programa = Programas::find($id);

    // Verificar si el programa existe
    if ($programa) {
        // Eliminar descripciones relacionadas
        $programa->descripcion()->delete();

        // Eliminar botones relacionados
        $programa->botones()->delete();

        // Eliminar documentos relacionados
        $programa->documentos()->delete();

        // Obtener y eliminar colecciones relacionadas
        $colecciones = $programa->colecciones;
        foreach ($colecciones as $coleccion) {
            // Eliminar fotografÃ­as asociadas a la colecciÃ³n
            $coleccion->fotografias()->delete();
        }

        // Eliminar colecciones relacionadas
        $programa->colecciones()->delete();

        // Finalmente, eliminar el programa
        $programa->delete();

        return redirect()->route('programas.index')->with('success', 'Programa eliminado exitosamente.');
    }

    return redirect()->route('programas.index')->with('error', 'No se encontrÃ³ el programa.');
}

public function destroyBoton($id)
{
    $boton = Programasbtn::findOrFail($id);
    $boton->delete();

    return redirect()->back()->with('success', 'BotÃ³n eliminado correctamente.');
}



// MÃ©todo para eliminar una descripciÃ³n
public function destroyDescripcion($id)
{
    $descripcion = ProgramasDescripciones::findOrFail($id);
    $descripcion->delete();

    return redirect()->back()->with('success', 'DescripciÃ³n eliminada correctamente.');
}

// MÃ©todo para eliminar un documento
public function destroyDocumento($id)
{
    $documento = ProgramasDocumentos::findOrFail($id);
    $documento->delete();

    return redirect()->back()->with('success', 'Documento eliminado correctamente.');
}

// MÃ©todo para eliminar una fotografÃ­a
public function destroyFotografia($id)
{
    $fotografia = ProgramasFotografias::findOrFail($id);
    $fotografia->delete();

    return redirect()->back()->with('success', 'FotografÃ­a eliminada correctamente.');
}



//funcion abrir documentos

public function abrirDocumentoPrograma($id)
{
    $documento = ProgramasDocumentos::find($id);

    if (!$documento) {
        return response()->json(['error' => 'Documento no encontrado'], 404);
    }

    $rutaCompleta = $documento->urlDocumento;

    Log::info("Ruta completa del documento: " . $rutaCompleta);

    $rutaArchivo = storage_path('app/' . $rutaCompleta);

    Log::info("Ruta completa del archivo: " . $rutaArchivo);

    if (file_exists($rutaArchivo) && is_file($rutaArchivo)) {
        // Obtener la extensiÃ³n del archivo original
        $extension = pathinfo($rutaArchivo, PATHINFO_EXTENSION);
        
        // Generar el nombre del archivo incluyendo la extensiÃ³n
        $nombreConExtension = $documento->nombreDocumento . '.' . $extension;

        return response()->download($rutaArchivo, $nombreConExtension);
    } else {
        Log::error("El archivo no existe o es un directorio: " . $rutaArchivo);
        return response()->json(['error' => 'El archivo no existe o es un directorio.'], 404);
    }
}


    
}
