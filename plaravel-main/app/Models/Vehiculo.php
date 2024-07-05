<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\SoftDeletes;


class Vehiculo extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'vehiculos';
    protected $primaryKey = 'patente';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function tipo():BelongsTo
    {
        return $this->belongsTo(Tipo::class);
    }

    public function arriendo():HasMany
    {
        return $this->hasMany(Arriendo::class);
    }

}
