<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nome', 'email', 'telefone',
        'data_nascimento', 'cpf', 'observacoes'
    ];
public function consultas()
{
    return $this->hasMany(Consulta::class);
}
}
