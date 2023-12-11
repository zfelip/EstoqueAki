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
    $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
    $endDate = Carbon::parse($request->input('end_date'))->endOfDay();

    // Converta as datas para o formato MySQL
    $startDateFormatted = $startDate->format('Y-m-d H:i:s');
    $endDateFormatted = $endDate->format('Y-m-d H:i:s');

    // Filtra as entradas e saídas do período
    $entries = Input::whereBetween('updated_at', [$startDateFormatted, $endDateFormatted])->get();
    $outputs = Output::whereBetween('updated_at', [$startDateFormatted, $endDateFormatted])->get();

    // Formatando as datas para o formato brasileiro
    $startDateBrazilian = $startDate->format('d/m/Y H:i:s');
    $endDateBrazilian = $endDate->format('d/m/Y H:i:s');

    // Passa os resultados e o período para a view
    return view('reports.movements.index', compact('entries', 'outputs', 'startDate', 'endDate', 'startDateBrazilian', 'endDateBrazilian'));
}


}
