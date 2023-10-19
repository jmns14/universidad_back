<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Estudiante::all();
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
        $response = Estudiante::create($inputs);
        if ($response) {
            return response()->json([
                'data' => $response,
                'message' => 'Estudiante creado con exito'
            ]);
        } else {
            return response()->json([
                'message' => 'No se pudo crear el estudiante'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $estudiante = Estudiante::find($id);
        if (isset($estudiante)) {
            return $estudiante;
        } else {
            return response()->json([
                'error' => 'No existe el estudiante'
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
        $estudiante = Estudiante::find($id);
        if (isset($estudiante)) {
            $estudiante->documento = $request->documento;
            $estudiante->nombres = $request->nombres;
            $estudiante->telefono = $request->telefono;
            $estudiante->email = $request->email;
            $estudiante->direccion = $request->direccion;
            $estudiante->ciudad = $request->ciudad;
            $estudiante->semestre = $request->semestre;

            if ($estudiante->save()) {
                return response()->json([
                    'data' => $estudiante,
                    'message' => 'Estudiante actualizado con exito'
                ]);
            } else {
                return response()->json([
                    'message' => 'No se pudo actualizar el estudiante'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'No existe el estudiante'
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiante::find($id);
        if (isset($estudiante)) {
            $response = Estudiante::destroy($id);
            if ($response) {
                return response()->json([
                    'message' => 'Estudiante eliminado con exito'
                ]);
            } else {
                return response()->json([
                    'message' => 'No se pudo eliminar el estudiante'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'No existe el estudiante'
            ]);
        }
    }
}
