<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantidade',
        'tipo',
    ];

    public function product()
    {
    return $this->belongsTo(Product::class, 'product_id');
    }
}
