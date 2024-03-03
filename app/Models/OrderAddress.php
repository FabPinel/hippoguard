<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;
    protected $table = 'order_address';

    protected $fillable = ['first_name', 'last_name', 'address', 'city', 'country', 'postal_code', 'phone', 'id_order'];

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }
}
