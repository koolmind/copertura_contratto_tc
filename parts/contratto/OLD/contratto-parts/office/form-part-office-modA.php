<fieldset id="fields-modulo-A">
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
		<label for="sdd_sottoscrittore_nome">Cognome e Nome</label>
		<input type="text" name="dati[sdd_sottoscrittore_nome]" id="sdd_sottoscrittore_nome" class="form-control" placeholder="nome e cognome" value="<?php echo ( @$fields['sdd_sottoscrittore_nome'] ) ? $fields['sdd_sottoscrittore_nome'] : ''; ?>" >
	</div>						

	<div class="form-group col-md-6">
		<label for="sdd_sottoscrittore_cf">Codice Fiscale</label>
		<input type="text" name="dati[sdd_sottoscrittore_cf]" id="sdd_sottoscrittore_cf" class="form-control" placeholder="Codice fiscale" value="<?php echo ( @$fields['sdd_sottoscrittore_cf'] ) ? $fields['sdd_sottoscrittore_cf'] : ''; ?>" >
	</div>	

	<p>&nbsp;</p>
	<h4>TITOLARE DEL CONTRATTO/LINEA TELEFONICA (da compilare solo se il sottoscrittore non coincide con il titolare del contratto)</h4>	

	<div class="form-group col-md-6">
		<label for="sdd_titolare_linea">Linea telefonica / Contratto</label>
		<input type="text" name="dati[sdd_titolare_linea]" id="sdd_titolare_linea" class="form-control" placeholder="linea telefonica o contratto" value="<?php echo ( @$fields['sdd_titolare_linea'] ) ? $fields['sdd_titolare_linea'] : ''; ?>" >
	</div>

	<div class="form-group col-md-6">
		<label for="sdd_titolare_nome">Cognome e Nome </label>
		<input type="text" name="dati[sdd_titolare_nome]" id="sdd_titolare_nome" class="form-control" placeholder="nome e cognome" value="<?php echo ( @$fields['sdd_titolare_nome'] ) ? $fields['sdd_titolare_nome'] : ''; ?>" >
	</div>						

	<div class="form-group col-md-6">
		<label for="sdd_titolare_cf_piva">Codice Fiscale / P. IVA </label>
		<input type="text" name="dati[sdd_titolare_cf_piva]" id="sdd_titolare_cf_piva" class="form-control" placeholder="Codice fiscale o Partita IVA" value="<?php echo ( @$fields['sdd_titolare_cf_piva'] ) ? $fields['sdd_titolare_cf_piva'] : ''; ?>" >
	</div>	

	<div class="form-group col-md-6">
		<label for="sdd_titolare_telefono">Recapito telefonico alternativo</label>
		<input type="text" name="dati[sdd_titolare_telefono]" id="sdd_titolare_telefono" class="form-control" placeholder="altro recapito" value="<?php echo ( @$fields['sdd_titolare_telefono'] ) ? $fields['sdd_titolare_telefono'] : ''; ?>" >
	</div>	

</fieldset>