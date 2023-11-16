<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Input;
use App\Models\Output;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportMovementController extends Controller
{
    public Product $product;
    public Output $output;
    public Input $input;

    public function __construct() {
        $this->product = new Product();
        $this->output = new Output();
        $this->input = new Input();

    }
    //
    public function index()
    {
        $products = $this->product->all();

        return view('reports.movements.index', ['products' => $products]);
    }

    public function store(Request $request)
{
    $startDate = Carbon::parse($request->input('start_date'))->format('d/m/Y');
    $endDate = Carbon::parse($request->input('end_date'))->format('d/m/Y');

    // Filtra as entradas e saídas do período
    $entries = Input::whereBetween('created_at', [$startDate, $endDate])->get();
    $outputs = Output::whereBetween('created_at', [$startDate, $endDate])->get();

    // Passa os resultados e o período para a view
    return view('reports.movements.index', compact('entries', 'outputs', 'startDate', 'endDate'));
}


}
