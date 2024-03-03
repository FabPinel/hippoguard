<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = ['name', 'description', 'discount_percent', 'discount_amount', 'active', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
