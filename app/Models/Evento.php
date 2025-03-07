<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    /** @use HasFactory<\Database\Factories\EventoFactory> */
    use HasFactory;

    protected $table = 'eventos';
    protected $fillable = ['evento', 'tipo', 'nivel'];

    public function miembro(){
        return $this->belongsTo(miembro::class);
    }
}
