<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::all();
        return view('machines.index', compact('machines'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'machinetype' => 'required|in:Washer,Dryer',
            'brand'       => 'required|string|max:100',
            'capacity'    => 'required|integer|min:1',
            'status'      => 'required|in:0,1',
        ]);
        Machine::create($data);
        return redirect()->route('machines.index');
    }

    public function update(Request $request, Machine $machine)
    {
        $data = $request->validate(['status' => 'required|in:0,1']);
        $machine->update($data);
        return redirect()->route('machines.index');
    }

    public function destroy(Machine $machine)
    {
        $machine->delete();
        return redirect()->route('machines.index');
    }
}