<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Flag;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::with('flag')->get();
        return view('units.index', compact('units'));
    }

    public function create()
    {
        $flags = Flag::all();
        return view('units.create', compact('flags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fantasy_name' => 'required|string|max:100|unique:units,fantasy_name',
            'corporate_name' => 'required|string|max:100|unique:units,corporate_name',
            'cnpj' => 'required|string|cnpj|unique:units,cnpj',
            'flag_id' => 'required|exists:flags,id',
        ], [
            'fantasy_name.unique' => 'O nome fantasia já está cadastrado no sistema.',
            'corporate_name.unique' => 'A razão social já está cadastrada no sistema.',
            'cnpj.unique' => 'O CNPJ já está cadastrado no sistema.',
            'cnpj.cnpj' => 'O CNPJ informado não é válido.',
        ]);

        Unit::create($request->all());

        return redirect()->route('units.index')->with('success', 'Unidade criada com sucesso.');
    }

    public function edit(Unit $unit)
    {
        $flags = Flag::all();
        return view('units.edit', compact('unit', 'flags'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'fantasy_name' => 'required|string|max:100|unique:units,fantasy_name,' . $unit->id,
            'corporate_name' => 'required|string|max:100|unique:units,corporate_name,' . $unit->id,
            'cnpj' => 'required|string|cnpj|unique:units,cnpj,' . $unit->id,
            'flag_id' => 'required|exists:flags,id',
        ], [
            'fantasy_name.unique' => 'O nome fantasia já está cadastrado no sistema.',
            'corporate_name.unique' => 'A razão social já está cadastrada no sistema.',
            'cnpj.unique' => 'O CNPJ já está cadastrado no sistema.',
            'cnpj.cnpj' => 'O CNPJ informado não é válido.',
        ]);

        $unit->update($request->all());

        return redirect()->route('units.index')->with('success', 'Unidade atualizada com sucesso.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('units.index')->with('success', 'Unidade deletada com sucesso.');
    }
}
