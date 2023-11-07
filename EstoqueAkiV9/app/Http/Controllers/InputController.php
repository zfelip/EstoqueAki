<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Input;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public Product $product;
    public Input $input;

    public function __construct() {
        $this->product = new Product();
        $this->input = new Input();
    }

    public function index()
    {
        $products = $this->product->all();
        $inputs = $this->input->all();

        return view('inputs.index', ['products' => $products], ['inputs' => $inputs]);
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
        $this->input->quantidade = $request->input('quantidade');
        $this->input->product_id = $request->input('entrada');

        $product_id = $this->input->product_id;
        $quantidade = $this->input->quantidade;

        $this->input->save();

        //atualiza a quantidade de produto ao adicionar uma entrada
        $product = Product::find($product_id);
        $product->quantidade += $quantidade;
        $product->save();

        return redirect()->route('inputs.index');
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
    public function update(Request $request, Input $input)
    {
        $validated = $request->validate([
            'quantidade' => 'nullable|integer|gte:0',
        ]);

        $antiga_quantidade = $input->quantidade;

        $input->fill([
            'product_id' => is_null($request->input('entrada')) ? $input->product_id : $request->input('entrada'),
            'quantidade' => is_null($request->input('quantidade')) ? $input->quantidade : $request->input('quantidade'),
        ]);

        $product = Product::find($input->product_id);
        $nova_quantidade = $input->quantidade;
        $input->save();

        //atualiza a quantidade de produto ao adicionar uma entrada
        $product->quantidade -= $antiga_quantidade;
        $product->quantidade += $nova_quantidade;
        $product->save();

        return redirect()->route('inputs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Input $input)
    {
        $product = Product::find($input->product_id);
        $product->quantidade -= $input->quantidade;
        $product->save();
        $input->delete();

        return redirect()->route('inputs.index');
    }
}
