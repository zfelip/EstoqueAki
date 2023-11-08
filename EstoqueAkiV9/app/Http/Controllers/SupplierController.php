<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::all(),
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Supplier::create($request->all());   
        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', ['supplier' => $supplier]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        
        $supplier->fill([
            'nome' => is_null($request->input('nome')) ? $supplier->nome : $request->input('nome'),
            'cnpj' => is_null($request->input('cnpj')) ? $supplier->cnpj : $request->input('cnpj'),
            'telefone' => is_null($request->input('telefone')) ? $supplier->telefone : $request->input('telefone'),
        ]);

        $supplier->save();
        return redirect()->route('suppliers.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index');
    }
}
