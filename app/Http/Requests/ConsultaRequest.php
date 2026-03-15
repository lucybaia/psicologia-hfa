<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class ConsultaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'paciente_id'     => 'required|exists:pacientes,id',
            'profissional_id' => 'nullable|exists:profissionais,id',
            'data'            => 'required|date',
            'hora'            => 'required',
            'duracao'         => 'required|integer|min:10',
            'status'          => 'required|in:agendada,realizada,cancelada',
            'anotacoes'       => 'nullable|string',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $this->input('data');
            $hora = $this->input('hora');

            if (!$data || !$hora) return;

            $dataCarbon = Carbon::parse($data);
            $horaCarbon = Carbon::parse($hora);

            $diaSemana  = $dataCarbon->dayOfWeek;
            // 0 = domingo, 1 = segunda, ..., 5 = sexta, 6 = sábado

            $horaInicio = Carbon::parse('07:00');

            // Domingo e Sábado — sem atendimento
            if ($diaSemana === 0 || $diaSemana === 6) {
                $validator->errors()->add('hora', 'Não há atendimento aos fins de semana.');
                return;
            }

            // Sexta-feira — até 19:00
            if ($diaSemana === 5) {
                $horaFim = Carbon::parse('19:00');
                if ($horaCarbon->lt($horaInicio) || $horaCarbon->gt($horaFim)) {
                    $validator->errors()->add('hora', 'Nas sextas-feiras o atendimento é das 07:00 às 19:00.');
                }
                return;
            }

            // Segunda a quinta — até 23:00
            $horaFim = Carbon::parse('23:00');
            if ($horaCarbon->lt($horaInicio) || $horaCarbon->gt($horaFim)) {
                $validator->errors()->add('hora', 'O atendimento é das 07:00 às 23:00.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'paciente_id.required'  => 'Selecione um paciente.',
            'paciente_id.exists'    => 'Paciente inválido.',
            'data.required'         => 'Informe a data da consulta.',
            'hora.required'         => 'Informe o horário da consulta.',
            'duracao.required'      => 'Informe a duração da consulta.',
            'status.required'       => 'Selecione o status.',
        ];
    }
}
