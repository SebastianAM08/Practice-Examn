<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ModuleClientController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json() ?? [];
    }

    public function index()
    {
        $url = env('API_BASE_URL');
        $modules = $this->fetchDataFromApi($url . '/modules');

        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        $url = env('API_BASE_URL');
        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('modules.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $url = env('API_BASE_URL');
        Http::post($url . '/modules', $request->all());

        return redirect()->route('modulos.index')->with('success', 'Módulo registrado.');
    }

    public function show($id)
    {
        $url = env('API_BASE_URL');
        $module = $this->fetchDataFromApi($url . '/modules/' . $id);

        return view('modules.show', compact('module'));
    }

    public function edit($id)
    {
        $url = env('API_BASE_URL');
        $module = $this->fetchDataFromApi($url . '/modules/' . $id);
        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('modules.edit', compact('module', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $url = env('API_BASE_URL');
        Http::put($url . '/modules/' . $id, $request->all());

        return redirect()->route('modulos.index')->with('success', 'Módulo actualizado.');
    }

    public function destroy($id)
    {
        $url = env('API_BASE_URL');
        Http::delete($url . '/modules/' . $id);

        return redirect()->route('modulos.index')->with('success', 'Módulo eliminado.');
    }
}