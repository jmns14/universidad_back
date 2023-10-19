<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Profesor::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $response = Profesor::create($inputs);
        if ($response) {
            return response()->json([
                'data' => $response,
                'message' => 'Profesor creado con exito'
            ]);
        } else {
            return response()->json([
                'message' => 'No se pudo crear el profesor'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profesor = Profesor::find($id);
        if (isset($profesor)) {
            return $profesor;
        } else {
            return response()->json([
                'error' => 'No existe el profesor'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profesor = Profesor::find($id);
        if (isset($profesor)) {
            $profesor->documento = $request->documento;
            $profesor->nombres = $request->nombres;
            $profesor->telefono = $request->telefono;
            $profesor->email = $request->email;
            $profesor->direccion = $request->direccion;
            $profesor->ciudad = $request->ciudad;

            if ($profesor->save()) {
                return response()->json([
                    'data' => $profesor,
                    'message' => 'Profesor actualizado con exito'
                ]);
            } else {
                return response()->json([
                    'message' => 'No se pudo actualizar el profesor'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'No existe el profesor'
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profesor = Profesor::find($id);
        if (isset($profesor)) {
            $response = Profesor::destroy($id);
            if ($response) {
                return response()->json([
                    'message' => 'Profesor eliminado con exito'
                ]);
            } else {
                return response()->json([
                    'message' => 'No se pudo eliminar el profesor'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'No existe el profesor'
            ]);
        }
    }
}
