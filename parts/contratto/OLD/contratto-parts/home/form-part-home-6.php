<fieldset id="fields-tipologia-mantenimento-linee">
	<legend>6. Tipologia linea e Mantenimento del numero (Number Portability)</legend>
	
	<p>&nbsp;</p>
	<h4>Da compilare solo da parte dei titolari di linee telefoniche attualmente attive.</h4>

	<div class="col-md-4">
		<?php $sel = ( @$fields['tipolinea_tipologia'] ) ? $fields['tipolinea_tipologia'] : ''; ?>
		<div class="radio">
			<input type="radio" name="dati[tipolinea_tipologia]" id="tipolinea_tipologia_tel_internet" value="internet_telefono" <?php if($sel=='internet_telefono' || $sel =='') { echo "checked='checked'"; } ?> ><label class="control-label"><strong>Linea telefonica + internet</strong></label>
		</div>
		<div class="radio">
			<input type="radio" name="dati[tipolinea_tipologia]" id="tipolinea_tipologia_tel" value="solo_telefono" <?php if($sel=='solo_telefono'){ echo "checked='checked'"; } ?> ><label class="control-label"><strong>Solo linea telefonica</strong></label>
		</div>
	</div>

	<div class="col-md-3">	
		<?php $mantieni = ( @$fields['tipolinea_mantieni_tel'] ) ? $fields['tipolinea_mantieni_tel'] : 'si'; ?>
		<label>Mantenere l'attuale numero telefonico? <sup>1</sup></label>
		<div class="radio">
			<input type="radio" name="dati[tipolinea_mantieni_tel]" id="tipolinea_mantieni_tel-si" value="si" <?php if($mantieni=='si'){ echo "checked='checked'"; } ?> ><label class="control-label"><strong>SI</strong></label>
		
			<input type="radio" name="dati[tipolinea_mantieni_tel]" id="tipolinea_mantieni_tel-no" value="no" <?php if($mantieni=='no'){ echo "checked='checked'"; } ?> ><label class="control-label"><strong>NO</strong></label>		
		</div>
	</div>

	<div class="col-md-5">
		<div class="form-group">
			<label for="tipolinea_tel1">Numero telefonico</label>
			<input type="text" name="dati[tipolinea_tel1]" id="tipolinea_tel1" class="form-control" value="<?php echo ( @$fields['tipolinea_tel1'] ) ? $fields['tipolinea_tel1'] : ''; ?>" />
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			<label for="tipolinea_operatore_tel">Operatore telefonico attuale</label>
			<input type="text" name="dati[tipolinea_operatore_tel]" id="tipolinea_operatore_tel" class="form-control" value="<?php echo ( @$fields['tipolinea_operatore_tel'] ) ? $fields['tipolinea_operatore_tel'] : ''; ?>" />
		</div>
	</div>

	<div class="col-md-8">
		<div class="form-group">
			<label for="tipolinea_codmig1">Codice migrazione + carattere di controllo <sup>2</sup></label>
			<input type="text" name="dati[tipolinea_codice_migrazione1]" id="tipolinea_codmig1" class="form-control" value="<?php echo ( @$fields['tipolinea_codice_migrazione1'] ) ? $fields['tipolinea_codice_migrazione1'] : ''; ?>" />
		</div>
		<div class="form-group">
			<label for="tipolinea_codmig2">Codice migrazione + carattere di controllo <sup>2</sup></label>
			<input type="text" name="dati[tipolinea_codice_migrazione2]" id="tipolinea_codmig2" class="form-control" value="<?php echo ( @$fields['tipolinea_codice_migrazione2'] ) ? $fields['tipolinea_codice_migrazione2'] : ''; ?>" />
		</div>
	</div>
	


	<div class="col-md-12">
		<div class="radio">
			<input type="radio" name="dati[tipolinea_tipologia]" id="tipolinea_tipologia_internet" value="solo_internet" <?php if($sel=='solo_internet'){ echo "checked='checked'"; } ?> ><label class="control-label"><strong>Solo internet</strong></label>
		</div>
	</div>

	<div class="col-md-6">
		<div class="form-group">
			<label for="tipolinea_numero_identificazione">Numero di indentificazione <sup>2</sup></label>
			<input type="text" name="dati[tipolinea_numero_identificazione]" id="tipolinea_numero_identificazione" class="form-control" value="<?php echo ( @$fields['tipolinea_numero_identificazione'] ) ? $fields['tipolinea_numero_identificazione'] : ''; ?>" />
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="tipolinea_codmig3">Codice migrazione + carattere di controllo (solo internet)</label>
			<input type="text" name="dati[tipolinea_codice_migrazione3]" id="tipolinea_codmig3" class="form-control" value="<?php echo ( @$fields['tipolinea_codice_migrazione3'] ) ? $fields['tipolinea_codice_migrazione3'] : ''; ?>" />
		</div>
	</div>


	<p>&nbsp;</p>
	<h4>DATI ESATTI INTESTATARIO E UBICAZIONE ATTUALE LINEA TELEFONICA (riprendere dati dall’attuale bolletta ed allegarne possibilmente copia)</h4>

	<div class="form-group col-md-6">
		<label for="tipolinea_cognome_intestatario">Cognome</label>
		<input type="text" name="dati[tipolinea_cognome_intestatario]" id="tipolinea_cognome_intestatario" class="form-control" placeholder="cognome" value="<?php echo ( @$fields['tipolinea_cognome_intestatario'] ) ? $fields['tipolinea_cognome_intestatario'] : ''; ?>" >
	</div>

	<div class="form-group col-md-6">
		<label for="tipolinea_nome_intestatario">Nome</label>
		<input type="text" name="dati[tipolinea_nome_intestatario]" id="tipolinea_nome_intestatario" class="form-control" placeholder="nome" value="<?php echo ( @$fields['tipolinea_nome_intestatario'] ) ? $fields['tipolinea_nome_intestatario'] : ''; ?>" >
	</div>

	<div class="form-group col-md-9">
		<label for="tipolinea_indirizzo_intestatario">Indirizzo intestatario</label>
		<input type="text" name="dati[tipolinea_indirizzo_intestatario]" id="tipolinea_indirizzo_intestatario" class="form-control" placeholder="indirizzo" value="<?php echo ( @$fields['tipolinea_indirizzo_intestatario'] ) ? $fields['tipolinea_indirizzo_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-3">
		<label for="tipolinea_civico_intestatario">Numero civico</label>
		<input type="text" name="dati[tipolinea_civico_intestatario]" id="tipolinea_civico_intestatario" class="form-control" placeholder="n. civico" value="<?php echo ( @$fields['tipolinea_civico_intestatario'] ) ? $fields['tipolinea_civico_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_citta_intestatario">Città</label>
		<input type="text" name="dati[tipolinea_citta_intestatario]" id="tipolinea_citta_intestatario" class="form-control" placeholder="città" value="<?php echo ( @$fields['tipolinea_citta_intestatario'] ) ? $fields['tipolinea_citta_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_provincia_intestatario">Provincia</label>
		<input type="text" name="dati[tipolinea_provincia_intestatario]" id="tipolinea_provincia_intestatario" class="form-control" placeholder="provincia" value="<?php echo ( @$fields['tipolinea_provincia_intestatario'] ) ? $fields['tipolinea_provincia_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_cap_intestatario">CAP</label>
		<input type="text" name="dati[tipolinea_cap_intestatario]" id="tipolinea_cap_intestatario" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields['tipolinea_cap_intestatario'] ) ? $fields['tipolinea_cap_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-9">
		<label for="tipolinea_indirizzo_linea">Indirizzo ubicazione linea (se diverso da quello sopra indicato)</label>
		<input type="text" name="dati[tipolinea_indirizzo_linea]" id="tipolinea_indirizzo_linea" class="form-control" placeholder="indirizzo" value="<?php echo ( @$fields['tipolinea_indirizzo_linea'] ) ? $fields['tipolinea_indirizzo_linea'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-3">
		<label for="tipolinea_civico_linea">Numero civico</label>
		<input type="text" name="dati[tipolinea_civico_linea]" id="tipolinea_civico_linea" class="form-control" placeholder="n. civico" value="<?php echo ( @$fields['tipolinea_civico_linea'] ) ? $fields['tipolinea_civico_linea'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_citta_linea">Città</label>
		<input type="text" name="dati[tipolinea_citta_linea]" id="tipolinea_citta_linea" class="form-control" placeholder="città" value="<?php echo ( @$fields['tipolinea_citta_linea'] ) ? $fields['tipolinea_citta_linea'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_provincia_linea">Provincia</label>
		<input type="text" name="dati[tipolinea_provincia_linea]" id="tipolinea_provincia_linea" class="form-control" placeholder="provincia" value="<?php echo ( @$fields['tipolinea_provincia_linea'] ) ? $fields['tipolinea_provincia_linea'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_cap_linea">CAP</label>
		<input type="text" name="dati[tipolinea_cap_linea]" id="tipolinea_cap_linea" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields['tipolinea_cap_linea'] ) ? $fields['tipolinea_cap_linea'] : ''; ?>" >
	</div>
	
	
	
	<div class="col-md-12">
		<span class="help-block">(1) <strong>Campo obbligatorio:</strong> il cliente deve dare precisa indicazione della volontà di mantenere il proprio numero di telefono sia barrando la casella sopra indicata sia frmando il punto b) della sezione 7. Qualora venga omessa una delle due indicazioni Terrecablate NON
effettuerà la portabilità del numero telefonico che quindi verrà sostituito con un numero nuovo.</span>
		<span class="help-block">(2) <strong>Codice di migrazione.</strong> Qualora non fosse presente in fattura va richiesto al proprio operatore assieme al carattere di controllo. Il carattere di controllo è composto da una sola lettera, va inserito come
ultimo carattere.</span>
	</div>
	

</fieldset>