<?php 
    $fields = @$this->contrattoData['attivazione']; 

    showSteps(2);
?>

<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
	<input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="attivazione">
    <input type="hidden" id="tipocli" name="tipocli" value="residenziale">
   
    <fieldset id="fields-indirizzo-attivazione" class="mt-3">
        <legend>2. Indirizzo di attivazione e fornitura dei servizi</legend>

        <div class="my-3">
            <h4>Conferma i tuoi dati</h4>
            <p>Controlla con attenzione se il CAP è corretto prima di proseguire.</p>
        </div>

        <div class="row">
            <div class="col-12 col-md-8 mb-4">
                <label for="attivazione_indirizzo">Indirizzo (via/piazza)</label>
                <input type="text" name="dati[attivazione_indirizzo]" id="attivazione_indirizzo" class="form-control tc-required" placeholder="via/piazza" maxlength="100" readonly="readonly" value="<?php tcGetFieldValue($fields,'attivazione_indirizzo'); ?>">
            </div>
        
            <div class="col-12 col-md-4 mb-4">
                <label for="attivazione_civico">Numero civico</label>
                <input type="text" name="dati[attivazione_civico]" id="attivazione_civico" class="form-control tc-required" placeholder="n. civico" maxlength="10"  readonly="readonly" value="<?php tcGetFieldValue($fields,'attivazione_civico'); ?>">
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <label for="attivazione_citta">Città</label>
                <input type="text" name="dati[attivazione_citta]" id="attivazione_citta" class="form-control tc-required" placeholder="città" maxlength="50" readonly="readonly" value="<?php tcGetFieldValue($fields,'attivazione_citta'); ?>">
            </div>
            
            <div class="col-6 col-md-4 mb-4">
                <label for="attivazione_provincia">Provincia</label>
                <input type="text" name="dati[attivazione_provincia]" id="attivazione_provincia" class="form-control tc-required" placeholder="provincia" maxlength="2" readonly="readonly" value="<?php tcGetFieldValue($fields,'attivazione_provincia'); ?>" maxlength="2">
            </div>
            
            <div class="col-6 col-md-4 mb-4">
                <label for="attivazione_cap">CAP</label>
                <input type="text" name="dati[attivazione_cap]" id="attivazione_cap" class="form-control tc-required" placeholder="c.a.p." maxlength="5" value="<?php tcGetFieldValue($fields,'attivazione_cap'); ?>">
            </div>
        </div>
    </fieldset>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>    
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard" disabled>Avanti <i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>