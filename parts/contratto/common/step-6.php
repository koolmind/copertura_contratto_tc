<?php 
    $fields = @$this->contrattoData['pagamento']; 
    $rbPagamento = tcGetFieldValue($fields,"metodo_pagamento",false);

    showSteps(6);
?>


<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="pagamento">
    <!-- <input type="hidden" id="tipocli" name="tipocli" value="aziende"> -->
   
    <fieldset id="fields-gdpr" class="mt-3">
        <legend>8. Scelta della modalità di pagamento</legend>
        
        <div class="row">
            <div class="col-12">
                <div class="d-flex gap-5 justify-content-center mb-4">
                    <div class="form-check check-zone">
                        <input class="form-check-input" type="radio" name="dati[metodo_pagamento]" id="pagamentoCC" value="cc" <?php echo $rbPagamento == 'cc' ? ' checked ' : ''; ?> data-payment>
                        <label class="form-check-label" for="pagamentoCC">Carta di credito</label>
                    </div>
                    <div class="form-check check-zone">
                        <input class="form-check-input" type="radio" name="dati[metodo_pagamento]" id="pagamentoSDD" value="sdd" <?php echo $rbPagamento == 'sdd' ? ' checked ' : ''; ?> data-payment>
                        <label class="form-check-label" for="pagamentoSDD">Addebito automatico in conto corrente</label>
                    </div>
                </div>
                <div class="col-12 note_default">
                La informiamo che il metodo di pagamento con Carta di Credito verrà gestito ricorrendo all’apposito servizio messo a disposizione da CartaSi che rende disponibili unicamente i circuiti
