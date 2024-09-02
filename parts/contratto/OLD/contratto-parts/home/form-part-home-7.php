<fieldset id="fields-servizi-migrazione-mantenimento">
	<legend>7. Servizi di migrazione e mantenimento del numero telefonico</legend>
	
	<h4>IL SOTTOSCRITTO</h4>

	<div class="form-group col-md-6">
		<label for="migrazione_cognome">Cognome</label>
		<input type="text" name="dati[migrazione_cognome]" id="migrazione_cognome" class="form-control" placeholder="cognome" value="<?php echo ( @$fields['migrazione_cognome'] ) ? $fields['migrazione_cognome'] : ''; ?>" >
	</div>

	<div class="form-group col-md-6">
		<label for="migrazione_nome">Nome</label>
		<input type="text" name="dati[migrazione_nome]" id="migrazione_nome" class="form-control" placeholder="nome" value="<?php echo ( @$fields['migrazione_nome'] ) ? $fields['migrazione_nome'] : ''; ?>" >
	</div>

	<div class="form-group col-md-9">
		<label for="migrazione_indirizzo">Residente in via/piazza</label>
		<input type="text" name="dati[migrazione_indirizzo]" id="migrazione_indirizzo" class="form-control" placeholder="via/piazza" value="<?php echo ( @$fields['migrazione_indirizzo'] ) ? $fields['migrazione_indirizzo'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-3">
		<label for="migrazione_numero_civico">Numero civico</label>
		<input type="text" name="dati[migrazione_numero_civico]" id="migrazione_numero_civico" class="form-control" placeholder="n. civico" value="<?php echo ( @$fields['migrazione_numero_civico'] ) ? $fields['migrazione_numero_civico'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_citta">Città</label>
		<input type="text" name="dati[migrazione_citta]" id="migrazione_citta" class="form-control" placeholder="città" value="<?php echo ( @$fields['migrazione_citta'] ) ? $fields['migrazione_citta'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_provincia">Provincia</label>
		<input type="text" name="dati[migrazione_provincia]" id="migrazione_provincia" class="form-control" placeholder="provincia" value="<?php echo ( @$fields['migrazione_provincia'] ) ? $fields['migrazione_provincia'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="migrazione_cap">CAP</label>
		<input type="text" name="dati[migrazione_cap]" id="migrazione_cap" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields['migrazione_cap'] ) ? $fields['migrazione_cap'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-12">
		<label for="migrazione_codice_fiscale">Codice Fiscale</label>
		<input type="text" name="dati[migrazione_codice_fiscale]" id="migrazione_codice_fiscale" class="form-control" placeholder="codice fiscale" value="<?php echo ( @$fields['migrazione_codice_fiscale'] ) ? $fields['migrazione_codice_fiscale'] : ''; ?>" >
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