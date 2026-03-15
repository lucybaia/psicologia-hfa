<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $table = 'profissionais'; // ← adicione essa linha

    protected $fillable = [
        'nome', 'crp', 'especialidade',
        'email', 'telefone', 'tipo'
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }
}
