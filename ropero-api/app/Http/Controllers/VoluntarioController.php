<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoluntarioRequest;
use App\Http\Requests\UpdateVoluntarioRequest;
use App\Models\Voluntario;
use Illuminate\Http\Request;
use App\Http\Resources\VoluntarioResource;

class VoluntarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtain all registers 'Voluntario'
        $voluntarios = Voluntario::orderBy('nombre')
            ->paginate(10);

        // Return data in JSON format
        return VoluntarioResource::collection($voluntarios);
    }

    /**
     * Display the results of search
     */
    public function find(Request $request)
    {
        // Initialize the query builder
        $voluntarios = Voluntario::query()
            // Apply filters only if the field was sent and is not empty
            -> when($request->filled('nombre'), fn($q) =>
                $q->where('nombre', 'like', "%{$request->input('nombre')}%"))
            -> when($request->filled('activo'), fn($q) =>
                $q->where('activo', $request->boolean('activo')))
            // Sort results by name
            ->orderBy('nombre')
            ->get();

        return VoluntarioResource::collection($voluntarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoluntarioRequest $request)
    {
        // Store 'voluntario' in DB
        $voluntario = Voluntario::create($request->validated());

        // Return the response
        return new VoluntarioResource($voluntario);
    }

    /**
     * Display the specified resource.
     */
    public function show(Voluntario $voluntario)
    {
        // Route model binding already loaded

        return new VoluntarioResource($voluntario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoluntarioRequest $request, Voluntario $voluntario)
    {
        // Update only the fields that passed validation
        $voluntario->update($request->validated());

        return new VoluntarioResource($voluntario);
    }

    /**
     * Remove the specified resource from storage.
        public function destroy(Voluntario $voluntario)
        {
            //
        }
     */
}
