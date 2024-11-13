<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use App\Models\EconomicGroup;
use Illuminate\Http\Request;

class FlagController extends Controller
{
    public function index()
    {
        $flags = Flag::with('economicGroup')->get();
        return view('flags.index', compact('flags'));
    }

    public function create()
    {
        $economicGroups = EconomicGroup::all();
        return view('flags.create', compact('economicGroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:flags,name',
            'economic_group_id' => 'required|exists:economic_groups,id',
        ]);

        Flag::create([
            'name' => $request->input('name'),
            'economic_group_id' => $request->input('economic_group_id'),
        ]);

        return redirect()->route('flags.index')->with('success', 'Flag created successfully.');
    }

    public function edit(Flag $flag)
    {
        $economicGroups = EconomicGroup::all();
        return view('flags.edit', compact('flag', 'economicGroups'));
    }

    public function update(Request $request, Flag $flag)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:flags,name,' . $flag->id,
            'economic_group_id' => 'required|exists:economic_groups,id',
        ]);

        $flag->update([
            'name' => $request->input('name'),
            'economic_group_id' => $request->input('economic_group_id'),
        ]);

        return redirect()->route('flags.index')->with('success', 'Flag updated successfully.');
    }

    public function destroy(Flag $flag)
    {
        $flag->delete();
        return redirect()->route('flags.index')->with('success', 'Flag deleted successfully.');
    }
}
