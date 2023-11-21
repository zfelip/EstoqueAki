<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'valor',
        'quantidade',
        'preco',
        'status',
        'supplier_id'
    ];

    public function supplier()
    {
    return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
