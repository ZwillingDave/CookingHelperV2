<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storage extends Model
{
    // Verwendung des HasFactory-Traits
    use HasFactory;

    // Spalten, die beschreibbar sind festlegen
    protected $fillable = [
        'product_id',
        'quantity',
        'user_id',
        'unit_id',
        'product_name',
        
    ];
    // Name der Tabelle auf 'storage' setzen
    protected $table = 'storage'; 
}