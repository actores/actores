<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePago extends Model
{
    protected $fillable = ['pago_id', 'anio', 'valor', 'factura'];

    public function pago(){
        return $this->belongsTo(Pago::class);
    }
}
