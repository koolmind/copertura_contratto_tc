<?php //echo ( @$fields ) ? $fields['cap_azienda'] : ''; ?>
<fieldset id="fields-anagrafica">
	<legend>1. Dati anagrafici e sede legale dell'azienda</legend>
	
	
	<div class="form-group col-md-6">
		<label for="rag_sociale">Denominazione / Ragione sociale</label>
		<input type="text" name="dati[rag_sociale]" id="rag_sociale" class="form-control tc-required" placeholder="ragione sociale" value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-9">
		<label for="azienda_indirizzo">Sede (via/piazza)</label>
		<input type="text" name="dati[azienda_indirizzo]" id="azienda_indirizzo" class="form-control tc-required" placeholder="via/piazza" value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-3">
		<label for="azienda_civico">Numero civico</label>
		<input type="text" name="dati[azienda_civico]" id="azienda_civico" class="form-control tc-required" placeholder="n. civico" value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="azienda_citta">Città</label>
		<input type="text" name="dati[azienda_citta]" id="azienda_citta" class="form-control tc-required" placeholder="città" value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="azienda_provincia">Provincia</label>
		<input type="text" name="dati[azienda_provincia]" id="azienda_provincia" class="form-control tc-required" placeholder="provincia" value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="azienda_cap">CAP</label>
		<input type="text" name="dati[azienda_cap]" id="azienda_cap" class="form-control tc-required" placeholder="c.a.p." value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-12">
		<label for="azienda_piva_cf">Partita IVA/ Codice Fiscale</label>
		<input type="text" name="dati[azienda_piva_cf]" id="azienda_piva_cf" class="form-control tc-required" placeholder="p.iva o cod. fiscale" value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-4">
		<label for="cliente_email">Email</label>
		<input type="text" name="dati[cliente_email]" id="cliente_email" class="form-control tc-required" placeholder="cellulare" value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-4">
		<label for="cliente_telefono">Telefono</label>
		<input type="text" name="dati[cliente_telefono]" id="cliente_telefono" class="form-control" placeholder="telefono" value="">
	</div>

	<div class="form-group col-md-4">
		<label for="cliente_fax">Fax</label>
		<input type="text" name="dati[cliente_fax]" id="cliente_fax" class="form-control" placeholder="telefono" value="">
	</div>
	
	<div class="form-group col-md-4">
		<label for="cliente_cell">Cellulare</label>
		<input type="text" name="dati[cliente_cell]" id="cliente_cell" class="form-control tc-required" placeholder="cellulare" value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-4">
		<label for="cod_destinatario">Cod. Destinatario</label>
		<input type="text" name="dati[cod_destinatario]" id="cod_destinatario" class="form-control tc-required" placeholder="cellulare" value="">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	

	<div class="form-group" id="radios-ruolo-cliente">
		<?php //$sel =  (@$fields['ruolo_cliente'] ) ? $fields['ruolo_cliente'] : ''; ?>
		
		<select name="dati[ruolo_cliente]" id="ruolo_cliente">
			<?php
			$ruoli = ['titolare','legale rappresentante','delegato'];
			foreach($ruoli as $ruolo) {
				printf('<option value="%1$s">%1$s</option>', $ruolo);
			}
			?>
		</select>
		<small class="text-danger form-message" style="clear:both;">Campo richiesto. Selezionare un'opzione.</small>
	</div>


