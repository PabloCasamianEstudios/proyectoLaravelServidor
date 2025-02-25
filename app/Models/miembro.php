<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miembro extends Model{
    /** @use HasFactory<\Database\Factories\MiembroFactory> */
    use HasFactory;
    protected $table = 'miembros';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $timestamp = true;

    public $fillable = ['nombre','tipo_sangre','fecha_entrada','rango'];
    public function eventos(){
        return $this->hasMany(Evento::class);
    }
}
