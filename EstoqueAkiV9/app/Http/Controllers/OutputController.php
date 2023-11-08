<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Output;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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

        $product_id = $this->output->product_id;
        $quantidade = $this->output->quantidade;

        $this->output->save();
        //atualiza a quantidade de produto ao adicionar uma entrada
        $product = Product::find($product_id);
        $product->quantidade -= $quantidade;
        $product->save();

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
    public function update(Request $request, Output $output)
{
    $validated = $request->validate([
        'quantidade' => 'nullable|integer|gte:0',
    ]);

    $antiga_quantidade = $output->quantidade;

    $output->fill([
        'product_id' => is_null($request->input('Saida')) ? $output->product_id : $request->input('Saida'),
        'quantidade' => is_null($request->input('quantidade')) ? $output->quantidade : $request->input('quantidade'),
        'tipo' => is_null($request->input('tipo')) ? $output->tipo : $request->input('tipo'),
    ]);

    $product = Product::find($output->product_id);
    $nova_quantidade = $output->quantidade;
    $output->save();

    //atualiza a quantidade de produto ao adicionar uma entrada
    $product->quantidade += $antiga_quantidade;
    $product->quantidade -= $nova_quantidade;
    $product->save();

    return redirect()->route('outputs.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Output $output)
    {
        $product = Product::find($output->product_id);
        $product->quantidade += $output->quantidade;
        $product->save();
        $output->delete();

        return redirect()->route('outputs.index');
    }
}
