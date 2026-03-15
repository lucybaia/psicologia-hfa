<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfissionalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $profissionalId = $this->route('profissional')?->id;

        return [
            'nome'          => 'required|string|max:255',
            'crp'           => 'required|string|unique:profissionais,crp,' . $profissionalId,
            'especialidade' => 'required|string|max:255',
            'email'         => 'required|email|unique:profissionais,email,' . $profissionalId,
            'telefone'      => 'required|string|max:20',
            'tipo'          => 'required|in:psicologo,psiquiatra',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'          => 'Informe o nome do profissional.',
            'crp.required'           => 'Informe o CRP.',
            'crp.unique'             => 'Este CRP já está cadastrado.',
            'especialidade.required' => 'Informe a especialidade.',
            'email.required'         => 'Informe o email.',
            'email.unique'           => 'Este email já está cadastrado.',
            'telefone.required'      => 'Informe o telefone.',
            'tipo.required'          => 'Selecione o tipo de profissional.',
        ];
    }
}
