<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = ['quantity', 'created_at', 'updated_at', 'id_product', 'id_order'];

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
