<?php 
    $fields = @$this->contrattoData['servizi']; 
    showSteps(3);
?>

<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="servizi">
    <input type="hidden" id="tipocli" name="tipocli" value="aziende">
   
    <fieldset id="fields-indirizzo-dispositivo" class="mt-3">
        <legend>3. Indirizzo di invio del dispositivo</legend>
        <div class="d-flex justify-content-end my-3">
            <button type="button" id="fill-from-stored-data" class="btn-standard btn-alt" data-sourcesection="attivazione" ><i class="fas fa-sync"></i> come attivazione</button>
        </div>

        <div class="row">
            <div class="col-12 col-md-8 mb-4">
                <label for="servizi_indirizzo">Indirizzo (via/piazza)</label>
                <input type="text" name="dati[servizi_indirizzo]" id="servizi_indirizzo" class="form-control tc-required" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'servizi_indirizzo'); ?>">
            </div>

            <div class="col-12 col-md-4 mb-4">
                <label for="servizi_civico">Numero civico</label>
                <input type="text" name="dati[servizi_civico]" id="servizi_civico" class="form-control tc-required" placeholder="n. civico"  value="<?php tcGetFieldValue($fields,'servizi_civico'); ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <label for="servizi_citta">Città</label>
                <input type="text" name="dati[servizi_citta]" id="servizi_citta" class="form-control tc-required" placeholder="città"  value="<?php tcGetFieldValue($fields,'servizi_citta'); ?>">
            </div>

            <div class="col-6 col-md-4 mb-4">
                <label for="servizi_provincia">Provincia</label>
                <input type="text" name="dati[servizi_provincia]" id="servizi_provincia" class="form-control tc-required" placeholder="provincia" value="<?php tcGetFieldValue($fields,'servizi_provincia'); ?>" maxlength="2">
            </div>

            <div class="col-6 col-md-4 mb-4">
                <label for="servizi_cap">CAP</label>
                <input type="text" name="dati[servizi_cap]" id="servizi_cap" class="form-control tc-required" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'servizi_cap'); ?>">
            </div>
        <div>
    </fieldset>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard">Avanti <i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>