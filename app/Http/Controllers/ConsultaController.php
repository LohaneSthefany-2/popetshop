<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::all();
        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        return view('consultas.criar');
    }

    public function store(Request $request)
    {
        Consulta::create($request->all());
        return redirect('/consultas');
    }

    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);
        return view('consultas.editar', compact('consulta'));
    }

    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->update($request->all());
        return redirect('/consultas');
    }

    public function destroy($id)
    {
        Consulta::findOrFail($id)->delete();
        return redirect('/consultas');
    }
}