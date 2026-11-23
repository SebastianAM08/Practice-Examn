<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherClientController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('API_BASE_URL');
        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $url = env('API_BASE_URL');
        Http::post($url . '/teachers', $request->all());

        return redirect()->route('profesores.index')->with('success', 'Profesor registrado.');
    }

    public function show($id)
    {
        $url = env('API_BASE_URL');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        $url = env('API_BASE_URL');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $url = env('API_BASE_URL');
        Http::put($url . '/teachers/' . $id, $request->all());

        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado.');
    }

    public function destroy($id)
    {
        $url = env('API_BASE_URL');
        Http::delete($url . '/teachers/' . $id);

        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado.');
    }
}