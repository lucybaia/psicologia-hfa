<div class="form-grid">
    <div class="form-group">
        <label class="form-label">Paciente</label>
        <select name="paciente_id" class="form-control @error('paciente_id') is-invalid @enderror">
            <option value="">Selecione...</option>
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}"
                    {{ old('paciente_id', $consulta->paciente_id ?? '') == $paciente->id ? 'selected' : '' }}>
                    {{ $paciente->nome }}
                </option>
            @endforeach
        </select>
        @error('paciente_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Status</label>
        <select name="status" class="form-control @error('status') is-invalid @enderror">
            @foreach(['agendada' => 'Agendada', 'realizada' => 'Realizada', 'cancelada' => 'Cancelada'] as $val => $label)
                <option value="{{ $val }}"
                    {{ old('status', $consulta->status ?? 'agendada') == $val ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Data</label>
        <input type="date" name="data" class="form-control @error('data') is-invalid @enderror"
               value="{{ old('data', $consulta->data ?? '') }}">
        @error('data')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Hora</label>
        <input type="time" name="hora" class="form-control @error('hora') is-invalid @enderror"
               value="{{ old('hora', $consulta->hora ?? '') }}">
        @error('hora')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Duração (minutos)</label>
        <input type="number" name="duracao" class="form-control @error('duracao') is-invalid @enderror"
               value="{{ old('duracao', $consulta->duracao ?? 50) }}" min="10">
        @error('duracao')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="form-group">
    <label class="form-label">Anotações</label>
    <textarea name="anotacoes" class="form-control" rows="4"
              placeholder="Observações sobre a consulta...">{{ old('anotacoes', $consulta->anotacoes ?? '') }}</textarea>
</div>

<div class="form-group">
    <label class="form-label">Profissional</label>
    <select name="profissional_id" class="form-control @error('profissional_id') is-invalid @enderror">
        <option value="">Selecione...</option>
        @foreach($profissionais as $profissional)
            <option value="{{ $profissional->id }}"
                {{ old('profissional_id', $consulta->profissional_id ?? '') == $profissional->id ? 'selected' : '' }}>
                {{ $profissional->nome }} — {{ $profissional->tipo == 'psicologo' ? 'Psicólogo' : 'Psiquiatra' }}
            </option>
        @endforeach
    </select>
    @error('profissional_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
