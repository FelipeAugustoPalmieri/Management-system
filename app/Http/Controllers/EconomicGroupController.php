<?php

namespace App\Http\Controllers;

use App\Models\EconomicGroup;
use Illuminate\Http\Request;

class EconomicGroupController extends Controller
{
    public function index()
    {
        $economicGroups = EconomicGroup::all();
        return view('economic_groups.index', compact('economicGroups'));
    }

    public function create()
    {
        return view('economic_groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:economic_groups,name',
        ], [
            'name.unique' => 'O nome já existe. Por favor, escolha um nome diferente.',
        ]);

        EconomicGroup::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('economic-groups.index')->with('success', 'Grupo econômico criado com sucesso.');
    }

    public function edit(EconomicGroup $economicGroup)
    {
        return view('economic_groups.edit', compact('economicGroup'));
    }

    public function update(Request $request, EconomicGroup $economicGroup)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:economic_groups,name,' . $economicGroup->id,
        ], [
            'name.unique' => 'O nome já existe. Por favor, escolha um nome diferente.',
        ]);

        $economicGroup->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('economic-groups.index')->with('success', 'Grupo econômico atualizado com sucesso.');
    }

    public function destroy(EconomicGroup $economicGroup)
    {
        $economicGroup->delete();
        return redirect()->route('economic-groups.index')->with('success', 'Grupo econômico deletado com sucesso.');
    }
}
