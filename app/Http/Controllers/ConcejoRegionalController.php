<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsejoRegional;
use App\Models\Seccion;
use Illuminate\Support\Facades\Log;

class ConcejoRegionalController extends Controller{

    public function index(){
        // Obtener el último registro de ConsejoRegional
        $concejo = ConsejoRegional::latest()->first();
    
        if ($concejo) {
            // Si hay un concejo, cargar sus secciones
            $concejo->load('secciones');
    
            return view('concejoregional.index', compact('concejo'));
        } else {
            // No hay concejos disponibles, redirigir a la creación
            return redirect()->route('concejoregional.create')->with('message', 'No hay comités disponibles. Puedes crear uno nuevo.');
        }
    }

    public function create()
    {
        return view('concejoregional.create');
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'tag_comentario' => 'nullable|string',
            'titulo' => 'required|string|max:255',
            'bajada' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titulo_seccion.*' => 'nullable|string|max:255',
            'bajada_seccion.*' => 'nullable|string',
            'img_seccion.*.imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Otras reglas de validación
        ]);

        // Crear un nuevo consejo regional
        $consejoRegional = ConsejoRegional::create([
            'tag_comentario' => $request->input('tag_comentario'),
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
            'img' => $request->file('img') ? $request->file('img')->store('imagesConcejo', 'public') : null,
        ]);

        // Crear las secciones asociadas
        if ($request->has('img_seccion')) {
            foreach ($request->file('img_seccion') as $index => $file) {
                // Verificar si hay archivos en la subsección actual
                if ($file->isValid()) {
                    $seccionData = [
                        'titulo_seccion' => $request->input('titulo_seccion')[$index] ?? null,
                        'bajada_seccion' => $request->input('bajada_seccion')[$index] ?? null,
                        'img_seccion' => $file->store('imagesConcejo', 'public'),
                    ];

                    $consejoRegional->secciones()->create($seccionData);
                }
            }
        }

        return redirect()->route('concejoregional.index')->with('success', 'Consejo Regional creado exitosamente.');   
    
    }

    public function edit($concejoId, $seccionId)
    {
        $seccion = Seccion::findOrFail($seccionId);
        return view('editarseccion', compact('seccion'));
    }


    public function update(Request $request, $concejoId)
    {
        // Validación
        $request->validate([
            'tag_comentario' => 'nullable|string',
            'titulo' => 'required|string|max:255',
            'bajada' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titulo_seccion.*' => 'nullable|string|max:255',
            'bajada_seccion.*' => 'nullable|string',
            'img_seccion.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'seccion_id.*' => 'required|numeric', // Asegurar que se recibe el ID de la sección
            // Otras reglas de validación
        ]);
    
        // Actualizar los datos principales del Consejo Regional
        $consejoRegional = ConsejoRegional::find($concejoId);
    
        if (!$consejoRegional) {
            abort(404, 'Consejo Regional no encontrado');
        }
    
        $consejoRegional->update([
            'tag_comentario' => $request->input('tag_comentario'),
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
            'img' => $request->file('img') ? $request->file('img')->store('imagesConcejo', 'public') : $consejoRegional->img,
        ]);
    
        // Actualizar o crear las secciones asociadas
        if ($request->has('seccion_id')) {
            foreach ($request->input('seccion_id') as $index => $seccionId) {
                // Obtén la sección por su ID o crea una nueva instancia si no existe
                $seccion = Seccion::find($seccionId);
    
                if (!$seccion) {
                    $seccion = new Seccion();
                }
    
                // Actualizar campos de la sección
                $this->updateSeccionFields($seccion, $request, $index);
            }
        }
    
        return redirect()->route('concejoregional.index')->with('success', 'Consejo Regional actualizado exitosamente.');
    }
    
    private function updateSeccionFields($seccion, $request, $index)
    {
        $seccion->titulo_seccion = $request->input("titulo_seccion.$index");
        $seccion->bajada_seccion = $request->input("bajada_seccion.$index");
    
        // Actualizar la imagen de la sección si se proporciona una nueva imagen
        if ($request->hasFile("img_seccion.$index")) {
            $imagePath = $request->file("img_seccion.$index")->store('seccion_images', 'public');
            $seccion->img_seccion = $imagePath;
        }
    
        $seccion->save();
    }

    public function deleteSeccion($concejoId, $seccionId)
{
    // Validación de datos, si es necesario
    dd($concejoId, $seccionId);
    // Buscar la sección
    $seccion = Seccion::findOrFail($seccionId);

    // Eliminar la imagen asociada, si existe
    if ($seccion->img_seccion) {
        Storage::disk('public')->delete($seccion->img_seccion);
    }

    // Eliminar la sección
    $seccion->delete();

    // Puedes redireccionar o enviar una respuesta JSON según tu necesidad
    return response()->json(['message' => 'Sección eliminada exitosamente.']);
}

    public function show($id)
    {
        // Puedes dejar el método vacío o redireccionar a otra página si es necesario
        return redirect()->route('concejoregional.index');
    }

    public function mostrarImagen($img){
        return response()->file(storage_path('app/public/imagesConcejo/' . $img));
    }

}
