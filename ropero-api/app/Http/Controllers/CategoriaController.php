<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtain all the Categories
        $categorias = Categoria::all();

        return CategoriaResource::collection($categorias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        // Store categoria in DB
        $categoria = Categoria::create($request->validated());

        // Return the response
        return new CategoriaResource($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        // Route model binding already loaded the record (or returned a 404)

        return new CategoriaResource($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        // Update only the fields that passed validation
        $categoria->update($request->validated());

        return new CategoriaResource($categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        // Block deletion if Categoria has 'prendas'
        if ($categoria->prendas()->exists()){
            return response()->json([
                'message' => 'Esta categoria contiene prendas asociadas y no se puede eliminar.'
            ], 409);
        }

        $categoria->delete();

        return response()->json($categoria);
    }
}
