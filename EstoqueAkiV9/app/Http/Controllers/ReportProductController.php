<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Input;
use App\Models\Output;
use Illuminate\Http\Request;

class ReportProductController extends Controller
{
    //
    public Product $product;
    public Output $output;
    public Input $input;

    public function __construct() {
        $this->product = new Product();
        $this->output = new Output();
        $this->input = new Input();

    }

    public function index()
    {
        $products = $this->product->all();

        return view('reports.products.index', ['products' => $products]);
    }

    public function show(Request $request)
{
    // Obtém o ID do produto da requisição
    $productId = $request->input('produto');

    // Filtra as entradas e saídas do produto
    $entries = Input::where('product_id', $productId)->get();
    $outputs = Output::where('product_id', $productId)->get();

    // Passa os resultados para a view
    return view('reports.products.index', compact('entries', 'outputs'));
}

}
