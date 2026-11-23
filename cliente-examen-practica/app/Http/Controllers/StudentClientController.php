<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StudentClientController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('API_BASE_URL');
        $students = $this->fetchDataFromApi($url . '/students');

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $url = env('API_BASE_URL');
        $modules = $this->fetchDataFromApi($url . '/modules');

        return view('students.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $url = env('API_BASE_URL');
        $data = $request->only(['expediente', 'nombre', 'apellidos', 'fecha_nacimiento', 'module_id']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $response = Http::acceptJson()
                ->attach('foto', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                ->post($url . '/students', $data);
        } else {
            $response = Http::acceptJson()->post($url . '/students', $data);
        }

        if ($response->status() === 422) {
            return back()->withErrors($response->json('errors'))->withInput();
        }
        if ($response->failed()) {
            return back()->with('error', $response->json('message') ?? 'Error en la API (' . $response->status() . ')')->withInput();
        }

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante registrado.');
    }

    public function show($id)
    {
        $url = env('API_BASE_URL');
        $student = $this->fetchDataFromApi($url . '/students/' . $id);

        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $url = env('API_BASE_URL');
        $student = $this->fetchDataFromApi($url . '/students/' . $id);
        $modules = $this->fetchDataFromApi($url . '/modules');

        return view('students.edit', compact('student', 'modules'));
    }

    public function update(Request $request, $id)
    {
        $url = env('API_BASE_URL');
        $data = $request->only(['expediente', 'nombre', 'apellidos', 'fecha_nacimiento', 'module_id']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $data['_method'] = 'PUT';

            Http::attach('foto', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
                ->post($url . '/students/' . $id, $data);
        } else {
            Http::put($url . '/students/' . $id, $data);
        }

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado.');
    }

    public function destroy($id)
    {
        $url = env('API_BASE_URL');
        Http::delete($url . '/students/' . $id);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado.');
    }
}