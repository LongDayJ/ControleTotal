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
    <input type="text" class="form-control" id="gestante" name="gestante" value="{{ old('gestante') }}" required>
</div>
<div class="form-group">
    <label for="semanas">Semanas</label>
    <input type="text" class="form-control" id="semanas" name="semanas" value="{{ old('semanas') }}" required>
</div>
<div class="form-group">
    <label for="observacoes">Observações</label>
    <textarea class="form-control" id="observacoes" name="observacoes" required>{{ old('observacoes') }}</textarea>
</div>