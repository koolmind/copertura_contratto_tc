<?php 
    $fields = @$this->contrattoData['firme']; 
    $cbAccettazioneContratto = (bool) tcGetFieldValue($fields,"accettazione_contratto",false);
    $cbFirmaContratto = (bool) tcGetFieldValue($fields,"firma_contratto",false);
    $cbApprovazioneArticoliContratto = (bool) tcGetFieldValue($fields,"approvazione_articoli_contratto",false);
    showSteps(8);
?>
<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="firme">
    <!-- <input type="hidden" id="tipocli" name="tipocli" value="aziende"> -->
   
    <fieldset id="fields-firma" class="mt-3">
        <legend>9. Firma della Proposta di Contratto</legend>
        

        <div class="row">
            <div class="col-12 mb-4">
                <div class="form-check">
                    <input class="form-check-input tc-required" type="checkbox" value="1" id="accettazione_contratto" name="dati[accettazione_contratto]" <?php echo $cbAccettazioneContratto ? ' checked="checked" ' : ''?>>
                    <label class="form-check-label title-label" for="accettazione_contratto">COMUNICAZIONE DI ACCETTAZIONE E CONFERMA DEL CONTRATTO</label>
                </div>
                <p>Il Cliente dichiara di voler ricevere la conferma del contratto concluso su un mezzo durevole mediante spedizione all'indirizzo e-mail indicato al punto 1 della Proposta.</p>
            </div>
        </div>   

        <div class="row">
        <div class="col-12 mb-4">
            <div class="form-check">
                <input class="form-check-input tc-required" type="checkbox" value="1" id="firma_contratto" name="dati[firma_contratto]" <?php echo $cbFirmaContratto ? ' checked="checked" ' : ''?>>
                <label class="form-check-label title-label" for="firma_contratto">FIRMA DELLA PROPOSTA DI CONTRATTO</label>
            </div>
            <p>La firma conferma le obbligazioni del Cliente previste nella presente Proposta di Contratto per la prestazione di Servizi di comunicazione elettronica (telefonie fissa ed internet) anche
con riferimento alla modalità di pagamento prescelta. Il Contratto tra il Cliente e Terrecablate Reti e Servizi S.r.l. si perfeziona in base alla procedura contenuta negli Articoli 4 e 5 delle
Condizioni Generali di Contratto.</p>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="form-check">
                    <input class="form-check-input tc-required" type="checkbox" value="1" id="approvazione_articoli_contratto" name="dati[approvazione_articoli_contratto]" <?php echo $cbApprovazioneArticoliContratto ? ' checked="checked" ' : ''?>>
                    <label class="form-check-label title-label" for="approvazione_articoli_contratto">APPROVAZIONE ESPLICITA DELLE CONDIZIONI DI CONTRATTO</label>
                </div>
                <p>Il Cliente, previa attenta e specifica lettura, dichiara di aver preso visione e conoscenza ed espressamente approva, ai sensi degli articoli 1341 e 1342, C.C., i seguenti articoli delle
Condizioni Generali di Contratto: 3.DATI PERSONALI DEL CLIENTE; 5. ACCETTAZIONE DELLA PROPOSTA; 6. NON ACCETTAZIONE DELLA PROPOSTA – MANCATA CONCLUSIONE DEL
CONTRATTO; 8. DURATA DEL CONTRATTO; 9. MODIFICHE DEL CONTRATTO DA PARTE DI TERRECABLATE; 11. CESSIONE DEL CONTRATTO; 12 CARATTERISTICHE DEI SERVIZI; 14.
OPZIONE; 19. USO PERSONALE – ABUSO DEL CONTRATTO E DEI SERVIZI – TRAFFICO ANOMALO; 21. LIMITAZIONE E FUNZIONAMENTO DEI SERVIZI; 25. OMESSO PAGAMENTO –
LIMITAZIONE E SOSPENSIONE DEI SERVIZI; 27 RECESSO DI TERRECABLATE; 28. APPARATI FORNITI DA TERRECABLATE - CONDIZIONI DI NOLEGGIO 29. CESSAZIONE DEL CONTRATTO
– OBBLIGHI RESTITUTORI DEL CLIENTE; 38. LIMITAZIONE DI RESPONSABILITÀ - MANLEVA.</p>
            </div>
        </div>   

    </fieldset>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i tuoi consensi</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard" disabled>ACCETTA E CONCLUDI<i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>