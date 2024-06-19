<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProveedor extends Model
{
    use HasFactory;
    protected $table = 'tipos_proveedor';
    protected $fillable = [
        'nombre',
    ];
}
