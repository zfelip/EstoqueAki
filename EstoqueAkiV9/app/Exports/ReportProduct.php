<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use App\Models\Input;
use App\Models\Output;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

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
        $data->push(['Código', 'Entradas', 'Data', 'Horário', 'Quantidade de Entrada']);
        foreach ($inputs as $input) {
            $data->push([
                'Código' => $input->id,
                'Entrada' => $input->product->nome,
                'Data' => $input->updated_at->format('d/m/Y'),
                'Horário' => $input->updated_at->format('H:i:s'),
                'Quantidade de Entrada' => $input->quantidade,
            ]);
        }

        $data->push(['']); // Adiciona uma linha em branco

        // Adicione os dados de saída à coleção com título
        $data->push(['Código', 'Saídas', 'Data', 'Horário', 'Quantidade de Saídas', 'Tipo']);
        foreach ($outputs as $output) {
            $data->push([
                'Código' => $output->id,
                'Saída' => $output->product->nome,
                'Data' => $output->updated_at->format('d/m/Y'),
                'Horário' => $output->updated_at->format('H:i:s'),
                'Quantidade de Saída' => $output->quantidade,
                'Tipo de Saída' => $output->tipo,
            ]);
        }

        return $data;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,  // Largura da coluna A (por exemplo, 'Código')
            'B' => 20,  // Largura da coluna B (por exemplo, 'Entradas' ou 'Saídas')
            'C' => 15,  // Largura da coluna C (por exemplo, 'Data')
            'D' => 15,  // Largura da coluna D (por exemplo, 'Horário')
            'E' => 20,  // Largura da coluna E (por exemplo, 'Quantidade de Entrada' ou 'Quantidade de Saída')
            'F' => 20,  // Largura da coluna F (por exemplo, 'Tipo de Saída')
        ];
    }
}
