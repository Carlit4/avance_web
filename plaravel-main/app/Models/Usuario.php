<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $table = 'usuarios';
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function perfil():BelongsTo
    {
        return $this->belongsTo(Perfil::class);
    }

    public function esAdmin():bool{
        return $this->perfil->nombre =='Administrador';
    }

    public function esEjecutivo():bool{
        return $this->perfil->nombre == 'Ejecutivo';
    }

    public function usuarioPerfil(){
        return $this->perfil->nombre;
    }

}
