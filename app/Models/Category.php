<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'products_category';

    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;
}
