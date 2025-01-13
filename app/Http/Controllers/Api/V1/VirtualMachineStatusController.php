<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\VirtualMachine;
use Illuminate\Http\Request;
use App\Models\VirtualMachineStatus;

class VirtualMachineStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VirtualMachine $virtualMachine)
    {
        return $virtualMachine->statuses()->orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, VirtualMachine $virtualMachine)
    {
        // add validation for type, value and unit
        $validated = $request->validate([
            'type' => 'required|string',
            'value' => 'required|numeric',
            'unit' => 'required|string',
        ]);

        $virtualMachine->statuses()->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(VirtualMachine $virtualMachine, string $id)
    {
        return $virtualMachine->statuses()->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
