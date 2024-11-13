<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use App\Models\Unit;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function index()
    {
        $collaborators = Collaborator::with('unit')->get();
        return view('collaborators.index', compact('collaborators'));
    }

    public function create()
    {
        $units = Unit::all();
        return view('collaborators.create', compact('units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:collaborators,name',
            'email' => 'required|email|unique:collaborators,email',
            'cpf' => 'required|string|size:14|unique:collaborators,cpf|cpf',
            'unit_id' => 'required|exists:units,id',
        ], [
            'name.unique' => 'O Nome já está cadastrado no sistema.',
            'email.unique' => 'O email já está cadastrado no sistema.',
            'cpf.unique' => 'O CPF já está cadastrado no sistema.',
            'cpf.cpf' => 'O CPF informado não é válido.',
        ]);

        Collaborator::create($request->all());

        return redirect()->route('collaborators.index')->with('success', 'Colaborador criado com sucesso.');
    }

    public function edit(Collaborator $collaborator)
    {
        $units = Unit::all();
        return view('collaborators.edit', compact('collaborator', 'units'));
    }

    public function update(Request $request, Collaborator $collaborator)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:collaborators,name',
            'email' => 'required|email|unique:collaborators,email,' . $collaborator->id,
            'cpf' => 'required|string|size:14|unique:collaborators,cpf,' . $collaborator->id . '|cpf',
            'unit_id' => 'required|exists:units,id',
        ], [
            'name.unique' => 'O Nome já está cadastrado no sistema.',
            'email.unique' => 'O email já está cadastrado no sistema.',
            'cpf.unique' => 'O CPF já está cadastrado no sistema.',
            'cpf.cpf' => 'O CPF informado não é válido.',
        ]);

        $collaborator->update($request->all());

        return redirect()->route('collaborators.index')->with('success', 'Colaborador atualizado com sucesso.');
    }

    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();
        return redirect()->route('collaborators.index')->with('success', 'Colaborador deletado com sucesso.');
    }
}
