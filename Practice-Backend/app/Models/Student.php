<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'module_id',
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'expediente',
        'foto_url',
        'foto_public_id',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
