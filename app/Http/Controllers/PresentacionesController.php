<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentaciones;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PresentacionesController extends Controller {

    public function index()
    {
        $presentacion = Presentaciones::all();
        if ($presentacion->isNotEmpty()) {
            return view('presentaciones.show', compact('presentacion'));
        } else {
            return view('presentaciones.create', compact('presentacion'));
           
        }
           
    }

    public function create()
    {
        return view('presentaciones.create');
    }

    public function edit($id)
    {
        $presentacion = Presentaciones::find($id);
        return view('presentaciones.edit', compact('presentacion'));
    }

    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'urldoc' => 'required|file|mimes:pdf,doc,docx|max:10240', // Límite de tamaño de archivo de 10 MB
        ]);

        Log::info('Datos validados para almacenar presentación', ['data' => $data]);

        // Verificar si hay un archivo y procesarlo
        if ($request->hasFile('urldoc')) {
            $file = $request->file('urldoc');
            $originalName = $file->getClientOriginalName();
            $uniqueFileName = $this->getUniqueFileName($originalName, 'documentospresentacion');

            Log::info('Procesando archivo para almacenamiento', ['nombre_original' => $originalName, 'nombre_unico' => $uniqueFileName]);

            // Almacenar el archivo con su nombre único generado
            $filePath = $file->storeAs('documentospresentacion', $uniqueFileName, 'public');

            // Verificar si el archivo se almacenó correctamente
            if (!$filePath) {
                Log::error('Error al almacenar el archivo', ['nombre' => $originalName]);
                return redirect()->back()->with('error', 'Error al almacenar el archivo: ' . $originalName);
            }

            Log::info('Archivo almacenado correctamente', ['ruta' => $filePath]);

            // Guardar la ruta del archivo en la base de datos
            $data['urldoc'] = $filePath;
        }

        // Almacenar los datos en la base de datos
        try {
            Presentaciones::create($data);
            Log::info('Presentación almacenada en la base de datos', ['data' => $data]);
        } catch (\Exception $e) {
            Log::error('Error al almacenar la presentación en la base de datos', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Error al crear el artículo: ' . $e->getMessage());
        }

        // Redireccionar con mensaje de éxito
        return redirect(route('presentaciones.index'))->with('success', 'Artículo creado con éxito');
    }
    
    
    /**
     * Genera un nombre de archivo único si ya existe un archivo con el mismo nombre.
     *
     * @param string $fileName El nombre original del archivo
     * @param string $directory El directorio donde se almacenará el archivo
     * @return string El nombre único generado
     */
    private function getUniqueFileName($fileName, $directory)
    {
        $filePath = storage_path('app/public/' . $directory . '/' . $fileName);
        $fileNameWithoutExt = pathinfo($fileName, PATHINFO_FILENAME);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);

        $counter = 1;

        // Mientras el archivo exista, agregar un número al final del nombre
        while (file_exists($filePath)) {
            $fileName = $fileNameWithoutExt . "($counter)." . $extension;
            $filePath = storage_path('app/public/' . $directory . '/' . $fileName);
            $counter++;
        }

        Log::info('Generado nombre único para el archivo', ['nombre_generado' => $fileName]);

        return $fileName;
    }

    public function show(Presentaciones $presentacion)
    {
        $presentacion = Presentaciones::all();
        return view('presentacion.show', compact('presentacion'));
    }

    public function destroy($id)
    {
        $presentacion = Presentaciones::find($id);
    
        if ($presentacion) {
            // Verificar si el archivo existe y eliminarlo del almacenamiento
            if ($presentacion->urldocs && Storage::exists($presentacion->urldocs)) {
                Storage::delete($presentacion->urldocs);
            }
    
            // Eliminar el registro de la base de datos
            $presentacion->delete();
            
            return redirect()->route('presentaciones.index')->with('success', 'Artículo eliminado con éxito');
        } else {
            return redirect()->route('presentaciones.index')->with('error', 'Artículo no encontrado');
        }
    }

    public function download($id)
    {
        $presentacion = Presentaciones::findOrFail($id);
        $fileData = json_decode($presentacion->urldocs, true);

        Log::info('Iniciando descarga de archivo', ['id' => $id, 'fileData' => $fileData]);

        if (empty($fileData)) {
            Log::error('No se encontraron archivos para descargar', ['id' => $id]);
            return redirect()->back()->with('error', 'No se encontraron archivos para descargar.');
        }

        $filePath = 'public/' . $fileData[0]['path'];

        // Verificar si el archivo existe en el almacenamiento
        if (Storage::exists($filePath)) {
            Log::info('Archivo encontrado en el almacenamiento, iniciando descarga', ['ruta' => $filePath]);
            return Storage::download($filePath, $fileData[0]['name']);
        }

        Log::error('El archivo no existe o es un directorio', ['ruta' => $filePath]);
        return redirect()->back()->with('error', 'El archivo no existe o es un directorio.');
    }

}
