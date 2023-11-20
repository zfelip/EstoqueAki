<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;
use App\Exports\ReportProduct;
use App\Exports\ReportMovement;
use Carbon\Carbon;

class ExcelController extends Controller
{
    //função para exportar dados do relatório de produto
    public function excelToExportProduct(Request $request, $type) {
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

    //função para exportar dados do relatório de movimentação
    public function excelToExportMovement(Request $request, $type)
{
    // Obtenha as datas do formulário
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Substitua barras por traços no nome do arquivo
    $fileName = 'relatorio_movimentacao_' . str_replace('/', '-', $startDate) . '_ate_' . str_replace('/', '-', $endDate) . '.' . $type;

    // Crie uma instância da classe de exportação e exporte os dados
    return Excel::download(new ReportMovement($startDate, $endDate), $fileName);
}

}
