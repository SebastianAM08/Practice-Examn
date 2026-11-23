<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'cedula',
    ];

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'module_teacher')->withTimestamps();
    }
}