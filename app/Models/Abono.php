<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    use HasFactory;
    protected $table = 'abonos';
    protected $fillable = [
        'idPago',
        'anio',
        'valor',
        'factura',
    ];
}