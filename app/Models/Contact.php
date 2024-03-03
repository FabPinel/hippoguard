<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = "contact";

    protected $fillable = ['id_product', 'firstname', 'lastname',  'email', 'subject', 'phone', 'enterprise', 'message', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
