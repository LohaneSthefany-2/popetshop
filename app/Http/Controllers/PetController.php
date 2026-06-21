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
        $dados = $request->all();

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $caminhoFoto = $request->foto->store('pets', 'public');
            $dados['foto'] = $caminhoFoto;
        }

        Pet::create($dados);
        return redirect('/pets');
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.editar', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);
        $dados = $request->all();

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if ($pet->foto) {
                Storage::disk('public')->delete($pet->foto);
            }
            $caminhoFoto = $request->foto->store('pets', 'public');
            $dados['foto'] = $caminhoFoto;
        }

        $pet->update($dados);
        return redirect('/pets');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);

        if ($pet->foto) {
            Storage::disk('public')->delete($pet->foto);
        }

        $pet->delete();
        return redirect('/pets');
    }
}