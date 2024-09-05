<fieldset id="fields-servizi-migrazione-mantenimento">
	<legend>7. Servizi di migrazione e mantenimento del numero telefonico</legend>
	
	<div class="form-group col-md-6">
		<label for="migrazione_cognome_azienda">Denominazione/ Ragione sociale o Cognome</label>
		<input type="text" name="dati[migrazione_cognome_azienda]" id="migrazione_cognome_azienda" class="form-control" placeholder="ragione sociale o cognome" value="<?php echo ( @$fields ) ? $fields['migrazione_cognome_azienda'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-6">
		<label for="migrazione_nome_azienda">Nome</label>
		<input type="text" name="dati[migrazione_nome_azienda]" id="migrazione_nome_azienda" class="form-control" placeholder="nome" value="<?php echo ( @$fields ) ? $fields['migrazione_nome_azienda'] : ''; ?>"> 
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-9">
		<label for="migrazione_indirizzo_azienda">Sede (via/piazza)</label>
		<input type="text" name="dati[migrazione_indirizzo_azienda]" id="migrazione_indirizzo_azienda" class="form-control" placeholder="via/piazza" value="<?php echo ( @$fields ) ? $fields['migrazione_indirizzo_azienda'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-3">
		<label for="migrazione_numero_civico_azienda">Numero civico</label>
		<input type="text" name="dati[migrazione_numero_civico_azienda]" id="migrazione_numero_civico_azienda" class="form-control" placeholder="n. civico" value="<?php echo ( @$fields ) ? $fields['migrazione_numero_civico_azienda'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_citta_azienda">Città</label>
		<input type="text" name="dati[migrazione_citta_azienda]" id="migrazione_citta_azienda" class="form-control" placeholder="città" value="<?php echo ( @$fields ) ? $fields['migrazione_citta_azienda'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_provincia_azienda">Provincia</label>
		<input type="text" name="dati[migrazione_provincia_azienda]" id="migrazione_provincia_azienda" class="form-control" placeholder="provincia" value="<?php echo ( @$fields ) ? $fields['migrazione_provincia_azienda'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_cap_azienda">CAP</label>
		<input type="text" name="dati[migrazione_cap_azienda]" id="migrazione_cap_azienda" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields ) ? $fields['migrazione_cap_azienda'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-12">
		<label for="migrazione_codice_fiscale_azienda">Partita IVA/ Codice Fiscale</label>
		<input type="text" name="dati[migrazione_codice_fiscale_azienda]" id="migrazione_codice_fiscale_azienda" class="form-control" placeholder="codice fiscale o p.iva" value="<?php echo ( @$fields ) ? $fields['migrazione_codice_fiscale_azienda'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group">
		<?php $sel =  (@$fields['migrazione_ruolo_cliente'] ) ? $fields['migrazione_ruolo_cliente'] : ''; ?>
		<div class="radio col-md-4">
			<input type="radio" name="dati[migrazione_ruolo_cliente]" id="migrazione_ruolo_cliente_titolare" <?php if($sel =='titolare') {echo "checked='checked'";} ?> value="titolare"><label class="control-label">TITOLARE</label>
		</div>	

		<div class="radio col-md-4">
			<input type="radio" name="dati[migrazione_ruolo_cliente]" id="migrazione_ruolo_cliente_rappresentante" <?php if($sel =='legale rappresentante') {echo "checked='checked'";} ?>  value="legale rappresentante"><label class="control-label">LEGALE RAPPRESENTANTE</strong></label>
		</div>	

		<div class="radio col-md-4">
			<input type="radio" name="dati[migrazione_ruolo_cliente]" id="migrazione_ruolo_cliente_delegato" <?php if($sel =='delegato') {echo "checked='checked'";} ?> value="delegato"><label class="control-label">DELEGATO</label>
		</div>	
		
		<small class="text-danger form-message" style="clear:both;">Campo richiesto. Selezionare un'opzione.</small>
	</div>

	<!-- ********************************** -->

	<div class="form-group col-md-4">
		<label for="migrazione_cognome">Cognome</label>
		<input type="text" name="dati[migrazione_cognome]" id="migrazione_cognome" class="form-control" placeholder="cognome" value="<?php echo ( @$fields['migrazione_cognome'] ) ? $fields['migrazione_cognome'] : ''; ?>" >
	</div>

	<div class="form-group col-md-4">
		<label for="migrazione_nome">Nome</label>
		<input type="text" name="dati[migrazione_nome]" id="migrazione_nome" class="form-control" placeholder="nome" value="<?php echo ( @$fields['migrazione_nome'] ) ? $fields['migrazione_nome'] : ''; ?>" >
	</div>

	<div class="form-group col-md-4" id="radios-sesso-cliente-migr">
		<?php $sel =  (@$fields['migrazione_sesso'] ) ? $fields['migrazione_sesso'] : ''; ?>
		<label for="cognome_azienda">Sesso</label>
		<div class="radio">
			<input type="radio" name="dati[migrazione_sesso]" id="sesso_cliente_M" <?php if($sel =='M') {echo "checked='checked'";} ?> class="tc-required" value="M"><label class="control-label">M</label>
			<input type="radio" name="dati[migrazione_sesso]" id="sesso_cliente_F" <?php if($sel =='F') {echo "checked='checked'";} ?> class="tc-required" value="F"><label class="control-label">F</strong></label>
		</div>	

		<small class="text-danger form-message" style="clear:both;">Campo richiesto. Selezionare un'opzione.</small>
	</div>

	<div class="form-group col-md-4">
		<label for="migrazione_data_nascita">Data di nascita</label>
		<input type="text" name="dati[migrazione_data_nascita]" id="migrazione_data_nascita" class="form-control" value="<?php echo ( @$fields ) ? $fields['migrazione_data_nascita'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-5">
		<label for="migrazione_luogo_nascita">Luogo di nascita</label>
		<input type="text" name="dati[migrazione_luogo_nascita]" id="migrazione_luogo_nascita" class="form-control" placeholder="luogo di nascita" value="<?php echo ( @$fields ) ? $fields['migrazione_luogo_nascita'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-3">
		<label for="migrazione_provincia_nascita">Provincia</label>
		<input type="text" name="dati[migrazione_provincia_nascita]" id="migrazione_provincia_nascita" class="form-control" placeholder="pronvincia" value="<?php echo ( @$fields ) ? $fields['migrazione_provincia_nascita'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>	

	<div class="form-group col-md-6">
		<label for="migrazione_codice_fiscale">Codice Fiscale</label>
		<input type="text" name="dati[migrazione_codice_fiscale]" id="migrazione_codice_fiscale" class="form-control" placeholder="codice fiscale o p.iva" value="<?php echo ( @$fields ) ? $fields['migrazione_codice_fiscale'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-6">
		<label for="migrazione_nazionalita">Nazionalità</label>
		<input type="text" name="dati[migrazione_nazionalita]" id="migrazione_nazionalita" class="form-control" placeholder="nazionalità" value="<?php echo ( @$fields ) ? $fields['migrazione_nazionalita'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-6">
		<label for="migrazione_tipo_documento">Tipo documento <sup>1</sup></label>
		<select type="text" name="dati[migrazione_tipo_documento]" id="migrazione_tipo_documento" class="form-control" >
			<?php $sel = ( @$fields ) ? $fields['migrazione_tipo_documento'] : ''; ?>"
			<option value="">-- seleziona documento -</option>
			<option value="carta_id" <?php if($sel=='carta_id') { echo " selected='selected' ";} ?> >Carta di indentità</option>
			<option value="patente" <?php if($sel=='patente') { echo " selected='selected' ";} ?> >Patente di guida</option>
			<option value="passaporto" <?php if($sel=='passaporto') { echo " selected='selected' ";} ?> >Passaporto</option>
		</select>
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-6">
		<label for="migrazione_documento">Numero documento</label>
		<input type="text" name="dati[migrazione_numero_documento]" id="migrazione_numero_documento" class="form-control" placeholder="numero del documento" value="<?php echo ( @$fields['migrazione_numero_documento'] ) ? $fields['migrazione_numero_documento'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_rilasciato_documento">Rilasciato da</label>
		<input type="text" name="dati[migrazione_rilasciato_documento]" id="migrazione_rilasciato_documento" class="form-control" placeholder="rilasciato da" value="<?php echo ( @$fields['migrazione_rilasciato_documento'] ) ? $fields['migrazione_rilasciato_documento'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_data_documento">Data rilascio</label>
		<input type="text" name="dati[migrazione_data_documento]" id="migrazione_data_documento" class="form-control" placeholder="rilasciato il" value="<?php echo ( @$fields['migrazione_data_documento'] ) ? $fields['migrazione_data_documento'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_scadenza_documento">Data di scadenza</label>
		<input type="text" name="dati[migrazione_scadenza_documento]" id="migrazione_scadenza_documento" class="form-control" placeholder="data di scadenza" value="<?php echo ( @$fields['migrazione_scadenza_documento'] ) ? $fields['migrazione_scadenza_documento'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="form-group col-md-9">
		<label for="migrazione_indirizzo">Residenza (o domicilio italiano)</label>
		<input type="text" name="dati[migrazione_indirizzo]" id="migrazione_indirizzo" class="form-control" placeholder="via/piazza" value="<?php echo ( @$fields['migrazione_indirizzo'] ) ? $fields['migrazione_indirizzo'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-3">
		<label for="migrazione_numero_civico">Numero civico</label>
		<input type="text" name="dati[migrazione_numero_civico]" id="migrazione_numero_civico" class="form-control" placeholder="n. civico" value="<?php echo ( @$fields['migrazione_numero_civico'] ) ? $fields['migrazione_numero_civico'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_citta">Città</label>
		<input type="text" name="dati[migrazione_citta]" id="migrazione_citta" class="form-control" placeholder="città" value="<?php echo ( @$fields['migrazione_citta'] ) ? $fields['migrazione_citta'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_provincia">Provincia</label>
		<input type="text" name="dati[migrazione_provincia]" id="migrazione_provincia" class="form-control" placeholder="provincia" value="<?php echo ( @$fields['migrazione_provincia'] ) ? $fields['migrazione_provincia'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_cap">CAP</label>
		<input type="text" name="dati[migrazione_cap]" id="migrazione_cap" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields['migrazione_cap'] ) ? $fields['migrazione_cap'] : ''; ?>">
		<small class="text-danger form-message">Campo richiesto</small>
	</div>

	<div class="col-md-12">
		<span class="help-block">(1) allegare fotocopia del documento indicato.</span>
	</div>



	<p>In qualità di titolare delle linee telefoniche e/o di connessione alla rete internet indicate al punto 6 che precedono, con la presente dichiara di averne la piena e libera disponibilità e pertanto dichiara e
