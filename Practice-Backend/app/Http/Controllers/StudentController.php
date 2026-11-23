<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private function cloudinary(): Cloudinary
    {
        return new Cloudinary(config('services.cloudinary.url'));
    }

    public function index()
    {
        return response()->json(Student::with('module')->get(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'module_id'        => 'required|exists:modules,id',
            'nombre'           => 'required|string|max:100',
            'apellidos'        => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'expediente'       => 'required|string|max:50|unique:students,expediente',
            'foto'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $upload = $this->cloudinary()->uploadApi()->upload(
                $request->file('foto')->getRealPath(),
                ['folder' => 'estudiantes']
            );
            $data['foto_url'] = $upload['secure_url'];
            $data['foto_public_id'] = $upload['public_id'];
        }

        $student = Student::create($data);

        return response()->json($student->load('module'), 201);
    }

    public function show(Student $student)
    {
        return response()->json($student->load('module'), 200);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'module_id'        => 'sometimes|required|exists:modules,id',
            'nombre'           => 'sometimes|required|string|max:100',
            'apellidos'        => 'sometimes|required|string|max:100',
            'fecha_nacimiento' => 'sometimes|required|date',
            'expediente'       => 'sometimes|required|string|max:50|unique:students,expediente,' . $student->id,
            'foto'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
           
            if ($student->foto_public_id) {
                $this->cloudinary()->uploadApi()->destroy($student->foto_public_id);
            }

            
            $upload = $this->cloudinary()->uploadApi()->upload(
                $request->file('foto')->getRealPath(),
                ['folder' => 'estudiantes']
            );
            $data['foto_url'] = $upload['secure_url'];
            $data['foto_public_id'] = $upload['public_id'];
        }

        $student->update($data);

        return response()->json($student->load('module'), 200);
    }

    public function destroy(Student $student)
    {
        if ($student->foto_public_id) {
            $this->cloudinary()->uploadApi()->destroy($student->foto_public_id);
        }

        $student->delete();

        return response()->json(['message' => 'Estudiante eliminado correctamente'], 200);
    }
}