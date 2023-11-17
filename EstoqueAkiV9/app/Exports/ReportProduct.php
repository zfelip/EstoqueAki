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

        $entries = Input::where('product_id', $this->productId)->get();
        $outputs = Output::where('product_id', $this->productId)->get();

        $data = new Collection();

        // Adicione os dados de entrada à coleção com título
        $data->push(['Entradas do produto: ' . $product->nome]);
        $data->push(['Data e Horário', 'Quantidade']);
        foreach ($entries as $entry) {
            $data->push([
                'Data de Entrada' => $entry->updated_at->format('d/m/Y \à\s H:i:s'),
                'Quantidade de Entrada' => $entry->quantidade,
            ]);
        }

        // Adicione uma linha em branco para separar os dados
        $data->push(['----------------------------------------']);

        // Adicione os dados de saída à coleção com título
        $data->push(['Saídas do produto: ' . $product->nome]);
        $data->push(['Data e Horário', 'Quantidade', 'Tipo']);
        foreach ($outputs as $output) {
            $data->push([
                'Data de Saída' => $output->updated_at->format('d/m/Y \à\s H:i:s'),
                'Quantidade de Saída' => $output->quantidade,
                'Tipo de Saída' => $output->tipo, // Adapte conforme necessário
            ]);
        }

        return $data;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25,  // Largura da coluna A (por exemplo, 'Data de Entrada')
            'B' => 15,  // Largura da coluna B (por exemplo, 'Quantidade de Entrada')
            'C' => 8,  // Largura da coluna C (por exemplo, 'Tipo de Entrada')
        ];
    }

    // public function headings(): array
    // {
    //     return [
    //         'Título', // Coluna usada para títulos
    //         'Data de Entrada',
    //         'Quantidade de Entrada',
    //         'Tipo de Entrada',
    //         'Data de Saída',
    //         'Quantidade de Saída',
    //         'Tipo de Saída',
    //     ];
    // }
}
