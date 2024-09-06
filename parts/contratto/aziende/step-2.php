<?php 
    $fields = @$this->contrattoData['attivazione']; 
?>

<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="submit_contratto_aziende">
	<input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="attivazione">
    <input type="hidden" id="tipocli" name="tipocli" value="aziende">
   
    <fieldset id="fields-indirizzo-attivazione">
        <legend>Indirizzo di attivazione e fornitura dei servizi</legend>

        <button type="button" id="fill-from-stored-data" data-sourcesection="anagrafica">stesso indirizzo sede</button>

        <div class="form-group col-md-9">
            <label for="attivazione_indirizzo">Indirizzo (via/piazza)</label>
            <input type="text" name="dati[attivazione_indirizzo]" id="attivazione_indirizzo" class="form-control" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'attivazione_indirizzo'); ?>">
            <small class="text-danger form-message">Campo richiesto</small>
        </div>
        
        <div class="form-group col-md-3">
            <label for="attivazione_civico">Numero civico</label>
            <input type="text" name="dati[attivazione_civico]" id="attivazione_civico" class="form-control" placeholder="n. civico" value="<?php tcGetFieldValue($fields,'attivazione_civico'); ?>">
            <small class="text-danger form-message">Campo richiesto</small>
        </div>
        
        <div class="form-group col-md-4">
            <label for="attivazione_citta">Città</label>
            <input type="text" name="dati[attivazione_citta]" id="attivazione_citta" class="form-control" placeholder="città" value="<?php tcGetFieldValue($fields,'attivazione_citta'); ?>">
            <small class="text-danger form-message">Campo richiesto</small>
        </div>
        
        <div class="form-group col-md-4">
            <label for="attivazione_provincia">Provincia</label>
            <input type="text" name="dati[attivazione_provincia]" id="attivazione_provincia" class="form-control" placeholder="provincia" value="<?php tcGetFieldValue($fields,'attivazione_provincia'); ?>">
            <small class="text-danger form-message">Campo richiesto</small>
        </div>
        
        <div class="form-group col-md-4">
            <label for="attivazione_cap">CAP</label>
            <input type="text" name="dati[attivazione_cap]" id="attivazione_cap" class="form-control" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'attivazione_cap'); ?>">
            <small class="text-danger form-message">Campo richiesto</small>
        </div>
    </fieldset>

    <div class="contratto_nav_buttons">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev">Indietro</button>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext">Avanti</button>
    </div>
</form>