<div class="form-group">
    <label for="queixa">Queixa</label>
    <input type="text" class="form-control" id="queixa" name="queixa" value="{{ old('queixa') }}" required>
</div>
<div class="form-group">
    <label for="medicacao_pre_consulta">Está tomando alguma medicação?</label>
    <input type="text" class="form-control" id="medicacao_pre_consulta" name="medicacao_pre_consulta" value="{{ old('medicacao_pre_consulta') }}" required>
</div>
<div class="form-group">
    <label for="alergia">Alergia</label>
    <input type="text" class="form-control" id="alergia" name="alergia" value="{{ old('alergia') }}" required>
</div>
<div class="form-group">
    <label for="cirurgia">Cirurgia</label>
    <input type="text" class="form-control" id="cirurgia" name="cirurgia" value="{{ old('cirurgia') }}" required>
</div>
<div class="form-group">
    <label for="sangramento">Sangramento</label>
    <input type="text" class="form-control" id="sangramento" name="sangramento" value="{{ old('sangramento') }}" required>
</div>
<div class="form-group">
    <label for="cicatrizacao">Cicatrização</label>
    <input type="text" class="form-control" id="cicatrizacao" name="cicatrizacao" value="{{ old('cicatrizacao') }}" required>
</div>
<div class="form-group">
    <label for="falta_ar">Falta de Ar</label>
    <input type="text" class="form-control" id="falta_ar" name="falta_ar" value="{{ old('falta_ar') }}" required>
</div>
<div class="form-group">
    <label for="gestante">Gestante</label>
    <select class="form-control" id="gestante" name="gestante" required onchange="toggleSemanas(this)">
        <option value="0" {{ old('gestante') == '0' ? 'selected' : '' }}>Não</option>
        <option value="1" {{ old('gestante') == '1' ? 'selected' : '' }}>Sim</option>
    </select>
</div>
<div class="form-group" id="semanas-group" style="display: {{ old('gestante') == '1' ? 'block' : 'none' }}">
    <label for="semanas">Semanas</label>
    <input type="text" class="form-control" id="semanas" name="semanas" value="{{ old('semanas', 0) }}" {{ old('gestante') == '1' ? 'required' : '' }}>
</div>

<script>
    function toggleSemanas(select) {
        var semanasGroup = document.getElementById('semanas-group');
        var semanasInput = document.getElementById('semanas');
        if (select.value == '1') {
            semanasGroup.style.display = 'block';
            semanasInput.required = true;
        } else {
            semanasGroup.style.display = 'none';
            semanasInput.required = false;
            semanasInput.value = 0;
        }
    }
</script>
<div class="form-group">
    <label for="observacoes">Observações</label>
    <textarea class="form-control" id="observacoes" name="observacoes" required>{{ old('observacoes') }}</textarea>
</div>