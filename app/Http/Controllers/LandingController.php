<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Landing;
use App\Models\LandingBtns;
use App\Models\LandingDocs;
use App\Models\LandingImages;
use Illuminate\Pagination\Paginator;

class LandingController extends Controller{

    public function index() {
        $landings = Landing::all();

        if ($landings->isEmpty()) {
            // Redirecciona al método 'create' para crear una nueva landing
            return redirect()->route('landings.create');
        }

        // Retorna a la vista 'landings.index' pasando las instancias de 'landing'
        return view('landings.index', compact('landings'));
        
    }

    public function create() {

        return view('landings.create');
    }

    public function store(Request $request) {

    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'tags' => 'nullable|string',
        'menu_ubicacion' => 'required|string',
        'habilitado' => 'required|boolean',
        'ruta_imagen.*' => 'nullable|image|mimes:jpeg,png,jpg',
        'nombre_imagen.*' => 'nullable|string|max:255',
        'nombre_btn.*' => 'nullable|string|max:255',
        'url.*' => 'nullable|url',
        'ruta_documento.*' => 'nullable|file|mimes:pdf,doc,docx,zip,rar',
        'nombre_documento.*' => 'nullable|string|max:255',
    ]);

    // Crear la Landing Page
    $landing = Landing::create([
        'tags' => $request->tags,
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'menu_ubicacion' => $request->menu_ubicacion,
        'habilitado' => $request->habilitado,
    ]);

    // Procesar y almacenar imágenes
    if ($request->hasFile('ruta_imagen')) {
        foreach ($request->file('ruta_imagen') as $index => $file) {
            $path = $file->store('public/landing_images');
            LandingImages::create([
                'landing_id' => $landing->id,
                'nombre_imagen' => $request->nombre_imagen[$index] ?? $file->getClientOriginalName(),
                'ruta_imagen' => $path,
            ]);
        }
    }

    // Guardar botones externos
    if ($request->nombre_btn) {
        foreach ($request->nombre_btn as $index => $nombre) {
            LandingBtns::create([
                'landing_id' => $landing->id,
                'nombre_btn' => $nombre,
                'url' => $request->url[$index],
            ]);
        }
    }

    // Procesar y almacenar documentos
    if ($request->hasFile('ruta_documento')) {
        foreach ($request->file('ruta_documento') as $index => $file) {
            $path = $file->store('public/landing_documents');
            LandingDocs::create([
                'landing_id' => $landing->id,
                'nombre_documento' => $request->nombre_documento[$index] ?? $file->getClientOriginalName(),
                'ruta_documento' => $path,
            ]);
        }
    }

    return redirect()->route('landings.index')->with('success', 'Landing Page creada con éxito.');

    }

    public function edit($id)
    {
        $landing = Landing::findOrFail($id);
        return view('landings.edit', compact('landing'));
    }

    public function update(Request $request, $id) {

    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'tags' => 'nullable|string',
        'menu_ubicacion' => 'required|string',
        'habilitado' => 'required|boolean',
        'ruta_imagen.*' => 'nullable|image|mimes:jpeg,png,jpg',
        'nombre_imagen.*' => 'nullable|string|max:255',
        'nombre_btn.*' => 'nullable|string|max:255',
        'url.*' => 'nullable|url',
        'ruta_documento.*' => 'nullable|file|mimes:pdf,doc,docx,zip,rar',
        'nombre_documento.*' => 'nullable|string|max:255',
    ]);

    // Buscar la Landing Page por ID
    $landing = Landing::findOrFail($id);

    // Actualizar la Landing Page
    $landing->update([
        'tags' => $request->tags,
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'menu_ubicacion' => $request->menu_ubicacion,
        'habilitado' => $request->habilitado,
    ]);

    // Actualizar imágenes
    // Aquí podrías eliminar las imágenes antiguas si es necesario o simplemente agregar las nuevas
    if ($request->hasFile('ruta_imagen')) {
        foreach ($request->file('ruta_imagen') as $index => $file) {
            $path = $file->store('public/landing_images');
            LandingImages::create([
                'landing_id' => $landing->id,
                'nombre_imagen' => $request->nombre_imagen[$index] ?? $file->getClientOriginalName(),
                'ruta_imagen' => $path,
            ]);
        }
    }

    // Actualizar botones externos
    // Considera si necesitas eliminar los botones antiguos primero
    if ($request->nombre_btn) {
        foreach ($request->nombre_btn as $index => $nombre) {
            LandingBtns::create([
                'landing_id' => $landing->id,
                'nombre_btn' => $nombre,
                'url' => $request->url[$index],
            ]);
        }
    }

    // Actualizar documentos
    // Considera eliminar documentos antiguos si es necesario
    if ($request->hasFile('ruta_documento')) {
        foreach ($request->file('ruta_documento') as $index => $file) {
            $path = $file->store('public/landing_documents');
            LandingDocs::create([
                'landing_id' => $landing->id,
                'nombre_documento' => $request->nombre_documento[$index] ?? $file->getClientOriginalName(),
                'ruta_documento' => $path,
            ]);
        }
    }

    return redirect()->route('landings.index')->with('success', 'Landing Page actualizada con éxito.');

    }

    public function deleteImage($imageId) {

    $image = LandingImages::findOrFail($imageId);
    
    // Opcional: Eliminar el archivo de imagen del almacenamiento
    Storage::delete($image->ruta_imagen);
    
    // Eliminar el registro de la imagen de la base de datos
    $image->delete();

    return back()->with('success', 'Imagen eliminada con éxito.');

    }

    public function deleteButton($buttonId) {

    $button = LandingBtns::findOrFail($buttonId);
    
    // Eliminar el registro del botón de la base de datos
    $button->delete();

    return back()->with('success', 'Botón eliminado con éxito.');

    }

    public function deleteDocument($documentId) {

    $document = LandingDocs::findOrFail($documentId);
    
    // Opcional: Eliminar el archivo de documento del almacenamiento
    Storage::delete($document->ruta_documento);
    
    // Eliminar el registro del documento de la base de datos
    $document->delete();

    return back()->with('success', 'Documento eliminado con éxito.');

    }

    public function show($id) {
        try {
            // Buscar la Landing Page por su ID
            $landing = Landing::findOrFail($id);
    
            // Cargar relaciones botones y documentos
            $landing->load(['btns', 'documentos']);
    
            // Paginar las imágenes relacionadas
            $images = $landing->images()->paginate(12);  // Ajusta el número según tus necesidades
    
            // Pasar la Landing Page y las imágenes paginadas a la vista
            return view('landings.show', compact('landing', 'images'));
        } catch (\Exception $e) {
            // Manejar una excepción si la Landing Page no se encuentra
            return abort(404); // Puedes personalizar el código de respuesta según tus necesidades
        }
    }

    public function cargarMenu() {
        // Solo obtener landings habilitados
        $landings = Landing::where('habilitado', true)->get();
        dd($landings); // Depuración
        return view('app', compact('landings'));
    }

}