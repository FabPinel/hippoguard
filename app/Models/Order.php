<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['total', 'created_at', 'updated_at', 'id_user', 'id_status', 'id_discount'];

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'id_status');
    }

    public function orderAddress()
    {
        return $this->belongsTo(OrderAddress::class, 'id_order');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'id_discount');
    }
}
