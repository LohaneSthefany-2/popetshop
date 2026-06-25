<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.criar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomepet' => 'required|string|max:255',
            'dono' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $dados = $request->all();

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $caminhoFoto = $request->foto->store('pets', 'public');
            $dados['foto'] = $caminhoFoto;
        }

        Pet::create($dados);
        return redirect('/pets')->with('sucesso', 'Pet cadastrado com sucesso!');
    }

    public function edit(Pet $pet)
    {
        return view('pets.editar', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'nomepet' => 'required|string|max:255',
            'dono' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ]);

        $dados = $request->all();

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if ($pet->foto) {
                Storage::disk('public')->delete($pet->foto);
            }
            $caminhoFoto = $request->foto->store('pets', 'public');
            $dados['foto'] = $caminhoFoto;
        }

        $pet->update($dados);
        return redirect('/pets')->with('sucesso', 'Pet atualizado com sucesso!');
    }

    public function destroy(Pet $pet)
    {
        if ($pet->foto) {
            Storage::disk('public')->delete($pet->foto);
        }

        $pet->delete();
        return redirect('/pets')->with('sucesso', 'Pet excluído com sucesso!');
    }
}