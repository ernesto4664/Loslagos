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

    public function edit($id)
    {
        $concejo = ConsejoRegional::with('secciones')->findOrFail($id);
    
        // Puedes realizar lógica adicional si es necesario
    
        return view('concejoregional.edit', compact('concejo'));
    }

    public function update(Request $request, ConsejoRegional $consejoRegional)
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
            // Otras reglas de validación
        ]);
    
        // Actualizar los datos principales del Consejo Regional
        $consejoRegional->update([
            'tag_comentario' => $request->input('tag_comentario'),
            'titulo' => $request->input('titulo'),
            'bajada' => $request->input('bajada'),
            'img' => $request->file('img') ? $request->file('img')->store('imagesConcejo', 'public') : $consejoRegional->img,
        ]);
    
        // Actualizar o crear las secciones asociadas
        if ($request->has('titulo_seccion')) {
            foreach ($request->input('titulo_seccion') as $index => $titulo) {
                $seccionData = [
                    'titulo_seccion' => $titulo,
                    'bajada_seccion' => $request->input('bajada_seccion')[$index] ?? null,
                    'consejo_regional_id' => $consejoRegional->id, // Asignar el ID del Consejo Regional
                ];
        
                // Obtener la sección existente o crear una nueva
                $seccion = $consejoRegional->secciones()->updateOrCreate(['id' => $index], $seccionData);
        
                // Actualizar campos de la sección
                $this->updateSeccionFields($seccion, $request, $index);
            }
        }
    
        return redirect()->route('concejoregional.index')->with('success', 'Consejo Regional actualizado exitosamente.');
    }
    
    // Método para actualizar los campos de la sección
    private function updateSeccionFields($seccion, $request, $index)
    {
        $request->validate([
            "titulo_seccion.{$index}" => 'nullable|string|max:255',
            "bajada_seccion.{$index}" => 'nullable|string',
            "img_seccion.{$index}" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Otras reglas de validación para la sección
        ]);
    
        $seccionData = [
            'titulo_seccion' => $request->input("titulo_seccion.{$index}"),
            'bajada_seccion' => $request->input("bajada_seccion.{$index}"),
        ];
    
        // Manejar imágenes de la sección
        if ($request->hasFile("img_seccion.{$index}")) {
            // Eliminar la imagen anterior, si existe
            if ($seccion->img_seccion) {
                Storage::disk('public')->delete($seccion->img_seccion);
            }
    
            // Almacenar la nueva imagen
            $seccionData['img_seccion'] = $request->file("img_seccion.{$index}")->store('imagesConcejo', 'public');
        }
    
        $seccion->update($seccionData);
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

}
