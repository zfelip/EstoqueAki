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
        $this->input->product_id = $request->input('Entrada');

        $this->input->save();

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
