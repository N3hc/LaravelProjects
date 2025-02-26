<?php

namespace App\Http\Controllers;

use App\Models\Dueno; 
use Illuminate\Http\Request;
use Illuminate\Http\Response; 

class DuenoController extends Controller
{
    public function index()
    {
        return Dueno::with('animales')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string'
        ]);

        $dueno = Dueno::create($validated);
        return response()->json($dueno, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return Dueno::with('animales')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $dueno = Dueno::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'sometimes|string',
            'apellido' => 'sometimes|string'
        ]);

        $dueno->update($validated);
        return response()->json($dueno);
    }

    public function destroy($id)
    {
        $dueno = Dueno::findOrFail($id);
        $dueno->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}