<div class="form-grid">
    <div class="form-group">
        <label class="form-label">Nome completo</label>
        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome', $profissional->nome ?? '') }}" placeholder="Dr. João Silva">
        @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Tipo</label>
        <select name="tipo" class="form-control @error('tipo') is-invalid @enderror">
            @foreach(['psicologo' => 'Psicólogo', 'psiquiatra' => 'Psiquiatra'] as $val => $label)
                <option value="{{ $val }}"
                    {{ old('tipo', $profissional->tipo ?? 'psicologo') == $val ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        @error('tipo')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">CRP</label>
        <input type="text" name="crp" class="form-control @error('crp') is-invalid @enderror"
               value="{{ old('crp', $profissional->crp ?? '') }}" placeholder="06/123456">
        @error('crp')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Especialidade</label>
        <input type="text" name="especialidade" class="form-control @error('especialidade') is-invalid @enderror"
               value="{{ old('especialidade', $profissional->especialidade ?? '') }}" placeholder="Terapia Cognitivo-Comportamental">
        @error('especialidade')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $profissional->email ?? '') }}" placeholder="email@exemplo.com">
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror"
               value="{{ old('telefone', $profissional->telefone ?? '') }}" placeholder="(61) 99999-9999">
        @error('telefone')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
