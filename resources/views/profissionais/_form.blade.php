<div class="form-grid">
    <div class="form-group">
        <label class="form-label">Nome completo</label>
        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome', $profissional->nome ?? '') }}" placeholder="Dr. João Silva">
        @error('nome')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="form-group">
        <label class="form-label">Tipo</label>
        <select name="tipo" id="tipoProfissional" class="form-control @error('tipo') is-invalid @enderror">
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
        <label class="form-label" id="labelRegistro">CRP</label>
        <input type="text" name="registro" id="inputRegistro" class="form-control @error('registro') is-invalid @enderror"
               value="{{ old('registro', $profissional->registro ?? '') }}" placeholder="06/123456">
        @error('registro')<div class="invalid-feedback">{{ $message }}</div>@enderror
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectTipo = document.getElementById('tipoProfissional');
        const inputRegistro = document.getElementById('inputRegistro');
        const labelRegistro = document.getElementById('labelRegistro');

        function aplicarMascaraRegistro() {
            const tipo = selectTipo.value;
            let v = inputRegistro.value;

            if (tipo === 'psiquiatra') {
                labelRegistro.innerText = 'CRM';
                inputRegistro.placeholder = 'CRM/UF 000000';

                // MÁSCARA CRM: CRM/UF 000000
                v = v.toUpperCase();
                // Limita o inicio a CRM/ + DUAS LETRAS + espaco + números
                let letters = v.replace(/[^A-Z]/g, '').substring(0, 5); // Pode ser CRMUF
                let numbers = v.replace(/\D/g, ''); // Apenas números

                let formatado = '';
                if(letters.length > 0) {
                    if(!v.startsWith("CRM/")) {
                        formatado = "CRM/";
                        letters = letters.replace("CRM", "");
                    } else {
                         formatado = "CRM/";
                         letters = letters.substring(3);
                    }

                    if(letters.length > 0) {
                         formatado += letters.substring(0, 2);
                         if(numbers.length > 0) {
                             formatado += " " + numbers.substring(0, 6);
                         }
                    }
                    inputRegistro.value = formatado;
                }

                inputRegistro.maxLength = 14;

            } else {
                labelRegistro.innerText = 'CRP';
                inputRegistro.placeholder = '00/000000';

                // MÁSCARA CRP: 00/000000
                v = v.replace(/\D/g, '').slice(0, 8);
                v = v.replace(/(\d{2})(\d)/, '$1/$2');
                inputRegistro.value = v;
                inputRegistro.maxLength = 9;
            }
        }

        // Remove listener antigo global que impedia CRM de ter letras
        // Tem um mascaraCRP em app.blade.php que conflita com a classe ou name 'crp',
        // por isso agora o name é 'registro'. O script de app.blade afeta name="crp", que não existe mais.

        inputRegistro.addEventListener('input', aplicarMascaraRegistro);
        selectTipo.addEventListener('change', function() {
            inputRegistro.value = ''; // limpa ao trocar de tipo para evitar lixo da máscara anterior
            aplicarMascaraRegistro();
        });

        // Aplicar no load inicial
        aplicarMascaraRegistro();
    });
</script>
