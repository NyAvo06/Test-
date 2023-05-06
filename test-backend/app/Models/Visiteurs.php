<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visiteurs extends Model
{
    protected $table = 'visiteurs';
    
    protected $fillable = ['nom', 'age', 'statut'];

    use HasFactory;

    public function getStatutAttribute()
    {
        return $this->attributes['age'] >= 18 ? 'majeur' : 'mineur';
    }
}
