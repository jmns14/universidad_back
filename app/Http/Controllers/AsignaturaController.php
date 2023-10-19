<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Asignatura::all();
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
        $response = Asignatura::create($inputs);
        if ($response) {
            return response()->json([
                'data' => $response,
                'message' => 'Asignatura creada con exito'
            ]);
        } else {
            return response()->json([
                'message' => 'No se pudo crear la asignatura'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asignatura = Asignatura::find($id);
        if (isset($asignatura)) {
            return $asignatura;
        } else {
            return response()->json([
                'error' => 'No existe la asignatura'
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
        $asignatura = Asignatura::find($id);
        if (isset($asignatura)) {
            $asignatura->nombre = $request->nombre;
            $asignatura->descripcion = $request->descripcion;
            $asignatura->creditos = $request->creditos;
            $asignatura->area_de_conocimiento = $request->area_de_conocimiento;
            $asignatura->obligatoria = $request->obligatoria;

            if ($asignatura->save()) {
                return response()->json([
                    'data' => $asignatura,
                    'message' => 'Asignatura actualizada con exito'
                ]);
            } else {
                return response()->json([
                    'message' => 'No se pudo actualizar la asignatura'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'No existe la asignatura'
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asignatura = Asignatura::find($id);
        if (isset($asignatura)) {
            $response = Asignatura::destroy($id);
            if ($response) {
                return response()->json([
                    'message' => 'Asignatura eliminada con exito'
                ]);
            } else {
                return response()->json([
                    'message' => 'No se pudo eliminar la asignatura'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'No existe la asignatura'
            ]);
        }
    }
}
