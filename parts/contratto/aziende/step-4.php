<?php 
    $fields = @$this->contrattoData['migrazione']; 

	$cbMigrazione = (bool) tcGetFieldValue($fields,"linea_migrazione",false);
	$cbAttivazione = (bool) tcGetFieldValue($fields,"linea_nuova",false);
	$cbPortability = (bool) tcGetFieldValue($fields,"linea_portability",false);
	$cbConsensoMigrazione = (bool) tcGetFieldValue($fields,"linea_consenso_migrazione",false);
	$cbConsensoPortability = (bool) tcGetFieldValue($fields,"linea_consenso_portability",false);
?>

<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="migrazione">
    <input type="hidden" id="tipocli" name="tipocli" value="aziende">
   
    <fieldset id="fields-migrazione-mantenimento" class="mt-3">
        <legend>Migrazione o attivazione nuova linea</legend>
        
        <div class="row">
            <div class="col mb-4 d-flex flex-column flex-md-row gap-5">
                <div class="form-check check-zone">
                    <input class="form-check-input" type="checkbox" value="1" id="linea_migrazione" name="dati[linea_migrazione]" data-check-linea <?php echo $cbMigrazione ? 'checked="checked" ': ''?>>
                    <label class="form-check-label" for="linea_migrazione">Voglio migrare la mia linea</label>
                </div>
                
                <div class="form-check check-zone">
                    <input class="form-check-input" type="checkbox" value="1" id="linea_nuova" name="dati[linea_nuova]" data-check-linea <?php echo $cbAttivazione ? 'checked="checked" ': ''?>>
                    <label class="form-check-label" for="linea_nuova">Voglio attivare una nuova linea</label>
                </div>

                <div class="form-check check-zone">
                    <input class="form-check-input" type="checkbox" value="1" id="linea_portability" name="dati[linea_portability]" data-check-linea <?php echo $cbPortability ? 'checked="checked" ': ''?> >
                    <label class="form-check-label" for="linea_portability">Voglio mantenere il mio numero telefonico</label>
                </div>
            </div>
        </div>

		<div class="row mx-0 mb-4">
			<div class="col note_default">
				<b>NOTA BENE</b>: in caso di passaggio da servizi Rame (ADSL-VDSL) a servizi Fibra (FTTH) o viceversa, è necessario selezionare "VOGLIO ATTIVARE UNA NUONA LINEA": <b>leggere con attenzione quanto segue.</b> Si specifica che non sarà possibile effettuare la migrazione diretta nel caso in cui il servizio attualmente attivo sia basato su linea di accesso in rame (solo voce o xDSL) ed il servizio richiesto a Terrecablate sia basato su linea di accesso in fibra (FTTH), o viceversa. 
        In questo caso verrà effettuata l'attivazione del servizio richiesto su una nuova linea e l'eventuale portabilità del numero (Number Portability) sarà effettuata in un momento successivo rispetto all'attivazione 
        della nuova linea. In questo caso, resterà in carico al titolare della linea attualmente attiva l'eventuale comunicazione di disdetta da inviare all'attuale operatore, successivamente all'avvenuto passaggio del numero.
			</div>		
		</div>
    </fieldset>
    
	<!-- NUMBER PORTABILITY -->

    <fieldset id="fields-number-portability" class="mt-3 <?php echo $cbPortability ?  '' : 'hide' ?>">
        <legend>Number portability</legend>

        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <label for="linea_codice_migrazione_1">Codice di migrazione + carattere di controllo</label>
                <input type="text" name="dati[linea_codice_migrazione_1]" id="linea_codice_migrazione_1" class="form-control" maxlength="19" value="<?php tcGetFieldValue($fields,'linea_codice_migrazione_1'); ?>">
            </div>

            <div class="col-12 col-md-6  mb-4">
                <label for="linea_codice_migrazione_2">Secondo codice di migrazione + carattere di controllo</label>
                <input type="text" name="dati[linea_codice_migrazione_2]" id="linea_codice_migrazione_2" class="form-control" placeholder="opzionale" maxlength="19" value="<?php tcGetFieldValue($fields,'linea_codice_migrazione_2'); ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <label for="linea_numero_1">Numero telefonico #1</label>
                <input type="text" name="dati[linea_numero_1]" id="linea_numero_1" class="form-control" maxlength="19" value="<?php tcGetFieldValue($fields,'linea_numero_1'); ?>">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="linea_numero_2">Numero telefonico #2</label>
                <input type="text" name="dati[linea_numero_2]" id="linea_numero_2" class="form-control" placeholder="opzionale" maxlength="19" value="<?php tcGetFieldValue($fields,'linea_numero_2'); ?>">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="linea_numero_3">Numero telefonico #3</label>
                <input type="text" name="dati[linea_numero_3]" id="linea_numero_3" class="form-control" placeholder="opzionale" maxlength="19" value="<?php tcGetFieldValue($fields,'linea_numero_3'); ?>">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="linea_numero_4">Numero telefonico #4</label>
                <input type="text" name="dati[linea_numero_4]" id="linea_numero_4" class="form-control" placeholder="opzionale" maxlength="19" value="<?php tcGetFieldValue($fields,'linea_numero_4'); ?>">
            </div>
        </div>        
    </fieldset>

    <fieldset id="fields-intestatario-linea" class="mb-5 mt-3">
		<legend>Intestatario e ubicazione linea telefonica</legend>	

        <div class="d-flex justify-content-end my-3">
            <button type="button" id="fill-from-stored-data" class="btn-standard btn-alt" data-sourcesection="anagrafica"><i class="fas fa-sync"></i> stesso indirizzo sede</button>
        </div>
		
		<div class="row">
			<div class="col-13 col-md-6 mb-4">
				<label for="linea_rag_sociale">Denominazione / Ragione sociale o Cognome</label>
				<input type="text" name="dati[linea_rag_sociale]" id="linea_rag_sociale" class="form-control tc-required" placeholder="ragione sociale" value="<?php tcGetFieldValue($fields,'linea_rag_sociale'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
            <div class="col-12 col-md-6 mb-4">
				<label for="linea_azienda_nome">Nome</label>
				<input type="text" name="dati[linea_azienda_nome]" id="linea_rag_sociale" class="form-control" placeholder="" value="<?php tcGetFieldValue($fields,'linea_azienda_nome'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>
		
		<div class="row">
			<div class="tc-input col-12 col-md-8 mb-4">
				<label for="linea_azienda_indirizzo">Sede (via/piazza)</label>
				<input type="text" name="dati[linea_azienda_indirizzo]" id="linea_azienda_indirizzo" class="form-control tc-required" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'linea_azienda_indirizzo'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_azienda_civico">Numero civico</label>
				<input type="text" name="dati[linea_azienda_civico]" id="linea_azienda_civico" class="form-control tc-required" placeholder="n. civico" value="<?php tcGetFieldValue($fields,'linea_azienda_civico'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_azienda_citta">Città</label>
				<input type="text" name="dati[linea_azienda_citta]" id="linea_azienda_citta" class="form-control tc-required" placeholder="città" value="<?php tcGetFieldValue($fields,'linea_azienda_citta'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		
			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="linea_azienda_provincia">Provincia</label>
				<input type="text" name="dati[linea_azienda_provincia]" id="linea_azienda_provincia" class="form-control tc-required" placeholder="provincia" value="<?php tcGetFieldValue($fields,'linea_azienda_provincia'); ?>" maxlength="2">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		
			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="linea_azienda_cap">CAP</label>
				<input type="text" name="dati[linea_azienda_cap]" id="linea_azienda_cap" class="form-control tc-required" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'linea_azienda_cap'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_azienda_piva_cf">Partita IVA / Codice Fiscale</label>
				<input type="text" name="dati[linea_azienda_piva_cf]" id="linea_azienda_piva_cf" class="form-control tc-required" placeholder="p.iva o cod. fiscale" value="<?php tcGetFieldValue($fields,'linea_azienda_piva_cf'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>

        <!-- dati titolare -->
        <div class="row">
			<div class="tc-input col-12 col-md-6">
				<label for="linea_cliente_ruolo">Ruolo intestatario</label>
				<select class="form-select tc-required" name="dati[linea_cliente_ruolo]" id="linea_cliente_ruolo">
					<option value="">- seleziona ruolo -</option>
					<?php
					$ruoli = ['titolare','legale rappresentante','delegato'];
					$sel =  tcGetFieldValue($fields, 'linea_cliente_ruolo',false);
					foreach($ruoli as $ruolo) {
						$isSelected = $ruolo == $sel ? " selected='selected' " : "";
						printf('<option value="%s" %s>%s</option>', $ruolo, $isSelected, $ruolo);
					}
					?>
				</select>
				<small class="text-danger form-message hide" style="clear:both;">Campo richiesto. Selezionare un'opzione.</small>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_cognome">Cognome</label>
				<input type="text" name="dati[linea_cliente_cognome]" id="linea_cliente_cognome" class="form-control tc-required" placeholder="cognome" value="<?php tcGetFieldValue($fields,'linea_cliente_cognome'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_nome">Nome</label>
				<input type="text" name="dati[linea_cliente_nome]" id="linea_cliente_nome" class="form-control tc-required" placeholder="nome" value="<?php tcGetFieldValue($fields,'linea_cliente_nome'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_sesso">Sesso</label>
				<select class="form-select tc-required" name="dati[linea_cliente_sesso]" id="linea_cliente_sesso">
					<option value="">- seleziona sesso -</option>
					<?php
					$sesso = ["1"=>"Femmina","2"=>"Maschio"];
					$sel =  tcGetFieldValue($fields, 'linea_cliente_sesso',false);

					foreach($sesso as $sex=>$sexLabel) {
						$isSelected = $sex == $sel ? " selected='selected' " : "";
						printf('<option value="%s" %s>%s</option>', $sex, $isSelected, $sexLabel);
					}
					?>
				</select>
				<small class="text-danger form-message hide" style="clear:both;">Campo richiesto. Selezionare un'opzione.</small>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_data_nascita">Data di nascita</label>
				<input type="text" name="dati[linea_cliente_data_nascita]" id="linea_cliente_data_nascita" class="form-control tc-required" value="<?php tcGetFieldValue($fields,'linea_cliente_data_nascita'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_luogo_nascita">Luogo di nascita</label>
				<input type="text" name="dati[linea_cliente_luogo_nascita]" id="linea_cliente_luogo_nascita" class="form-control tc-required" placeholder="luogo di nascita" value="<?php tcGetFieldValue($fields,'linea_cliente_luogo_nascita'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_provincia_nascita">Provincia</label>
				<input type="text" name="dati[linea_cliente_provincia_nascita]" id="linea_cliente_provincia_nascita" class="form-control tc-required" placeholder="provincia" value="<?php tcGetFieldValue($fields,'linea_cliente_provincia_nascita'); ?>" maxlength="2">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>
			

		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_cliente_cod_fiscale">Codice Fiscale</label>
				<input type="text" name="dati[linea_cliente_cod_fiscale]" id="linea_cliente_cod_fiscale" class="form-control tc-required" placeholder="codice fiscale" value="<?php tcGetFieldValue($fields,'linea_cliente_cod_fiscale'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_cliente_nazionalita">Nazionalità</label>
				<input type="text" name="dati[linea_cliente_nazionalita]" id="linea_cliente_nazionalita" class="form-control tc-required" placeholder="nazionalità" value="<?php tcGetFieldValue($fields,'linea_cliente_nazionalita'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_cliente_tipo_documento">Tipo documento</label>
				<select name="dati[linea_cliente_tipo_documento]" id="linea_cliente_tipo_documento" class="form-select tc-required">
					<option value="">-- seleziona documento -</option>
					<?php
					$docs = array( "1"=>"Carta di identità", "2" => "Patente di guida","4"=>"Passaporto", "5"=>"Permesso di soggiorno" );
					$sel =  tcGetFieldValue($fields, 'linea_cliente_tipo_documento',false);

					foreach($docs as $value=>$label) {
						$isSelected = $value == $sel ? " selected='selected' " : "";
						printf('<option value="%s" %s>%s</option>', $value, $isSelected, $label);
					}
					?>
				</select>
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_cliente_doc_numero">Numero documento</label>
				<input type="text" name="dati[linea_cliente_doc_numero]" id="linea_cliente_doc_numero" class="form-control tc-required" placeholder="numero del cocumento" value="<?php tcGetFieldValue($fields,'linea_cliente_doc_numero'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_doc_emittente">Rilasciato da</label>
				<input type="text" name="dati[linea_cliente_doc_emittente]" id="linea_cliente_doc_emittente" class="form-control tc-required" placeholder="rilasciato da" value="<?php tcGetFieldValue($fields,'linea_cliente_doc_emittente'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_doc_rilascio">Data rilascio</label>
				<input type="text" name="dati[linea_cliente_doc_rilascio]" id="linea_cliente_doc_rilascio" class="form-control tc-required" placeholder="rilasciato il" value="<?php tcGetFieldValue($fields,'linea_cliente_doc_rilascio'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_doc_scadenza">Data di scadenza</label>
				<input type="text" name="dati[linea_cliente_doc_scadenza]" id="linea_cliente_doc_scadenza" class="form-control tc-required" placeholder="data di scadenza" value="<?php tcGetFieldValue($fields,'linea_cliente_doc_scadenza'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-8 mb-4">
				<label for="linea_cliente_indirizzo">Residenza (o domicilio italiano), via</label>
				<input type="text" name="dati[linea_cliente_indirizzo]" id="linea_cliente_indirizzo" class="form-control tc-required" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'linea_cliente_indirizzo'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_civico">Numero civico</label>
				<input type="text" name="dati[linea_cliente_civico]" id="linea_cliente_civico" class="form-control tc-required" placeholder="n. civico" value="<?php tcGetFieldValue($fields,'linea_cliente_civico'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>
		
		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_citta">Città</label>
				<input type="text" name="dati[linea_cliente_citta]" id="linea_cliente_citta" class="form-control tc-required" placeholder="città" value="<?php tcGetFieldValue($fields,'linea_cliente_citta'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="linea_cliente_provincia">Provincia</label>
				<input type="text" name="dati[linea_cliente_provincia]" id="linea_cliente_provincia" class="form-control tc-required" placeholder="provincia" value="<?php tcGetFieldValue($fields,'linea_cliente_provincia'); ?>" maxlength="2">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>

			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="linea_cliente_cap">CAP</label>
				<input type="text" name="dati[linea_cliente_cap]" id="linea_cliente_cap" class="form-control tc-required" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'linea_cliente_cap'); ?>">
				<small class="text-danger form-message hide">Campo richiesto</small>
			</div>
		</div>
	</fieldset>

    <fieldset class="mt-3">
        <legend id="consensi_migrazione">Consensi</legend>
 
        <div class="row">
            <div class="col-12 mb-4">
                <div class="form-check">
                    <input class="form-check-input tc-required" type="checkbox" value="1" id="linea_consenso_migrazione" name="dati[linea_consenso_migrazione]" <?php echo $cbConsensoMigrazione ? ' checked="checked" ' : ''?>>
                    <label class="form-check-label title-label" for="linea_consenso_migrazione">Richiesta di migrazione dei servizi telefonici e internet</label>
                </div>
                <p>Il Cliente dichiara di voler recedere dal rapporto contrattuale con l’operatore, con riferimento alle linee telefoniche sopra indicate al
					fine di usufruire dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l. A tal fine dà mandato alla società Terrecablate Reti e Servizi S.r.l di inoltrare al suddetto
					operatore l’ordine di lavorazione e, se richiesto, la manifestazione della propria volontà di recesso oggetto della presente richiesta, secondo le forme di legge, ed a compiere ogni altra
					operazione necessaria per la fornitura dei succitati servizi.</p>
            </div>
        </div>

        <div id="row-consenso-portability" class="row <?php echo $cbConsensoPortability ? '' : 'hide'?>">
            <div class="col-12 mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="linea_consenso_portability" name="dati[linea_consenso_portability]" <?php echo $cbConsensoPortability ? ' checked="checked" ' : ''?> >
                    <label class="form-check-label title-label" for="linea_consenso_portability">Richiesta di mantenimento del numero telefonico (Number Portability)</label>
                </div>
                <p>Il Cliente dichiara di voler recedere dal rapporto contrattuale con l’operatore, con riferimento alle linee telefoniche sopra indicate al
					fine di usufruire dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l. A tal fine dà mandato alla società Terrecablate Reti e Servizi S.r.l di inoltrare al suddetto
					operatore l’ordine di lavorazione e, se richiesto, la manifestazione della propria volontà di recesso oggetto della presente richiesta, secondo le forme di legge, ed a compiere ogni altra
					operazione necessaria per la fornitura dei succitati servizi.</p>
            </div>
        </div>
    </fieldset>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard jsCheckLineaFields">Avanti <i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>