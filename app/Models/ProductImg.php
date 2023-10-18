<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $fillable = ['product_id', 'file_name'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
