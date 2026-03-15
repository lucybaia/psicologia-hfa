<div class="form-grid">
    <div class="form-group">
        <label class="form-label">Nome completo</label>
        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome', $paciente->nome ?? '') }}" placeholder="Ex: Maria da Silva">
        @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">CPF</label>
        <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
               value="{{ old('cpf', $paciente->cpf ?? '') }}" placeholder="000.000.000-00">
        @error('cpf')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $paciente->email ?? '') }}" placeholder="email@exemplo.com">
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror"
               value="{{ old('telefone', $paciente->telefone ?? '') }}" placeholder="(61) 99999-9999">
        @error('telefone')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Data de Nascimento</label>
        <input type="date" name="data_nascimento" class="form-control @error('data_nascimento') is-invalid @enderror"
               value="{{ old('data_nascimento', $paciente->data_nascimento ?? '') }}">
        @error('data_nascimento')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="form-group">
    <label class="form-label">Observações clínicas</label>
    <textarea name="observacoes" class="form-control" rows="4"
              placeholder="Anotações relevantes sobre o paciente...">{{ old('observacoes', $paciente->observacoes ?? '') }}</textarea>
</div>
