<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Output extends Model
{
    use HasFactory;

    protected $fillable = [
'product_id',
        'quantidade',
        'tipo',
    ];

    public function product()
    {
    return $this->belongsTo(Product::class, 'product_id');
    }
}
