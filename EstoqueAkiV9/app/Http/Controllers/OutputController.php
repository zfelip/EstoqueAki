<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Output;
use App\Models\Product;

class OutputController extends Controller
{

    public Product $product;
    public Output $output;

    public function __construct() {
        $this->product = new Product();
        $this->output = new Output();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->all();
        $outputs = $this->output->all();

        return view('outputs.index', ['products' => $products], ['outputs' => $outputs]);
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
        $this->output->product_id = $request->input('Saida');
        $this->output->quantidade = $request->input('quantidade');
        $this->output->tipo = $request->input('tipo');

        $this->output->save();

        return redirect()->route('outputs.index');
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
    public function edit(string $id)
    {
        //
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
