<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nombre', 'id_tipousuarios', 'nit', 'direccion', 'ciudad'];

    public function tipousuario(){
        return $this->belongsTo(TipoUsuario::class);
    }
}