manifesta, ad ogni effeto di legge, la propria volontà di voler usufruire su dette linee dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l.</p>

	<div class="form-group col-md-12">
		<div class="checkbox">
			<?php $chk = ( @$fields['migrazione_servizi'] &&  $fields['migrazione_servizi']=='1') ? "checked='checked'" : ""; ?> 
			<input type="checkbox" name="dati[migrazione_servizi]" value="1" <?php echo $chk;?> ><label class="control-label"><strong>a) RICHIESTA DI MIGRAZIONE DEI SERVIZI TELEFONICI ED INTERNET</strong></label>
			<p>Il cliente dichiara di voler recedere dal rapporto contrattuale con l'operatore richiamato al punto 6 della presente proposta , con riferimento alle linee telefoniche sopra indicate al fine di usufruire dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l. in modalità ULL e/o WLR e/o Bitstream e/o Vula e/o Bitstream NGA. A tal fine dà mandato alla società Terrecablate Reti e Servizi S.r.l di inoltrare al suddetto operatore l'ordine di lavorazione e, se richiesto, la manifestazione della propria volontà di recesso oggetto della presente richiesta, secondo le forme di legge, ed a compiere ogni altra operazione necessaria per la fornitura dei succitati servizi.</p>
		</div>

		<div class="checkbox">
			<?php $chk = ( @$fields['migrazione_portability'] &&  $fields['migrazione_portability']=='1') ? "checked='checked'" : ""; ?> 
			<input type="checkbox" name="dati[migrazione_portability]" value="1" <?php echo $chk;?> ><label class="control-label"><strong>b) RICHIESTA DI MANTENIMENTO DEL NUMERO TELEFONICO (NUMBER PORTABILITY)<sup>1</sup></strong></label>
			<p>Il cliente dichiara di voler mantenere i numeri di cui al punto 6. nell'ambito dei servizi forniti da Terrecablate Reti e Servizi S.r.l.. Chiede pertanto che sia attivata la procedura per la prestazione del servizio di Number Portability con l'operatore indicato al precedente punto 6 relativamente ai numeri sopra specificati . A tal fine dà mandato a Terrecablate Reti e Servizi S.r.l . affinché essa provveda ad inoltrare ai suddetti operatori l'ordine di lavorazione e la manifestazione della volontà di recesso oggetto della presente richiesta , secondo le forme di legge, ed a compiere ogni altra operazione necessaria per la prestazione del servizio di Number Portability. Il cliente richiede che la gestione delle numerazioni sopra indicate venga delegata a Terrecablate Reti e Servizi S.r.l.. A tale scopo, autorizzo quest'ultima società ad attivare tutte le procedure necessarie con l'operatore che gestisce attualmente le numerazioni stesse . Il Titolare manleva Terrecablate Reti e Servizi S.r.l. da eventuali inconvenienti che possano portare all’ insuccesso della Number Portability. Qualora il titolare intendesse successivamente revocare il mandato conferito a Terrecablate Reti e Servizi S.r.l., sarà sua cura darne a quest’ultima comunicazione per iscritto.</p>
		</div>	
		<span class="help-block">(1) Campo obbligatorio: il cliente deve dare precisa indicazione della volontà di mantenere il proprio numero di telefono sia frmando il punto b) che barrando la casella indicata nella sezione 6. Qualora venga omessa una delle due indicazioni Terrecablate NON potrà effettuare e quindi NON effettuerà la portabilità del numero telefonico che quindi verrà sostituito con un numero nuovo.</span>
	</div>

</fieldset>