Visa e Mastercard e non potranno essere utilizzate Carte di Credito in modalità prepagata/ricaricabile. Terrecablate Reti e Servizi S.r.l. La informa che scegliendo la modalità di pagamento
con Carta di Credito, Le verrà inviato tramite e-mail il Codice Cliente ed il Codice Contratto mediante i quali dovrà registrarsi al portale clienti di Terrecablate (MyTerrecablate, rinvenibile
all'indirizzo internet <a href="http://portale.terrecablate.it">http://portale.terrecablate.it</a> ) al fine di completare la procedura di addebito permanente sulla propria Carta di Credito e Le rammenta che la procedura di attivazione
dei Servizi richiesti non potrà perfezionarsi senza che Lei vi abbia provveduto. A tale proposito Terrecablate Reti e Servizi S.r.l., inoltre, le rammenta che il termine per perfezionare la
procedura di registrazione al Portale Cliente MyTerrecablate e di autorizzazione all'addebito permanente su Carta di Credito è di 10 giorni dalla data di accettazione del Contratto da parte
di Terrecablate. Ove Lei abbia scelto la modalità di pagamento mediante addebito su Carta di Credito, Terrecablate Reti e Servizi S.r.l. La informa che i Suoi dati, occorrenti per tale attività,
non saranno trattati e non risiederanno in alcun Database di Terrecablate Reti e Servizi S.r.l. ma saranno trattati in autonomia da Carta SI tramite i propri sistemi.
                </div>
            </div>            
            
        </div>        
    </fieldset>

    <fieldset id="fields-conto-corrente" class="mt-5 bordered <?php echo $rbPagamento=='sdd' ?  '' : 'hide' ?>">
        <legend>MOD. A - AUTORIZZAZIONE PERMANENTE DI ADDEBITO IN CONTO</legend>
        <p>Al fine di poter accettare la richiesta, è necessario che tutti i campi contrassegnati con * siano compilati, che il modulo sia sottoscritto dal titolare del conto corrente sul quale viene richiesto l’addebito 
            del Conto Terrecablate Reti e Servizi o da soggetto delegato ad operare sul conto corrente. È necessario inoltre allegare al modulo copia del Documento d'identità valido e del tesserino del Codice Fiscale 
            del sottoscrittore della richiesta di domiciliazione.</p>

            <h4 class="titoletto">AUTORIZZAZIONE PER L’ADDEBITO IN CONTO CORRENTE DELLE DISPOSIZIONI SEPA CORE DIRECT DEBIT<sup>(1)</sup></h4>

            <h4 class="titolo-sez">DATI IDENTIFICATIVI DELL'INTESTATARIO DEL CONTO CORRENTE (di seguito DEBITORE)</h4>
            
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <label for="sdd_intestatario_cognome_nome">COGNOME e NOME / RAGIONE SOCIALE</label>
                    <input type="text" name="dati[sdd_intestatario_cognome_nome]" id="sdd_intestatario_cognome_nome" class="form-control tc-required" value="<?php tcGetFieldValue($fields,'sdd_intestatario_cognome_nome'); ?>">
                </div>

                <div class="col-12 col-md-6  mb-4">
                    <label for="sdd_codfisc_piva">CODICE FISCALE / P.IVA</label>
                    <input type="text" name="dati[sdd_intestatario_codfisc_piva]" id="sdd_intestatario_codfisc_piva" class="form-control tc-required" maxlength="16" value="<?php tcGetFieldValue($fields,'sdd_intestatario_codfisc_piva'); ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <h4 class="titolo-sez">CODICE IBAN DEL CONTO CORRENTE</h4>
                    <input type="text" name="dati[sdd_iban]" id="sdd_iban" class="form-control tc-required" maxlength="27" placeholder="27 caratteri" value="<?php tcGetFieldValue($fields,'sdd_iban'); ?>">
                </div>
                <p>Il Sottoscritto Debitore autorizza il Creditore a disporre sul conto corrente sopra indicato addebiti in via continuativa ed il Prestatore di Servizi di Pagamento (di seguito “PSP”) ad eseguire 
                    l’addebito secondo le disposizioni impartite dal Creditore. Il rapporto con il PSP è regolato dal contratto stipulato dal Debitore con il PSP stesso.<br>
                    Il Debitore ha facoltà di richiedere al PSP il rimborso di quanto addebitato, secondo quanto stabilito nel suddetto contratto; eventuali richieste di rimborso devono essere presentate 
                    entro e non oltre 8 settimane a decorrere dalla data di addebito.<sup>(2)</sup></p>
            </div>

            <h4 class="titolo-sez">DATI IDENTIFICATIVI DEL SOTTOSCRITTORE<sup>(3)</sup></h4>
            <div class="row">
                <div class="col-12 col-md-6 mb-4">
                    <label for="sdd_sottoscrittore_cognome_nome">COGNOME e NOME</label>
                    <input type="text" name="dati[sdd_sottoscrittore_cognome_nome]" id="sdd_sottoscrittore_cognome_nome" class="form-control tc-required" value="<?php tcGetFieldValue($fields,'sdd_sottoscrittore_cognome_nome'); ?>">
                </div>

                <div class="col-12 col-md-6  mb-4">
                    <label for="sdd_sottoscrittore_codfisc">CODICE FISCALE</label>
                    <input type="text" name="dati[sdd_sottoscrittore_codfisc]" id="sdd_sottoscrittore_codfisc" class="form-control tc-required" maxlength="16" value="<?php tcGetFieldValue($fields,'sdd_sottoscrittore_codfisc'); ?>">
                </div>
            </div>

            <h4 class="titolo-sez">TITOLARE DEL CONTRATTO/LINEA TELEFONICA <small>(da compilare solo se il sottoscrittore non coincide con il titolare del conto corrente)</small></h4>
            
            <div class="row">
                <div class="col-12 mb-4">
                    <label for="sdd_titolare_linea">LINEA TELEFONICA / CONTRATTO</label>
                    <input type="text" name="dati[sdd_titolare_linea]" id="sdd_titolare_linea" class="form-control" value="<?php tcGetFieldValue($fields,'sdd_titolare_linea'); ?>">
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <label for="sdd_titolare_cognome_nome">COGNOME e NOME / RAGIONE SOCIALE</label>
                    <input type="text" name="dati[sdd_titolare_cognome_nome]" id="sdd_titolare_cognome_nome" class="form-control" value="<?php tcGetFieldValue($fields,'sdd_titolare_cognome_nome'); ?>">
                </div>

                <div class="col-12 col-md-6  mb-4">
                    <label for="sdd_codfisc_piva">CODICE FISCALE / P.IVA</label>
                    <input type="text" name="dati[sdd_titolare_codfisc_piva]" id="sdd_titolare_codfisc_piva" class="form-control" maxlength="16" value="<?php tcGetFieldValue($fields,'sdd_titolare_codfisc_piva'); ?>">
                </div>

                <div class="col-12 mb-4">
                    <label for="sdd_titolare_recapito">RECAPITO TELEFONICO ALTERNATIVO</label>
                    <input type="text" name="dati[sdd_titolare_recapito]" id="sdd_titolare_recapito" class="form-control" value="<?php tcGetFieldValue($fields,'sdd_titolare_recapito'); ?>">
                </div>
            </div>
    </fieldset>

    <div class="row">
        <div class="col-12 mt-5">
            <span class="note_info"><i class="fas fa-info-circle"></i> <b>NOTE</b><br>
            (1) La presente autorizzazione permanente di addebito in conto corrente è subordinata all’accettazione da parte del Prestatore di Servizi di Pagamento (PSP) del Debitore.<br>
            (2) A titolo esemplificativo, possono essere PSP le banche, gli istituti di moneta elettronica e gli istituti di pagamento autorizzati.<br>
            (3) Nel caso di c/c intestato a persona giuridica il sottoscrittore coincide con il soggetto delegato ad operare sul conto. Nel caso di c/c intestato a persona fisica il sottoscrittore coincide con il titolare medesimo ovvero con il soggetto delegato ad operare sullo stesso.
        </div>
    </div>
    


    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard jsCheckPagamentoFields">Avanti <i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>