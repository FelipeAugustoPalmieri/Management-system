<?php

namespace App\Http\Controllers;

use App\Exports\CollaboratorsExport;
use App\Models\Collaborator;
use App\Models\Unit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
            'name.unique' => 'The name is already registered in the system.',
            'email.unique' => 'The email is already registered in the system.',
            'cpf.unique' => 'The CPF is already registered in the system.',
            'cpf.cpf' => 'The CPF entered is not valid.',
        ]);

        Collaborator::create($request->all());

        return redirect()->route('collaborators.index')->with('success', 'Contributor created successfully.');
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
            'name.unique' => 'The name is already registered in the system.',
            'email.unique' => 'The email is already registered in the system.',
            'cpf.unique' => 'The CPF is already registered in the system.',
            'cpf.cpf' => 'The CPF entered is not valid.',
        ]);

        $collaborator->update($request->all());

        return redirect()->route('collaborators.index')->with('success', 'Collaborator updated successfully.');
    }

    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();
        return redirect()->route('collaborators.index')->with('success', 'Collaborator deleted successfully.');
    }

    public function report(Request $request)
    {
        $query = Collaborator::with('unit');

        if ($request->filled('unit_id')) {
            $query->where('unit_id', $request->unit_id);
        }
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('cpf')) {
            $query->where('cpf', $request->cpf);
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $collaborators = $query->get();
        $units = Unit::all();

        return view('collaborators.report', compact('collaborators', 'units'));
    }

    public function export(Request $request)
    {
        $query = Collaborator::with('unit');

        if ($request->filled('unit_id')) {
            $query->where('unit_id', $request->unit_id);
        }
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->filled('cpf')) {
            $query->where('cpf', $request->cpf);
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $collaborators = $query->get();

        return Excel::download(new CollaboratorsExport($collaborators), 'colaboradores_filtrados.xlsx');
    }
}
