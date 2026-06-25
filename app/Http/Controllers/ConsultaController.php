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
        $request->validate([
            'nomepet' => 'required|string|max:255',
            'dataconsulta' => 'required|date',
            'descricao' => 'required|string',
        ]);

        Consulta::create($request->all());

        return redirect('/consultas')->with('sucesso', 'Consulta cadastrada com sucesso!');
    }

    public function edit(Consulta $consulta)
    {
        return view('consultas.editar', compact('consulta'));
    }

    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'nomepet' => 'required|string|max:255',
            'dataconsulta' => 'required|date',
            'descricao' => 'required|string',
        ]);

        $consulta->update($request->all());

        return redirect('/consultas')->with('sucesso', 'Consulta atualizada com sucesso!');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();

        return redirect('/consultas')->with('sucesso', 'Consulta excluída com sucesso!');
    }
}