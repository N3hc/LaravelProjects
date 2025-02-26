<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnimalController extends Controller
{
    public function index()
    {
        return Animal::with('dueno')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'tipo' => 'required|in:perro,gato,hámster,conejo',
            'peso' => 'required|numeric',
            'enfermedad' => 'required|string',
            'comentarios' => 'nullable|string',
            'dueno_id' => 'required|exists:duenos,id_persona'
        ]);

        $animal = Animal::create($validated);
        return response()->json($animal, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return Animal::with('dueno')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'sometimes|string',
            'tipo' => 'sometimes|in:perro,gato,hámster,conejo',
            'peso' => 'sometimes|numeric',
            'enfermedad' => 'sometimes|string',
            'comentarios' => 'nullable|string',
            'dueno_id' => 'sometimes|exists:duenos,id_persona'
        ]);

        $animal->update($validated);
        return response()->json($animal);
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}