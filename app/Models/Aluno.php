<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model {
    use HasFactory;

    protected $fillable = [
        'nome', 'email', 'curso_id'
    ];

    public function curso() {
        return $this->belongsTo(Curso::class);
    }

    public function matriculas() {
        return $this->hasMany(Matricula::class);
    }
}
