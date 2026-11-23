<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'codigo',
        'nombre',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'module_teacher')->withTimestamps();
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'module_id');
    }
}
