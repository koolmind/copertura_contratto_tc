<?php 
    $fields = @$this->contrattoData['servizi']; 
?>


<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="servizi">
    <input type="hidden" id="tipocli" name="tipocli" value="aziende">
   
    <fieldset id="fields-indirizzo-dispositivo">
        <legend>Servizi richiesti</legend>
        
        <button type="button" id="fill-from-stored-data" data-sourcesection="attivazione">come attivazione</button>

        <div class="form-group col-md-9">
            <label for="servizi_indirizzo">Indirizzo (via/piazza)</label>
            <input type="text" name="dati[servizi_indirizzo]" id="servizi_indirizzo" class="form-control" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'servizi_indirizzo'); ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="servizi_civico">Numero civico</label>
            <input type="text" name="dati[servizi_civico]" id="servizi_civico" class="form-control" placeholder="n. civico"  value="<?php tcGetFieldValue($fields,'servizi_civico'); ?>">
        </div>

        <div class="form-group col-md-4">
            <label for="servizi_citta">Città</label>
            <input type="text" name="dati[servizi_citta]" id="servizi_citta" class="form-control" placeholder="città"  value="<?php tcGetFieldValue($fields,'servizi_citta'); ?>">
        </div>

        <div class="form-group col-md-4">
            <label for="servizi_provincia">Provincia</label>
            <input type="text" name="dati[servizi_provincia]" id="servizi_provincia" class="form-control" placeholder="provincia" value="<?php tcGetFieldValue($fields,'servizi_provincia'); ?>">
        </div>

        <div class="form-group col-md-4">
            <label for="servizi_cap">CAP</label>
            <input type="text" name="dati[servizi_cap]" id="servizi_cap" class="form-control" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'servizi_cap'); ?>">
        </div>
    </fieldset>

    <div class="contratto_nav_buttons">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev">Indietro</button>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext">Avanti</button>
    </div>
</form>