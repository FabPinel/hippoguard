<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'information', 'media', 'price', 'quantity', 'active', 'id_category', 'created_at', 'updated_at',];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id');
    }
}
