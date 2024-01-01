<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use App\Models\Input;
use App\Models\Output;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory, SoftDeletes;

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

    public function input()
    {
        return $this->hasOne(Input::class, 'product_id');
    }

    public function Output()
    {
        return $this->hasOne(Output::class, 'product_id');
    }
}
