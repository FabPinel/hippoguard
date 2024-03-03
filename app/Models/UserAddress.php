<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'users_address';

    protected $fillable = ['first_name', 'last_name', 'address_line', 'city', 'postalCode', 'country', 'phone', 'default', 'created_at', 'updated_at', 'id_user'];

    protected $dates = ['created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
