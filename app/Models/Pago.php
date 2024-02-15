<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['usuario_id', 'anio_explotacion', 'importe', 'factura', 'estadopago_id'];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }

    public function estadopago(){
        return $this->belongsTo(EstadoPago::class);
    }
}
