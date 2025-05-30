<?php 
	showSteps(4);

	global $sesso, $docs, $ruoli;
    $fields = @$this->contrattoData['migrazione']; 

	if(!$fields) 
        $fields = loadDataFromTransient($this->contrattoUID, 'anagrafica', 'linea', true);

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
        <legend>4. Migrazione o attivazione nuova linea</legend>
        
        <div class="row">
            <div class="col mb-2 d-flex flex-column flex-md-row gap-5">
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
                    <label class="form-check-label" for="linea_portability">Voglio mantenere il mio numero telefonico <sup>(1)</sup></label>
                </div>
            </div>
			<span class="note_info d-block mb-4"><sup>(1)</sup> Il servizio di <b>Number Portability</b> comporta un costo una tantum di 15,00 euro per ciascun numero.</span>
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

    <fieldset id="fields-number-portability" class="mt-3 bordered <?php echo $cbPortability ?  '' : 'hide' ?>">
        <legend>5. Tipologia linea e Mantenimento del numero (Number Portability)</legend>
		<span class="note_info d-block mb-2"><i class="fas fa-info-circle"></i> Il <b>Codice di Migrazione</b> può essere reperito nella fattura di cortesia inviata mensilmente dal tuo attuale operatore telefonico.</span>

        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <label for="linea_codice_migrazione_1">Codice di migrazione + carattere di controllo</label>
                <input type="text" name="dati[linea_codice_migrazione_1]" id="linea_codice_migrazione_1" class="form-control tc-migration" maxlength="50" value="<?php tcGetFieldValue($fields,'linea_codice_migrazione_1'); ?>">
				<small class="text-danger form-message hide">Codice migrazione errato</small>
            </div>

            <div class="col-12 col-md-6  mb-4">
                <label for="linea_codice_migrazione_2">Secondo codice di migrazione + carattere di controllo</label>
                <input type="text" name="dati[linea_codice_migrazione_2]" id="linea_codice_migrazione_2" class="form-control tc-migration" placeholder="opzionale" maxlength="50" value="<?php tcGetFieldValue($fields,'linea_codice_migrazione_2'); ?>">
				<small class="text-danger form-message hide">Codice migrazione errato</small>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <label for="linea_numero_1">Numero telefonico #1</label>
                <input type="text" name="dati[linea_numero_1]" id="linea_numero_1" class="form-control"  maxlength="20" value="<?php tcGetFieldValue($fields,'linea_numero_1'); ?>">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="linea_numero_2">Numero telefonico #2</label>
                <input type="text" name="dati[linea_numero_2]" id="linea_numero_2" class="form-control" placeholder="opzionale"  maxlength="20" value="<?php tcGetFieldValue($fields,'linea_numero_2'); ?>">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="linea_numero_3">Numero telefonico #3</label>
                <input type="text" name="dati[linea_numero_3]" id="linea_numero_3" class="form-control" placeholder="opzionale" maxlength="20"  value="<?php tcGetFieldValue($fields,'linea_numero_3'); ?>">
            </div>

            <div class="col-12 col-md-6 mb-4">
                <label for="linea_numero_4">Numero telefonico #4</label>
                <input type="text" name="dati[linea_numero_4]" id="linea_numero_4" class="form-control" placeholder="opzionale"  maxlength="20" value="<?php tcGetFieldValue($fields,'linea_numero_4'); ?>">
            </div>
        </div>        
    </fieldset>

    <fieldset id="fields-intestatario-linea" class="mb-5 mt-3">
		<legend>6. Servizi di migrazione e mantenimento del numero telefonico</legend>	

        <!-- <div class="d-flex justify-content-end my-3">
            <button type="button" id="fill-from-stored-data" class="btn-standard btn-alt" data-sourcesection="anagrafica" disabled><i class="fas fa-sync"></i> stesso indirizzo sede</button>
        </div> -->
		
		<div class="row">
			<div class="col-13 col-md-6 mb-4">
				<label for="linea_rag_sociale">Denominazione / Ragione sociale o Cognome</label>
				<input type="text" name="dati[linea_rag_sociale]" id="linea_rag_sociale" class="form-control tc-required" placeholder="ragione sociale"  maxlength="100" value="<?php tcGetFieldValue($fields,'linea_rag_sociale'); ?>">
			</div>
            <div class="col-12 col-md-6 mb-4">
				<label for="linea_azienda_nome">Nome</label>
				<input type="text" name="dati[linea_azienda_nome]" id="linea_azienda_nome" class="form-control" placeholder=""  maxlength="50" value="<?php tcGetFieldValue($fields,'linea_azienda_nome'); ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="tc-input col-12 col-md-8 mb-4">
				<label for="linea_azienda_indirizzo">Sede (via/piazza)</label>
				<input type="text" name="dati[linea_azienda_indirizzo]" id="linea_azienda_indirizzo" class="form-control tc-required"  maxlength="100" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'linea_azienda_indirizzo'); ?>">
			</div>
		
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_azienda_civico">Numero civico</label>
				<input type="text" name="dati[linea_azienda_civico]" id="linea_azienda_civico" class="form-control tc-required"  maxlength="10" placeholder="n. civico" value="<?php tcGetFieldValue($fields,'linea_azienda_civico'); ?>">
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_azienda_citta">Città</label>
				<input type="text" name="dati[linea_azienda_citta]" id="linea_azienda_citta" class="form-control tc-required"  maxlength="50" placeholder="città" value="<?php tcGetFieldValue($fields,'linea_azienda_citta'); ?>">
			</div>
		
			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="linea_azienda_provincia">Provincia</label>
				<input type="text" name="dati[linea_azienda_provincia]" id="linea_azienda_provincia" class="form-control tc-required"  maxlength="2" placeholder="provincia" value="<?php tcGetFieldValue($fields,'linea_azienda_provincia'); ?>" maxlength="2">
			</div>
		
			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="linea_azienda_cap">CAP</label>
				<input type="text" name="dati[linea_azienda_cap]" id="linea_azienda_cap" class="form-control tc-required"  maxlength="5" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'linea_azienda_cap'); ?>">
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_azienda_piva_cf">Partita IVA / Codice Fiscale</label>
				<input type="text" name="dati[linea_azienda_piva_cf]" id="linea_azienda_piva_cf" class="form-control tc-required"  maxlength="16" placeholder="p.iva o cod. fiscale" value="<?php tcGetFieldValue($fields,'linea_azienda_piva_cf'); ?>" data-checkfcn='cf_piva'>
			</div>
		</div>

        <!-- dati titolare -->
        <div class="row">
			<div class="tc-input col-12 col-md-6">
				<label for="linea_cliente_ruolo">Ruolo intestatario</label>
				<select class="form-select tc-required" name="dati[linea_cliente_ruolo]" id="linea_cliente_ruolo">
					<option value="">- seleziona ruolo -</option>
					<?php
					$sel =  tcGetFieldValue($fields, 'linea_cliente_ruolo',false);
					foreach($ruoli as $ruolo) {
						$isSelected = $ruolo == $sel ? " selected='selected' " : "";
						printf('<option value="%s" %s>%s</option>', $ruolo, $isSelected, $ruolo);
					}
					?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_cognome">Cognome</label>
				<input type="text" name="dati[linea_cliente_cognome]" id="linea_cliente_cognome" class="form-control tc-required" placeholder="cognome"  maxlength="50" value="<?php tcGetFieldValue($fields,'linea_cliente_cognome'); ?>">
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_nome">Nome</label>
				<input type="text" name="dati[linea_cliente_nome]" id="linea_cliente_nome" class="form-control tc-required" placeholder="nome"  maxlength="50" value="<?php tcGetFieldValue($fields,'linea_cliente_nome'); ?>">
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_sesso">Sesso</label>
				<select class="form-select tc-required" name="dati[linea_cliente_sesso]" id="linea_cliente_sesso">
					<option value="">- seleziona sesso -</option>
					<?php
					$sel =  tcGetFieldValue($fields, 'linea_cliente_sesso',false);

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
				<label for="linea_cliente_data_nascita">Data di nascita</label>
				<input type="text" name="dati[linea_cliente_data_nascita]" id="linea_cliente_data_nascita" class="form-control tc-required" value="<?php tcGetFieldValue($fields,'linea_cliente_data_nascita'); ?>" data-calendario>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_luogo_nascita">Luogo di nascita</label>
				<input type="text" name="dati[linea_cliente_luogo_nascita]" id="linea_cliente_luogo_nascita" class="form-control tc-required"  maxlength="50" placeholder="luogo di nascita" value="<?php tcGetFieldValue($fields,'linea_cliente_luogo_nascita'); ?>">
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_provincia_nascita">Provincia</label>
				<input type="text" name="dati[linea_cliente_provincia_nascita]" id="linea_cliente_provincia_nascita" class="form-control tc-required"  maxlength="2" placeholder="provincia" value="<?php tcGetFieldValue($fields,'linea_cliente_provincia_nascita'); ?>" maxlength="2">
			</div>
		</div>
			

		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_cliente_cod_fiscale">Codice Fiscale</label>
				<input type="text" name="dati[linea_cliente_cod_fiscale]" id="linea_cliente_cod_fiscale" class="form-control tc-required"  maxlength="16" placeholder="codice fiscale" value="<?php tcGetFieldValue($fields,'linea_cliente_cod_fiscale'); ?>" data-checkfcn='cf_piva'>
			</div>

			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_cliente_nazionalita">Nazionalità</label>
				<input type="text" name="dati[linea_cliente_nazionalita]" id="linea_cliente_nazionalita" class="form-control tc-required"  maxlength="50" placeholder="nazionalità" value="<?php tcGetFieldValue($fields,'linea_cliente_nazionalita'); ?>">
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_cliente_tipo_documento">Tipo documento</label>
				<select name="dati[linea_cliente_tipo_documento]" id="linea_cliente_tipo_documento" class="form-select tc-required">
					<option value="">-- seleziona documento -</option>
					<?php
					$sel =  tcGetFieldValue($fields, 'linea_cliente_tipo_documento',false);

					foreach($docs as $value=>$label) {
						$isSelected = $value == $sel ? " selected='selected' " : "";
						printf('<option value="%s" %s>%s</option>', $value, $isSelected, $label);
					}
					?>
				</select>
			</div>

			<div class="tc-input col-12 col-md-6 mb-4">
				<label for="linea_cliente_doc_numero">Numero documento</label>
				<input type="text" name="dati[linea_cliente_doc_numero]" id="linea_cliente_doc_numero" class="form-control tc-required"  maxlength="30" placeholder="numero del documento" value="<?php tcGetFieldValue($fields,'linea_cliente_doc_numero'); ?>">
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_doc_emittente">Rilasciato da</label>
				<input type="text" name="dati[linea_cliente_doc_emittente]" id="linea_cliente_doc_emittente" class="form-control tc-required"  maxlength="50" placeholder="rilasciato da" value="<?php tcGetFieldValue($fields,'linea_cliente_doc_emittente'); ?>">
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_doc_rilascio">Data rilascio</label>
				<input type="text" name="dati[linea_cliente_doc_rilascio]" id="linea_cliente_doc_rilascio" class="form-control tc-required" placeholder="rilasciato il" value="<?php tcGetFieldValue($fields,'linea_cliente_doc_rilascio'); ?>" data-calendario>
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_doc_scadenza">Data di scadenza</label>
				<input type="text" name="dati[linea_cliente_doc_scadenza]" id="linea_cliente_doc_scadenza" class="form-control tc-required" placeholder="data di scadenza" value="<?php tcGetFieldValue($fields,'linea_cliente_doc_scadenza'); ?>" data-calendario>
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-8 mb-4">
				<label for="linea_cliente_indirizzo">Residenza (o domicilio italiano), via</label>
				<input type="text" name="dati[linea_cliente_indirizzo]" id="linea_cliente_indirizzo" class="form-control tc-required"  maxlength="100" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'linea_cliente_indirizzo'); ?>">
			</div>

			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_civico">Numero civico</label>
				<input type="text" name="dati[linea_cliente_civico]" id="linea_cliente_civico" class="form-control tc-required"  maxlength="10" placeholder="n. civico" value="<?php tcGetFieldValue($fields,'linea_cliente_civico'); ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="linea_cliente_citta">Città</label>
				<input type="text" name="dati[linea_cliente_citta]" id="linea_cliente_citta" class="form-control tc-required"  maxlength="50" placeholder="città" value="<?php tcGetFieldValue($fields,'linea_cliente_citta'); ?>">
			</div>

			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="linea_cliente_provincia">Provincia</label>
				<input type="text" name="dati[linea_cliente_provincia]" id="linea_cliente_provincia" class="form-control tc-required"  maxlength="2" placeholder="provincia" value="<?php tcGetFieldValue($fields,'linea_cliente_provincia'); ?>" maxlength="2">
			</div>

			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="linea_cliente_cap">CAP</label>
				<input type="text" name="dati[linea_cliente_cap]" id="linea_cliente_cap" class="form-control tc-required"  maxlength="5" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'linea_cliente_cap'); ?>">
			</div>
		</div>

		<div class="row">
            <p>In qualità di titolare delle linee telefoniche e/o di connessione alla rete internet indicate al punto 5 che precedono, con la presente dichiara di averne la piena e libera disponibilità e
			   pertanto dichiara e manifesta, ad ogni effetto di legge, la propria volontà di voler usufruire su dette linee dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l.</p>
        </div>
	</fieldset>

	<fieldset class="mt-3">
		<div id="row-consenso-migrazione" class="row <?php echo $cbConsensoMigrazione ? '' : 'hide'?>">
            <div class="col-12 mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="linea_consenso_migrazione" name="dati[linea_consenso_migrazione]" <?php echo $cbConsensoMigrazione ? ' checked="checked" ' : ''?>>
                    <label class="form-check-label title-label" for="linea_consenso_migrazione">A - Richiesta di migrazione dei servizi telefonici e internet</label>
                </div>
                <p>Il cliente dichiara di voler recedere dal rapporto contrattuale con l’operatore richiamato al punto 5 della presente proposta, con riferimento alle linee telefoniche sopra indicate al fine di usufruire 
                    dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l. A tal fine dà mandato alla società Terrecablate Reti e Servizi S.r.l di inoltrare al suddetto operatore l’ordine 
                    di lavorazione e, se richiesto, la manifestazione della propria volontà di recesso oggetto della presente richiesta, secondo le forme di legge, ed a compiere ogni altra operazione necessaria 
                    per la fornitura dei succitati servizi.</p>
            </div>
        </div>

        <div id="row-consenso-portability" class="row <?php echo $cbConsensoPortability ? '' : 'hide'?>">
            <div class="col-12 mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="linea_consenso_portability" name="dati[linea_consenso_portability]" <?php echo $cbConsensoPortability ? ' checked="checked" ' : ''?> >
                    <label class="form-check-label title-label" for="linea_consenso_portability">B - Richiesta di mantenimento del numero telefonico (Number Portability)</label>
                </div>
                <p>Il cliente dichiara di voler mantenere i numeri di cui al punto 5. nell’ambito dei servizi forniti da Terrecablate Reti e Servizi S.r.l.. Chiede pertanto che sia attivata la procedura per la
                    prestazione del servizio di Number Portability con l’operatore indicato al precedente punto 5 relativamente ai numeri sopra specificati . A tal fine dà mandato a Terrecablate Reti e Servizi S.r.l. 
                    affinché essa provveda ad inoltrare ai suddetti operatori l’ordine di lavorazione e la manifestazione della volontà di recesso oggetto della presente richiesta , secondo le forme di legge, 
                    ed a compiere ogni altra operazione necessaria per la prestazione del servizio di Number Portability. Il cliente richiede che la gestione delle numerazioni sopra indicate venga delegata a Terrecablate 
                    Reti e Servizi S.r.l.. A tale scopo, autorizza quest’ultima società ad attivare tutte le procedure necessarie con l’operatore che gestisce attualmente le numerazioni stesse. 
                    Il Titolare manleva Terrecablate Reti e Servizi S.r.l. da eventuali inconvenienti che possano portare all’ insuccesso della Number Portability.
                    Qualora il titolare intendesse successivamente revocare il mandato conferito a Terrecablate Reti e Servizi S.r.l., sarà sua cura darne a quest’ultima comunicazione per iscritto</p>

                    <span class="note_info"><i class="fas fa-info-circle"></i> Il cliente deve dare precisa indicazione della volontà di mantenere il proprio numero di telefono sia firmando il punto B 
                    che barrando la casella indicata nella sezione 5. Qualora venga omessa una delle due indicazioni Terrecablate NON potrà effettuare e quindi NON effettuerà la portabilità del numero telefonico 
                    che quindi verrà sostituito con un numero nuovo.</span>
            </div>
        </div>
    </fieldset>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard jsCheckLineaFields" disabled>Avanti <i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>