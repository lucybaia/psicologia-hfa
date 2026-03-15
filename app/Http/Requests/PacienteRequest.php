<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $pacienteId = $this->route('paciente')?->id;

        return [
            'nome'            => 'required|string|max:255',
            'email'           => 'required|email|unique:pacientes,email,' . $pacienteId,
            'telefone'        => 'required|string|max:20',
            'data_nascimento' => 'required|date|before:today',
            'cpf'             => 'required|string|unique:pacientes,cpf,' . $pacienteId,
            'observacoes'     => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'            => 'Informe o nome do paciente.',
            'email.required'           => 'Informe o email.',
            'email.unique'             => 'Este email já está cadastrado.',
            'cpf.required'             => 'Informe o CPF.',
            'cpf.unique'               => 'Este CPF já está cadastrado.',
            'data_nascimento.required' => 'Informe a data de nascimento.',
            'data_nascimento.before'   => 'A data de nascimento não pode ser futura.',
            'telefone.required'        => 'Informe o telefone.',
        ];
    }
}
