<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Input extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantidade',
    ];

    public function product()
    {
    return $this->belongsTo(Product::class, 'product_id');
    }

}
