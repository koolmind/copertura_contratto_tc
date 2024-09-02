<fieldset id="fields-trattamento-dati">
	<legend>8. Manifestazione di consenso al trattamento dei dati personali (D.Lgs.196/2003)</legend>
	<p>1) In relazione all'Informativa riportata nell’allegato al presente Documento di Accettazione "Informativa sul trattamento dei dati personali (D.Lgs.196 del 30 giugno 2003)", prendo atto che i dati personali
fornitivi vengano trattati, diffusi e comunicati anche a terzi, anche all'estero, per lo svolgimento degli adempimenti relativi alle finalità di cui al punto 1) e 2) dell'informativa e do il consenso alle predette
comunicazioni ed ai relativi trattamenti. Sono inoltre consapevole che, in mancanza del mio consenso al trattamento, alla comunicazione e diffusione di tali dati per le fnalità sopra indicate, non potrò aderire
alla presente offerta. Per le fnalità specifcamente indicate al punto 3) dell’informativa do il consenso al trattamento,diffusione e comunicazione, anche a terzi, anche all’estero, dei dati personali fornitivi.</p>
	
	<div class="col-md-12 text-center">
		<div class="radio radio-inline">
			<input type="radio" name="dati[consenso_trattamento_dati_personali]" id="consenso_trattamento_dati_personali-si" value="1" checked="checked"><label class="control-label"><strong>PRESTO IL CONSENSO</strong></label>
			<input type="radio" name="dati[consenso_trattamento_dati_personali]" id="consenso_trattamento_dati_personali-no" value="0"><label class="control-label"><strong>NEGO IL CONSENSO</strong></label>
		</div>	
		<span class="help-block">La scelta è obbligatoria. Informiamo il Cliente che, nel caso venisse negato il consenso, Terrecablate non potrà dare corso alla conclusione del contratto ed all'attivazione dei servizi.</span>
	</div>

	<p>&nbsp;</p>

	<p>2) Autorizzo il trattamento dei miei dati personali a fini promozionali e/o commerciali</p>
	
	<?php $sel = ( @$fields['consenso_trattamento_commerciale'] ) ? $fields['consenso_trattamento_commerciale'] : 1; ?>
	<div class="col-md-12 text-center">
		<div class="radio radio-inline">
			<input type="radio" name="dati[consenso_trattamento_commerciale]" id="consenso_trattamento_commerciale-si" value="1" <?php if($sel==1) { echo "checked='checked'"; }?> ><label class="control-label"><strong>PRESTO IL CONSENSO</strong></label>
			<input type="radio" name="dati[consenso_trattamento_commerciale]" id="consenso_trattamento_commerciale-no" value="0" <?php if($sel==0) { echo "checked='checked'"; } ?> ><label class="control-label"><strong>NEGO IL CONSENSO</strong></label>
		</div>	
	</div>
</fieldset>


<fieldset id="fields-modalita-pagamento">
	<legend>9. Modalità di pagamento</legend>
	<p>La informiamo che il metodo di pagamento con Carta di Credito verrà gestito ricorrendo all’apposito servizio messo a disposizione da CartaSi che rende disponibili unicamente i circuiti Visa e Mastercad e
