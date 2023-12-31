<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ConcursosPublicos;
use App\Models\ConcursosPublicosDocs;

class ConcursosPublicosController extends Controller
{
    public function index()
    {
        $concursos = ConcursosPublicos::all();
        
        if ($concursos->isEmpty()) {
            // No hay concursos disponibles, redirigir a la creación
            return redirect()->route('concursospublicos.create')->with('message', 'No hay concursos disponibles. Puedes crear uno nuevo.');
        } else {
            // Hay concursos disponibles, mostrar en el índice
            return view('concursospublicos.index', ['concursos' => $concursos]);
        }
    }

    public function create()
    {
        return view('concursospublicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        // Crear el concurso incluso si algunos campos están vacíos
            $nuevoConcurso = ConcursosPublicos::create([
                    'titulo' => $request->input('titulo'),
                    'tags' => $request->input('tags'),
                    'descripcion' => $request->input('descripcion'),
            ]);

            try {
                // Procesar documentos (individuales y comprimidos)
                $documentos = $request->file('ruta_documento');
                $nombresDocumentos = $request->input('nombre_documento') ?? [];
        
                foreach ($documentos ?? [] as $key => $documento) {
                    $nombreDocumento = $nombresDocumentos[$key] ?? 'documento_' . ($key + 1);
                    $rutaDocumento = $documento->store('documentosconcursos');
        
                    // Almacena en la base de datos
                    ConcursosPublicosDocs::create([
                        'concursos_publicos_id' => $nuevoConcurso->id,
                        'nombre_documento' => $nombreDocumento,
                        'ruta_documento' => $rutaDocumento,
                    ]);
                }
            } catch (\Exception $e) {
                // Manejar la excepción, por ejemplo, registrar un mensaje en los logs
                \Log::error('Error al procesar documentos: ' . $e->getMessage());
            }

            return redirect()->route('concursospublicos.index');
    }

    public function edit($id)
    {
        $concurso = ConcursosPublicos::findOrFail($id);
        $documentos = $concurso->documentos;

        return view('concursospublicos.edit', compact('concurso', 'documentos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'descripcion' => 'nullable|string',
        ]);

        $concurso = ConcursosPublicos::findOrFail($id);

        // Actualizar el trámite
        $concurso->update([
            'titulo' => $request->input('titulo'),
            'tags' => $request->input('tags'),
            'descripcion' => $request->input('descripcion'),
        ]);

        try {
            // Procesar documentos (individuales y comprimidos)
            $documentos = $request->file('ruta_documento');
            $nombresDocumentos = $request->input('nombre_documento') ?? [];

            foreach ($documentos ?? [] as $key => $documento) {
                $nombreDocumento = $nombresDocumentos[$key] ?? 'documento_' . ($key + 1);
                $rutaDocumento = $documento->store('documentosconcurso');

                // Actualizar o crear en la base de datos
                $concurso->documentos()->updateOrCreate(
                    ['nombre_documento' => $nombreDocumento],
                    [
                        'nombre_documento' => $nombreDocumento,
                        'ruta_documento' => $rutaDocumento,
                    ]
                );
            }
        } catch (\Exception $e) {
            // Manejar la excepción, por ejemplo, registrar un mensaje en los logs
            \Log::error('Error al procesar documentos: ' . $e->getMessage());
        }

        return redirect()->route('concursospublicos.index');
    }

    public function eliminarDocumento($documentoId){
    try {
        $documento = ConcursosPublicosDocs::findOrFail($documentoId);
        $documento->delete();

        return response()->json(['success' => true, 'message' => 'Documento eliminado exitosamente']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error al eliminar el documento', 'error' => $e->getMessage()]);
    }
}

}
