<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageItem extends Model
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
    
    protected $table = 'storageitems'; 

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}