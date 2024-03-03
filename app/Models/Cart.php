<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Nom de la table associée au modèle
    protected $table = 'cart_item';

    // Liste des champs pouvant être remplis massivement
    protected $fillable = ['quantity', 'created_at', 'updated_at', 'id_user', 'id_product'];

    // Colonnes que Laravel convertira automatiquement en objets Carbon (dates)
    protected $dates = ['created_at', 'updated_at'];

    // Clé primaire de la table
    protected $primaryKey = 'id';

    // Indique si les colonnes de timestamp (created_at et updated_at) doivent être activées
    public $timestamps = true;

    // Relation avec le modèle User (si vous avez un modèle User)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
