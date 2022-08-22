<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'en_name',
        'bn_name',
        'image_name'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}