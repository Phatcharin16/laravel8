<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'content', 'price', 'photo', 'stock'];
    public function quotation_deatils()
    {
        return $this->hasMany(QuotationDetail::class, 'product_id');
    }
}