non potranno essere utilizzate Carte di Credito in modalità prepagata/ricaricabile. Terrecablate Reti e Servizi S.r.l. La informa che scegliendo la modalità di pagamento con Carta di Credito, Le verrà inviato
tramite e-mail, il Codice Cliente ed il Codice Contratto mediante i quali dovrà registrarsi al portale clienti di Terrecablate (MyTerrecablate, rinvenibile all'indirizzo internet http://portale.terrecablate.it ) al fne di
completare la procedura di addebito permanente sulla propria Carta di Credito e Le rammenta che la procedura di attivazione dei Servizi richiesti non potrà perfezionarsi senza che Lei vi abbia provveduto. A
tale proposito Terrecablate Reti e Servizi S.r.l., inoltre, Le rammenta che il termine per perfezionare la procedura di registrazione al Portale Cliente MyTerrecablate e di autorizzazione all'addebito permanente
su Carta di Credito è di 10 giorni dalla data di accettazione del Contratto da parte di Terrecablate. Ove Lei abbia scelto la modalità di pagamento mediante addebito su Carta di Credito, Terrecablate Reti e
Servizi S.r.l. la informa che i Suoi dati, occorrenti per tale attività, non saranno trattati e non risiederanno in alcun Database di Terrecablate Reti e Servizi S.r.l. ma saranno trattati in autonomia da CartaSi tramite
i propri sistemi.</p>
	
	<div class="form-group" id="radios-modalita_pagamento">
		<?php $sel = ( @$fields['modalita_pagamento'] ) ? $fields['modalita_pagamento'] : ''; ?>
		<div class="radio col-md-6">
			<input type="radio" name="dati[modalita_pagamento]" id="modalita_pagamento_cc" class="tc-required" value="pagamento_cc" <?php if($sel=='pagamento_cc'){ echo "checked='checked'"; } ?> ><label class="control-label"><strong>Carta di Credito</strong></label>
		</div>
		<div class="radio col-md-6">
			<input type="radio" name="dati[modalita_pagamento]" id="modalita_pagamento_sdd" class="tc-required" value="pagamento_sdd" <?php if($sel=='pagamento_sdd'){ echo "checked='checked'"; }?> ><label class="control-label"><strong>Addebito automatico in conto corrente (SDD)</strong><br>Riempire il MODELLO A riportato qui di seguito.</label>
		</div>	
		
		<small class="text-danger form-message" style="clear:both;">Campo richiesto. Selezionare un'opzione.</small>
	</div>

</fieldset>


<!--fieldset id="fields-modulo-A">
	<legend>MOD. A - AUTORIZZAZIONE PERMANENTE DI ADDEBITO IN CONTO</legend>
	<p>Al fine di poter accettare la richiesta, è necessario che tutti i campi contrassegnati con * siano compilati. È necessario inoltre allegare al modulo copia del Documento d'dentità valido e del tesserino del Codice Fiscale del sottoscrittore della richiesta di domiciliazione.</p>

	<p>&nbsp;</p>
	<h4>DATI IDENTIFICATIVI DELL'INTESTATARIO DEL CONTO CORRENTE (di seguito DEBITORE)</h4>
	<small class="text-danger form-message" id="message_sdd" style="clear:both;">Attenzione! Hai selezionato SDD come metodo di pagamento. Controlla i dati inseriti in questa sezione.</small>
	
	<div class="form-group col-md-6">
		<label for="sdd_debitore_nome">Cognome e Nome / Ragione sociale *</label>
		<input type="text" name="dati[sdd_debitore_nome]" id="sdd_debitore_nome" class="form-control" placeholder="nome o ragione sociale" value="<?php echo ( @$fields['sdd_debitore_nome'] ) ? $fields['sdd_debitore_nome'] : ''; ?>" >
	</div>						

	<div class="form-group col-md-6">
		<label for="sdd_debitore_cf_piva">Codice Fiscale / P. IVA *</label>
		<input type="text" name="dati[sdd_debitore_cf_piva]" id="sdd_debitore_cf_piva" class="form-control" placeholder="Codice fiscale o Partita IVA" value="<?php echo ( @$fields['sdd_debitore_cf_piva'] ) ? $fields['sdd_debitore_cf_piva'] : ''; ?>" >
	</div>	

	<div class="form-group col-md-12">
		<label for="sdd_debitore_iban">Codice IBAN del conto corrente *</label>
		<input type="text" name="dati[sdd_debitore_iban]" id="sdd_debitore_iban" class="form-control" placeholder="codice IBAN (27 caratteri)" maxlength="27" value="<?php echo ( @$fields['sdd_debitore_iban'] ) ? $fields['sdd_debitore_iban'] : ''; ?>" >
	</div>	

	<p>&nbsp;</p>
	<h4>DATI IDENTIFICATIVI DEL SOTTOSCRITTORE</h4>
	<div class="form-group col-md-6">
		<label for="sdd_sottoscrittore_nome">Cognome e Nome *</label>
		<input type="text" name="dati[sdd_sottoscrittore_nome]" id="sdd_sottoscrittore_nome" class="form-control" placeholder="nome e cognome" value="<?php echo ( @$fields['sdd_sottoscrittore_nome'] ) ? $fields['sdd_sottoscrittore_nome'] : ''; ?>" >
	</div>						

	<div class="form-group col-md-6">
		<label for="sdd_sottoscrittore_cf">Codice Fiscale *</label>
		<input type="text" name="dati[sdd_sottoscrittore_cf]" id="sdd_sottoscrittore_cf" class="form-control" placeholder="Codice fiscale" value="<?php echo ( @$fields['sdd_sottoscrittore_cf'] ) ? $fields['sdd_sottoscrittore_cf'] : ''; ?>" >
	</div>	

	<p>&nbsp;</p>
	<h4>TITOLARE DEL CONTRATTO/LINEA TELEFONICA (da compilare solo se il sottoscrittore non coincide con il titolare del contratto)</h4>	

	<div class="form-group col-md-6">
		<label for="sdd_titolare_linea">Linea telefonica / Contratto *</label>
		<input type="text" name="dati[sdd_titolare_linea]" id="sdd_titolare_linea" class="form-control" placeholder="linea telefonica o contratto" value="<?php echo ( @$fields['sdd_titolare_linea'] ) ? $fields['sdd_titolare_linea'] : ''; ?>" >
	</div>

	<div class="form-group col-md-6">
		<label for="sdd_titolare_nome">Cognome e Nome *</label>
		<input type="text" name="dati[sdd_titolare_nome]" id="sdd_titolare_nome" class="form-control" placeholder="nome e cognome" value="<?php echo ( @$fields['sdd_titolare_nome'] ) ? $fields['sdd_titolare_nome'] : ''; ?>" >
	</div>						

	<div class="form-group col-md-6">
		<label for="sdd_titolare_cf_piva">Codice Fiscale / P. IVA *</label>
		<input type="text" name="dati[sdd_titolare_cf_piva]" id="sdd_titolare_cf_piva" class="form-control" placeholder="Codice fiscale o Partita IVA" value="<?php echo ( @$fields['sdd_titolare_cf_piva'] ) ? $fields['sdd_titolare_cf_piva'] : ''; ?>" >
	</div>	

	<div class="form-group col-md-6">
		<label for="sdd_titolare_telefono">Recapito telefonico alternativo</label>
		<input type="text" name="dati[sdd_titolare_telefono]" id="sdd_titolare_telefono" class="form-control" placeholder="altro recapito" value="<?php echo ( @$fields['sdd_titolare_telefono'] ) ? $fields['sdd_titolare_telefono'] : ''; ?>" >
	</div>	

</fieldset-->