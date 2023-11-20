<?php

namespace App\Exports;

use App\Models\Input;
use App\Models\Output;
use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

// class ReportProduct implements FromCollection, WithHeadings
class ReportProduct implements FromCollection, WithColumnWidths
{
    protected $productId;

    public function __construct($productId)
    {
        $this->productId = $productId;
    }

    public function collection()
    {
        // Obtém o produto para referência no título
        $product = Product::find($this->productId);

        $inputs = Input::where('product_id', $this->productId)->get();
        $outputs = Output::where('product_id', $this->productId)->get();

        $data = new Collection();

        // Adicione os dados de entrada à coleção com título
        $data->push(['Código', 'Entradas', 'Data e Horário', 'Quantidade de Entrada']);
        foreach ($inputs as $input) {
            $data->push([
                'Código' => $input->id,
                'Entrada' => $input->product->nome,
                'Data de Entrada' => $input->updated_at->format('d/m/Y \à\s H:i:s'),
                'Quantidade de Entrada' => $input->quantidade,
            ]);
        }

        $data->push(['             ']);

        // Adicione os dados de saída à coleção com título
        $data->push(['Código', 'Saídas', 'Data e Horário', 'Quantidade de Saídas', 'Tipo']);
        foreach ($outputs as $output) {
            $data->push([
                'Código' => $output->id,
                'Saída' => $output->product->nome,
                'Data de Saída' => $output->updated_at->format('d/m/Y \à\s H:i:s'),
                'Quantidade de Saída' => $output->quantidade,
                'Tipo de Saída' => $output->tipo,
            ]);
        }

        return $data;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,  // Largura da coluna A (por exemplo, 'Data de Entrada')
            'B' => 20,  // Largura da coluna B (por exemplo, 'Quantidade de Entrada')
            'C' => 25,  // Largura da coluna C (por exemplo, 'Tipo de Entrada')
            'D' => 20,  // Largura da coluna C (por exemplo, 'Tipo de Entrada')
            'E' => 15,  // Largura da coluna C (por exemplo, 'Tipo de Entrada')
        ];
    }

    // public function headings(): array
    // {
    //     return [
    //         'Relatório de Produtos', // Coluna usada para títulos
    //         'Movimentação',
    //         'Data e Hora'
    //     ];
    // }
}
