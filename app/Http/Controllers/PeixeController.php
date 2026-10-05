<?php

namespace App\Http\Controllers;

use App\Models\Peixe;
use Illuminate\Http\Request;

class PeixeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Peixe::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'peso' => 'required|numeric|min:0',
            'preco' => 'required|numeric|min:0'
        ]);

        return response()->json(Peixe::create($dados), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(Peixe::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peixe = Peixe::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'peso' => 'required|numeric|min:0',
            'preco' => 'required|numeric|min:0'
        ]);

        $peixe->update($dados);
        return response()->json($peixe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peixe = Peixe::findOrFail($id);
        $peixe->delete();
        return response()->noContent();
    }
}
