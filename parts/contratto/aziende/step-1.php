<?php 
$fields = @$this->contrattoData['anagrafica']; 

showSteps(1);

?>

<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
	<input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
	<input type="hidden" id="section" name="section" value="anagrafica">
	<input type="hidden" id="tipocli" name="tipocli" value="aziende">
	
	<fieldset id="fields-anagrafica-azienda" class="mb-5 mt-3">
		<legend>1. Dati anagrafici e sede legale dell'azienda</legend>	
		
		<div class="row">
			<div class="col mb-4">
				<label for="rag_sociale">Denominazione / Ragione sociale o Cognome</label>
				<input type="text" name="dati[rag_sociale]" id="rag_sociale" class="form-control tc-required" placeholder="ragione sociale" value="<?php tcGetFieldValue($fields,'rag_sociale'); ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="tc-input col-12 col-md-8 mb-4">
				<label for="azienda_indirizzo">Sede (via/piazza)</label>
				<input type="text" name="dati[azienda_indirizzo]" id="azienda_indirizzo" class="form-control tc-required" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'azienda_indirizzo'); ?>">
			</div>
		
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="azienda_civico">Numero civico</label>
				<input type="text" name="dati[azienda_civico]" id="azienda_civico" class="form-control tc-required" placeholder="n. civico" value="<?php tcGetFieldValue($fields,'azienda_civico'); ?>">
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="azienda_citta">Città</label>
				<input type="text" name="dati[azienda_citta]" id="azienda_citta" class="form-control tc-required" placeholder="città" value="<?php tcGetFieldValue($fields,'azienda_citta'); ?>">
			</div>
		
			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="azienda_provincia">Provincia</label>
				<input type="text" name="dati[azienda_provincia]" id="azienda_provincia" class="form-control tc-required" placeholder="provincia" value="<?php tcGetFieldValue($fields,'azienda_provincia'); ?>" maxlength="2">
			</div>
		
			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="azienda_cap">CAP</label>
				<input type="text" name="dati[azienda_cap]" id="azienda_cap" class="form-control tc-required" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'azienda_cap'); ?>">
			</div>
		</div>


		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="azienda_piva_cf">Partita IVA/ Codice Fiscale</label>
				<input type="text" name="dati[azienda_piva_cf]" id="azienda_piva_cf" class="form-control tc-required" placeholder="p.iva o cod. fiscale" value="<?php tcGetFieldValue($fields,'azienda_piva_cf'); ?>">
			</div>

			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="azienda_cod_destinatario">Cod. Destinatario</label>
				<input type="text" name="dati[azienda_cod_destinatario]" id="azienda_cod_destinatario" class="form-control tc-required" placeholder="cod. destinatario" value="<?php tcGetFieldValue($fields,'azienda_cod_destinatario'); ?>">
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="cliente_email">Email</label>
				<input type="email" name="dati[cliente_email]" id="cliente_email" class="form-control tc-required" placeholder="email" value="<?php tcGetFieldValue($fields,'cliente_email'); ?>">
			</div>

			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="cliente_telefono">Telefono</label>
				<input type="text" name="dati[cliente_telefono]" id="cliente_telefono" class="form-control" placeholder="telefono" value="<?php tcGetFieldValue($fields,'cliente_telefono'); ?>">
			</div>

		</div>
		
		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="azienda_fax">Fax</label>
				<input type="text" name="dati[azienda_fax]" id="azienda_fax" class="form-control" placeholder="fax" value="<?php tcGetFieldValue($fields,'azienda_fax'); ?>">
			</div>
		
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="cliente_cellulare">Cellulare</label>
				<input type="text" name="dati[cliente_cellulare]" id="cliente_cellulare" class="form-control tc-required" placeholder="cellulare" value="<?php tcGetFieldValue($fields,'cliente_cellulare'); ?>">
			</div>
		</div>		

		<div class="row">
			<div class="tc-input col-12 mb-4">
				<label for="cliente_pec">PEC</label>
				<input type="text" name="dati[cliente_pec]" id="cliente_pec" class="form-control tc-required" placeholder="indirizzo pec" value="<?php tcGetFieldValue($fields,'cliente_pec'); ?>">
			</div>  
		</div>
	</fieldset>


	<fieldset id="fields-anagrafica-cliente" class="mt-3">
		<legend>1.a Dati personali</legend>	

		<div class="row">
			<div class="tc-input col-12 col-md-6">
				<label for="cliente_ruolo">Ruolo richiedente</label>
				<select class="form-select tc-required" name="dati[cliente_ruolo]" id="cliente_ruolo">
					<option value="">- seleziona ruolo -</option>
					<?php
					$ruoli = ['titolare','legale rappresentante','delegato'];
					$sel =  tcGetFieldValue($fields, 'cliente_ruolo',false);
					foreach($ruoli as $ruolo) {
						$isSelected = $ruolo == $sel ? " selected='selected' " : "";
						printf('<option value="%s" %s>%s</option>', $ruolo, $isSelected,$ruolo);
					}
					?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_cognome">Cognome</label>
				<input type="text" name="dati[cliente_cognome]" id="cliente_cognome" class="form-control tc-required" placeholder="cognome" value="<?php tcGetFieldValue($fields,'cliente_cognome'); ?>">
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_nome">Nome</label>
				<input type="text" name="dati[cliente_nome]" id="cliente_nome" class="form-control tc-required" placeholder="nome" value="<?php tcGetFieldValue($fields,'cliente_nome'); ?>">
				
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_sesso">Sesso</label>
				<select class="form-select  tc-required" name="dati[cliente_sesso]" id="cliente_sesso">
					<option value="">- seleziona sesso -</option>
					<?php
					$sesso = ["1"=>"Femmina","2"=>"Maschio"];
					$sel =  tcGetFieldValue($fields, 'cliente_sesso',false);

					foreach($sesso as $sex=>$sexLabel) {
						$isSelected = $sex == $sel ? " selected='selected' " : "";
						printf('<option value="%s" %s>%s</option>', $sex, $isSelected, $sexLabel);
					}
					?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_data_nascita">Data di nascita</label>
				<input type="text" name="dati[cliente_data_nascita]" id="cliente_data_nascita" class="form-control tc-required" value="<?php tcGetFieldValue($fields,'cliente_data_nascita'); ?>" data-calendario>
				
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_luogo_nascita">Luogo di nascita</label>
				<input type="text" name="dati[cliente_luogo_nascita]" id="cliente_luogo_nascita" class="form-control tc-required" placeholder="luogo di nascita" value="<?php tcGetFieldValue($fields,'cliente_luogo_nascita'); ?>">
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_provincia_nascita">Provincia</label>
				<input type="text" name="dati[cliente_provincia_nascita]" id="cliente_provincia_nascita" class="form-control tc-required" placeholder="provincia" value="<?php tcGetFieldValue($fields,'cliente_provincia_nascita'); ?>" maxlength="2">
			</div>
		</div>
			

		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="cliente_cod_fiscale">Codice Fiscale</label>
				<input type="text" name="dati[cliente_cod_fiscale]" id="cliente_cod_fiscale" class="form-control tc-required" placeholder="codice fiscale" value="<?php tcGetFieldValue($fields,'cliente_cod_fiscale'); ?>">
			</div>

			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="cliente_nazionalita">Nazionalità</label>
				<input type="text" name="dati[cliente_nazionalita]" id="cliente_nazionalita" class="form-control tc-required" placeholder="nazionalità" value="<?php tcGetFieldValue($fields,'cliente_nazionalita'); ?>">
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="cliente_tipo_documento">Tipo documento</label>
				<select name="dati[cliente_tipo_documento]" id="cliente_tipo_documento" class="form-select  tc-required">
					<option value="">-- seleziona documento -</option>
					<?php
					$docs = array( "1"=>"Carta di identità", "2" => "Patente di guida","4"=>"Passaporto", "5"=>"Permesso di soggiorno" );
					$sel =  tcGetFieldValue($fields, 'cliente_tipo_documento',false);

					foreach($docs as $value=>$label) {
						$isSelected = $value == $sel ? " selected='selected' " : "";
						printf('<option value="%s" %s>%s</option>', $value, $isSelected, $label);
					}
					?>
				</select>
			</div>

			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="cliente_doc_numero">Numero documento</label>
				<input type="text" name="dati[cliente_doc_numero]" id="cliente_doc_numero" class="form-control tc-required" placeholder="numero del cocumento" value="<?php tcGetFieldValue($fields,'cliente_doc_numero'); ?>">
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_doc_emittente">Rilasciato da</label>
				<input type="text" name="dati[cliente_doc_emittente]" id="cliente_doc_emittente" class="form-control tc-required" placeholder="rilasciato da" value="<?php tcGetFieldValue($fields,'cliente_doc_emittente'); ?>">
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_doc_rilascio">Data rilascio</label>
				<input type="text" name="dati[cliente_doc_rilascio]" id="cliente_doc_rilascio" class="form-control tc-required" placeholder="rilasciato il" value="<?php tcGetFieldValue($fields,'cliente_doc_rilascio'); ?>" data-calendario>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_doc_scadenza">Data di scadenza</label>
				<input type="text" name="dati[cliente_doc_scadenza]" id="cliente_doc_scadenza" class="form-control tc-required" placeholder="data di scadenza" value="<?php tcGetFieldValue($fields,'cliente_doc_scadenza'); ?>" data-calendario>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-8 mb-4">
				<label for="cliente_indirizzo">Residenza (o domicilio italiano), via</label>
				<input type="text" name="dati[cliente_indirizzo]" id="cliente_indirizzo" class="form-control tc-required" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'cliente_indirizzo'); ?>">
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_civico">Numero civico</label>
				<input type="text" name="dati[cliente_civico]" id="cliente_civico" class="form-control tc-required" placeholder="n. civico" value="<?php tcGetFieldValue($fields,'cliente_civico'); ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="cliente_citta">Città</label>
				<input type="text" name="dati[cliente_citta]" id="cliente_citta" class="form-control tc-required" placeholder="città" value="<?php tcGetFieldValue($fields,'cliente_citta'); ?>">
			</div>

			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="cliente_provincia">Provincia</label>
				<input type="text" name="dati[cliente_provincia]" id="cliente_provincia" class="form-control tc-required" placeholder="provincia" value="<?php tcGetFieldValue($fields,'cliente_provincia'); ?>" maxlength="2">
			</div>

			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="cliente_cap">CAP</label>
				<input type="text" name="dati[cliente_cap]" id="cliente_cap" class="form-control tc-required" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'cliente_cap'); ?>">
			</div>
		</div>
		
	</fieldset>

	<div class="contratto_nav_buttons d-flex justify-content-end align-items-center gap-3 mt-4">
		<div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard" disabled>Avanti <i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>