<!--
	<div class="form-group col-md-4">
		<label for="cognome_azienda">Cognome</label>
		<input type="text" name="dati[cognome_cliente]" id="cognome_cliente" class="form-control tc-required" placeholder="cognome" value="<?php echo ( @$fields ) ? $fields['cognome_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="nome_cliente">Nome</label>
		<input type="text" name="dati[nome_cliente]" id="nome_cliente" class="form-control tc-required" placeholder="nome" value="<?php echo ( @$fields ) ? $fields['nome_cliente'] : ''; ?>"> 
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-4" id="radios-sesso-cliente">
		<?php $sel =  (@$fields['sesso_cliente'] ) ? $fields['sesso_cliente'] : ''; ?>
		<label for="cognome_azienda">Sesso</label>
		<div class="radio">
			<input type="radio" name="dati[sesso_cliente]" id="sesso_cliente_M" <?php if($sel =='M') {echo "checked='checked'";} ?> class="tc-required" value="M"><label class="control-label">M</label>
			<input type="radio" name="dati[sesso_cliente]" id="sesso_cliente_F" <?php if($sel =='F') {echo "checked='checked'";} ?> class="tc-required" value="F"><label class="control-label">F</strong></label>
		</div>	

		<small class="text-danger form-message" style="clear:both;">Campo richiesto. Selezionare un'opzione.</small>
	</div>

	
	<div class="form-group col-md-4">
		<label for="data_nascita_cliente">Data di nascita</label>
		<input type="text" name="dati[data_nascita_cliente]" id="data_nascita_cliente" class="form-control tc-required" value="<?php echo ( @$fields ) ? $fields['data_nascita_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-5">
		<label for="luogo_nascita_cliente">Luogo di nascita</label>
		<input type="text" name="dati[luogo_nascita_cliente]" id="luogo_nascita_cliente" class="form-control tc-required" placeholder="luogo di nascita" value="<?php echo ( @$fields ) ? $fields['luogo_nascita_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-3">
		<label for="provincia_nascita_cliente">Provincia</label>
		<input type="text" name="dati[provincia_nascita_cliente]" id="provincia_nascita_cliente" class="form-control tc-required" placeholder="pronvincia" value="<?php echo ( @$fields ) ? $fields['provincia_nascita_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>	

	<div class="form-group col-md-6">
		<label for="codice_fiscale_cliente">Codice Fiscale</label>
		<input type="text" name="dati[codice_fiscale_cliente]" id="codice_fiscale_cliente" class="form-control tc-required" placeholder="codice fiscale o p.iva" value="<?php echo ( @$fields ) ? $fields['codice_fiscale_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-6">
		<label for="nazionalita_cliente">Nazionalità</label>
		<input type="text" name="dati[nazionalita_cliente]" id="nazionalita_cliente" class="form-control tc-required" placeholder="nazionalità" value="<?php echo ( @$fields ) ? $fields['nazionalita_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-6">
		<label for="tipo_documento_cliente">Tipo documento <sup>2</sup></label>
		<select type="text" name="dati[tipo_documento_cliente]" id="tipo_documento_cliente" class="form-control tc-required" >
			<?php $sel = ( @$fields ) ? $fields['tipo_documento_cliente'] : ''; ?>"
			<option value="">-- seleziona documento -</option>
			<option value="carta_id" <?php if($sel=='carta_id') { echo " selected='selected' ";} ?> >Carta di indentità</option>
			<option value="patente" <?php if($sel=='patente') { echo " selected='selected' ";} ?> >Patente di guida</option>
			<option value="passaporto" <?php if($sel=='passaporto') { echo " selected='selected' ";} ?> >Passaporto</option>
		</select>
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-6">
		<label for="numero_documento_cliente">Numero documento</label>
		<input type="text" name="dati[numero_documento_cliente]" id="numero_documento_cliente" class="form-control tc-required" placeholder="numero del cocumento" value="<?php echo ( @$fields ) ? $fields['numero_documento_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="rilasciato_documento_cliente">Rilasciato da</label>
		<input type="text" name="dati[rilasciato_documento_cliente]" id="rilasciato_documento_cliente" class="form-control tc-required" placeholder="rilasciato da" value="<?php echo ( @$fields ) ? $fields['rilasciato_documento_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="data_documento_cliente">Data rilascio</label>
		<input type="text" name="dati[data_documento_cliente]" id="data_documento_cliente" class="form-control tc-required" placeholder="rilasciato il" value="<?php echo ( @$fields ) ? $fields['data_documento_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="scadenza_documento_cliente">Data di scadenza</label>
		<input type="text" name="dati[scadenza_documento_cliente]" id="scadenza_documento_cliente" class="form-control tc-required" placeholder="data di scadenza" value="<?php echo ( @$fields ) ? $fields['scadenza_documento_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-9">
		<label for="indirizzo_cliente">Residenza (o domicilio italiano), via</label>
		<input type="text" name="dati[indirizzo_cliente]" id="indirizzo_cliente" class="form-control tc-required" placeholder="via/piazza" value="<?php echo ( @$fields ) ? $fields['indirizzo_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-3">
		<label for="numero_civico_cliente">Numero civico</label>
		<input type="text" name="dati[numero_civico_cliente]" id="numero_civico_cliente" class="form-control tc-required" placeholder="n. civico" value="<?php echo ( @$fields ) ? $fields['numero_civico_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="citta_cliente">Città</label>
		<input type="text" name="dati[citta_cliente]" id="citta_cliente" class="form-control tc-required" placeholder="città" value="<?php echo ( @$fields ) ? $fields['citta_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="provincia_cliente">Provincia</label>
		<input type="text" name="dati[provincia_cliente]" id="provincia_cliente" class="form-control tc-required" placeholder="provincia" value="<?php echo ( @$fields ) ? $fields['provincia_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="cap_cliente">CAP</label>
		<input type="text" name="dati[cap_cliente]" id="cap_cliente" class="form-control tc-required" placeholder="c.a.p." value="<?php echo ( @$fields ) ? $fields['cap_cliente'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	

	<div class="col-md-12">
		<span class="help-block">(1) campo opzionale</span>
		<span class="help-block">(2) allegare fotocopia del documento indicato.</span>
	</div>-->
</fieldset>