<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Mostrar a lista
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    // Mostrar o formulário para cadastrar
    public function create()
    {
        // CORRIGIDO: de 'clientes.crriar' para 'clientes.criar'
        return view('clientes.criar');
    }

    // Receber os dados do formulário e salvar
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string',
            'cpf' => 'nullable|string|unique:clientes,cpf',
            'endereco' => 'nullable|string',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('sucesso', 'Cliente cadastrado com sucesso!');
    }

    // Mostrar o formulário de edição com os dados do cliente preenchidos
    public function edit(Cliente $cliente)
    {
        return view('clientes.editar', compact('cliente'));
    }

    // Receber as alterações do formulário e atualizar no banco de dados
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone' => 'required|string',
            'cpf' => 'nullable|string|unique:clientes,cpf,' . $cliente->id,
            'endereco' => 'nullable|string',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('sucesso', 'Cliente atualizado com sucesso!');
    }

    // Excluir o cliente do banco de dados
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('sucesso', 'Cliente excluído com sucesso!');
    }
}