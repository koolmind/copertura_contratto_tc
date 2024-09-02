<fieldset id="fields-indirizzo-attivazione">
	<legend>2. Indirizzo di attivazione e fornitura dei servizi <small>(se diverso da quello della sede)</small></legend>

	<div class="form-group col-md-9">
		<label for="indirizzo_attivazione">Indirizzo (via/piazza)</label>
		<input type="text" name="dati[indirizzo_attivazione]" id="indirizzo_attivazione" class="form-control" placeholder="via/piazza" value="<?php echo ( @$fields['indirizzo_attivazione'] ) ? $fields['indirizzo_attivazione'] : ''; ?>" >
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-3">
		<label for="numero_civico_attivazione">Numero civico</label>
		<input type="text" name="dati[numero_civico_attivazione]" id="numero_civico_attivazione" class="form-control" placeholder="n. civico" value="<?php echo ( @$fields['numero_civico_attivazione'] ) ? $fields['numero_civico_attivazione'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="citta_attivazione">Città</label>
		<input type="text" name="dati[citta_attivazione]" id="citta_attivazione" class="form-control" placeholder="città" value="<?php echo ( @$fields['citta_attivazione'] ) ? $fields['citta_attivazione'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="provincia_attivazione">Provincia</label>
		<input type="text" name="dati[provincia_attivazione]" id="provincia_attivazione" class="form-control" placeholder="provincia" value="<?php echo ( @$fields['provincia_attivazione'] ) ? $fields['provincia_attivazione'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="cap_attivazione">CAP</label>
		<input type="text" name="dati[cap_attivazione]" id="cap_attivazione" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields['cap_attivazione'] ) ? $fields['cap_attivazione'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
</fieldset>