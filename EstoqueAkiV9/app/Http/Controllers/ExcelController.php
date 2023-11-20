<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;
use App\Exports\ReportProduct;
use Carbon\Carbon;

class ExcelController extends Controller
{
    public function excelToExport(Request $request, $type) {
        // Obtém o ID do produto da requisição
        $productId = $request->input('produto');

        // Obtém o nome do produto
        $productName = Product::find($productId)->nome;

        // Obtém a data de hoje no formato desejado
        $todayDate = Carbon::now()->format('d-m-Y');

        // Concatena o nome do produto e a data para formar o nome do arquivo
        $fileName = "Relatorio_{$productName}_{$todayDate}." . ($type == 'pdf' ? 'pdf' : 'xlsx');

        return Excel::download(new ReportProduct($productId), $fileName);
    }
}
