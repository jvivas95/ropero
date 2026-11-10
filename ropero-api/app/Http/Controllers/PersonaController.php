<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Http\Resources\PersonaResource;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtain all registers (persona)
        $personas = Persona::orderBy('apellido')
            ->orderBy('nombre')
            ->paginate(10);

        // Return data in JSON format
        return PersonaResource::collection($personas);
    }
    /**
     * Display the results of search
     */
    public function find(Request $request)
    {
        // Initialize the query builder
        $personas = Persona::query()
            // Apply each filter only if the field was sent and is not empty
            ->when($request->filled('nombre'), fn($q) =>
                $q->where('nombre', 'like', "%{$request->input('nombre')}%"))
            ->when($request->filled('apellido'), fn($q) =>
                $q->where('apellido', 'like', "%{$request->input('apellido')}%"))
            ->when($request->filled('telefono'), fn($q) =>
                $q->where('telefono', 'like', "%{$request->input('telefono')}%"))
            // Sort results by surname, then by name
            ->orderBy('apellido')
            ->orderBy('nombre')
            // The query only runs here, after all the filters are applied
            ->paginate(10);

        // Return the paginated results in JSON format
        return PersonaResource::collection($personas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonaRequest $request)
    {
        // Store 'persona' in ddbb
        $persona = Persona::create($request->validated());

        // return the response
        return new PersonaResource($persona);
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        // Route model binding already loaded the record (or returned a 404)

        return new PersonaResource($persona);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonaRequest $request, Persona $persona)
    {
        // Update only the fields that passed validation
        $persona->update($request->validated());

        return new PersonaResource($persona);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        // Block deletion if the person has delivery history
        if ($persona->entregas()->exists()){
            return response()->json([
                'message' => 'Esta persona tiene entregas registradas y no se puede eliminar'
            ], 409);
        }

        $persona->delete();

        // 204 No Content: deleted successfully, nothing to return
        return response()->json($persona);
    }
}
