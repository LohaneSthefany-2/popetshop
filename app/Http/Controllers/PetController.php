<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

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
        Pet::create($request->all());
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
        $pet->update($request->all());
        return redirect('/pets');
    }

    public function destroy($id)
    {
        Pet::findOrFail($id)->delete();
        return redirect('/pets');
    }
}