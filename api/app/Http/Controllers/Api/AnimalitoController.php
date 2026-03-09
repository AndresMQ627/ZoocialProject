<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animalito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    public function index()
    {
        return response()->json(Animalito::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_responsable' => 'required|integer',
            'id_raza' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'edad_estimado' => 'required|email|unique:users,email',
            'genero' => 'required|min:6',
            'disponibilidad' => 'required|in:admin,user',
            'fecha_ingreso' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $animalito = Animalito::create([
            'id_responsable' => $request->id_responsable,
            'id_raza' => $request->id_raza,
            'nombre' => $request->nombre,
            'edad_estimado' => $request->edad_estimado,
            'genero' => $request->genero,
            'disponibilidad' => $request->disponibilidad,
            'fecha_ingreso' => $request->fecha_ingreso
        ]);

        return response()->json($animalito, 201);
    }

    public function show($id)
    {
        $animalito = Animalito::find($id);
        if (!$animalito) return response()->json(['message' => 'Not found'], 404);
        return response()->json($animalito);
    }

    public function update(Request $request, $id)
    {
        $animalito = Animalito::findOrFail($id);
        if (!$animalito) return response()->json(['message' => 'Not found'], 404);
        $animalito->update($request->all());

        return response()->json($animalito);
    }

    public function destroy($id)
    {
        $animalito = Animalito::find($id);
        if (!$animalito) return response()->json(['message' => 'Not found'], 404);
        
        $user->destroy();
        return response()->json(['message' => 'Deleted']);
    }
}