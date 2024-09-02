<h4>INDIRIZZO INVIO MODEM </h4>
<p>Nel caso in cui il cliente ometta l'indicazione, l'apparato verrà inviato presso l'indirizzo di attivazione</p>
					
<div class="form-group col-md-12">
	<label for="presso_dispositivo">Presso</label>
	<input type="text" name="dati[presso_dispositivo]" id="presso_dispositivo" class="form-control" placeholder="presso" value="<?php echo ( @$fields['presso_dispositivo'] ) ? $fields['presso_dispositivo'] : ''; ?>" >
</div>

<div class="form-group col-md-9">
	<label for="indirizzo_dispositivo">Indirizzo (via/piazza)</label>
	<input type="text" name="dati[indirizzo_dispositivo]" id="indirizzo_dispositivo" class="form-control" placeholder="via/piazza" value="<?php echo ( @$fields['indirizzo_dispositivo'] ) ? $fields['indirizzo_dispositivo'] : ''; ?>" >
</div>

<div class="form-group col-md-3">
	<label for="numero_civico_dispositivo">Numero civico</label>
	<input type="text" name="dati[numero_civico_dispositivo]" id="numero_civico_dispositivo" class="form-control" placeholder="n. civico"  value="<?php echo ( @$fields['numero_civico_dispositivo'] ) ? $fields['numero_civico_dispositivo'] : ''; ?>" >
</div>

<div class="form-group col-md-4">
	<label for="citta_dispositivo">Città</label>
	<input type="text" name="dati[citta_dispositivo]" id="citta_dispositivo" class="form-control" placeholder="città"  value="<?php echo ( @$fields['citta_dispositivo'] ) ? $fields['citta_dispositivo'] : ''; ?>" >
</div>

<div class="form-group col-md-4">
	<label for="provincia_dispositivo">Provincia</label>
	<input type="text" name="dati[provincia_dispositivo]" id="provincia_dispositivo" class="form-control" placeholder="provincia" value="<?php echo ( @$fields['provincia_dispositivo'] ) ? $fields['provincia_dispositivo'] : ''; ?>" >
</div>

<div class="form-group col-md-4">
	<label for="cap_dispositivo">CAP</label>
	<input type="text" name="dati[cap_dispositivo]" id="cap_dispositivo" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields['cap_dispositivo'] ) ? $fields['cap_dispositivo'] : ''; ?>" >
</div>