<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return response()->json(Teacher::with('modules')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'required|string|max:30',
            'cedula'   => 'required|string|max:30|unique:teachers,cedula',
        ]);

        $teacher = Teacher::create($data);

        return response()->json($teacher, 201);
    }

    public function show(Teacher $teacher)
    {
        return response()->json($teacher->load('modules'), 200);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'nombre'   => 'sometimes|required|string|max:100',
            'apellido' => 'sometimes|required|string|max:100',
            'telefono' => 'sometimes|required|string|max:30',
            'cedula'   => 'sometimes|required|string|max:30|unique:teachers,cedula,' . $teacher->id,
        ]);

        $teacher->update($data);

        return response()->json($teacher, 200);
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->json(['message' => 'Profesor eliminado correctamente'], 200);
    }
}