<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use App\Models\Input;
use App\Models\Output;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ReportMovement implements FromCollection, WithColumnWidths
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Lógica para obter dados de entrada e saída com base nas datas fornecidas
        $entries = Input::whereBetween('updated_at', [$this->startDate, $this->endDate])->get();
        $outputs = Output::whereBetween('updated_at', [$this->startDate, $this->endDate])->get();

        $data = new Collection();

        // Cabeçalhos para dados de entrada
        $data->push([
            'Código', 'Data', 'Horário', 'Quantidade', 'Produto',
        ]);

        foreach ($entries as $entry) {
            $data->push([
                'Código Entrada' => $entry->id,  // Substitua 'id' pelo nome real do código, se aplicável
                'Data Entrada' => $entry->updated_at->format('d/m/Y'),
                'Horário Entrada' => $entry->updated_at->format('H:i:s'),
                'Quantidade Entrada' => $entry->quantidade,
                'Produto Entrada' => $entry->product->nome,
            ]);
        }

        // Adiciona uma linha em branco
        $data->push(['             ']);

        // Cabeçalhos para dados de saída
        $data->push([
            'Código', 'Data', 'Horário', 'Quantidade', 'Produto', 'Tipo',
        ]);

        foreach ($outputs as $output) {
            $data->push([
                'Código Saída' => $output->id,  // Substitua 'id' pelo nome real do código, se aplicável
                'Data Saída' => $output->updated_at->format('d/m/Y'),
                'Horário Saída' => $output->updated_at->format('H:i:s'),
                'Quantidade Saída' => $output->quantidade,
                'Produto Saída' => $output->product->nome,
                'Tipo' => $output->tipo,
            ]);
        }

        return $data;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,  // Largura da coluna A (por exemplo, 'Código Entrada')
            'B' => 20,  // Largura da coluna B (por exemplo, 'Data Entrada' ou 'Data Saída')
            'C' => 15,  // Largura da coluna C (por exemplo, 'Horário Entrada' ou 'Horário Saída')
            'D' => 15,  // Largura da coluna D (por exemplo, 'Quantidade Entrada' ou 'Quantidade Saída')
            'E' => 20,  // Largura da coluna E (por exemplo, 'Produto Entrada' ou 'Produto Saída')
            'F' => 20,  // Largura da coluna F (por exemplo, 'Tipo')
        ];
    }
}
