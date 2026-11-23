<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return response()->json(Module::with(['teachers', 'students'])->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo' => 'required|string|max:50|unique:modules,codigo',
            'nombre' => 'required|string|max:150',
        ]);

        $module = Module::create($data);

        if ($request->teacher_id) {
        $module->teachers()->sync([$request->teacher_id]);
}

        return response()->json($module, 201);
    }

    public function show($id)
    {
        $module = Module::with(['teachers', 'students'])->findOrFail($id);
        return response()->json($module);
    }

    public function update(Request $request, Module $module)
    {
        $data = $request->validate([
            'codigo' => 'sometimes|required|string|max:50|unique:modules,codigo,' . $module->id,
            'nombre' => 'sometimes|required|string|max:150',
        ]);

        $module->update($data);

    return response()->json($module, 200);
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return response()->json(['message' => 'Módulo eliminado correctamente'], 200);
    }

    public function getStudents(Module $module)
    {
        return response()->json($module->students, 200);
    }
}