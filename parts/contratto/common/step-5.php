<?php 
    $fields = @$this->contrattoData['gdpr']; 
    $rbMarketing = tcGetFieldValue($fields,"consenso_marketing",false);
    $rbProfilazione =  tcGetFieldValue($fields,"consenso_profilazione",false);

    showSteps(5);
?>
<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="gdpr">
    <!-- <input type="hidden" id="tipocli" name="tipocli" value="aziende"> -->
   
    <fieldset id="fields-gdpr" class="mt-3">
        <legend>7. Manifestazione del consenso al trattamento dei dati personali (REG. UE 679/2016)</legend>
        
        <div class="row">
            <div class="col-12">
                <p>Letta e compresa l'informativa privacy riportata nell'allegato al presente Documento di Accettazione "INFORMATIVA Al SENSI DELL'ART. 13 DEL REGOLAMENTO UE 679/2016 RELATIVA AL TRATTAMENTO DEI DATI PERSONALI</p>
            </div>
            
            <div class="col-12 mb-4 pb-3" style="border-bottom:1px solid #9c9c9c">
                <div class="d-flex gap-5 justify-content-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dati[consenso_marketing]" id="consensoMarketingOK" value="1" <?php echo $rbMarketing === "1" ? ' checked ' : ''; ?> >
                        <label class="form-check-label" for="consensoMarketingOK">PRESTO IL CONSENSO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dati[consenso_marketing]" id="consensoMarketingKO" value="0" <?php echo $rbMarketing === "0"  ? ' checked ' : ''; ?> >
                        <label class="form-check-label" for="consensoMarketingKO">NEGO IL CONSENSO</label>
                    </div>
                </div>
                <p>al trattamento dei dati personali da parte di Terrecablate per l'invio di comunicazioni promozionali e di marketing, incluso l'invio di newsletter e ricerche di mercato, attraverso strumenti
                    automatizzati (sms, mms, email, notifiche push, fax) e non (posta cartacea, telefono con operatore).</p>
            </div>

            <div class="col-12">
                <div class="d-flex gap-5 justify-content-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dati[consenso_profilazione]" id="consensoProfilazioneOK" value="1" <?php echo $rbProfilazione === "1" ? ' checked ' : ''; ?>>
                        <label class="form-check-label" for="consensoProfilazioneOK">PRESTO IL CONSENSO</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dati[consenso_profilazione]" id="consensoProfilazioneKO" value="0" <?php echo $rbProfilazione === "0" ? ' checked ' : ''; ?>>
                        <label class="form-check-label" for="consensoProfilazioneKO">NEGO IL CONSENSO</label>
                    </div>
                </div>
                <p>al trattamento dei dati personali da parte di Terrecablate per l’analisi delle scelte d’acquisto e delle preferenze comportamentali nei Punti Amici e sul sito web, al fine di meglio strutturare 
                    comunicazioni e proposte commerciali personalizzate, per effettuare analisi generali per fini di orientamento strategico e di intelligence commerciale e, in genere, per attività di profilazione.</p>
            </div>            
            
        </div>        
    </fieldset>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard jsCheckGdprFields">Avanti <i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>