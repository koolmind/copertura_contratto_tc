<?php 
    $fields = @$this->contrattoData['consegna']; 
?>


<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
   
    <fieldset id="fields-indirizzo-attivazione">
        <legend>Servizi richiesti</legend>
        
        <button type="button">stesso indirizzo attivazione</button>

        <div class="form-group col-md-9">
            <label for="indirizzo_dispositivo">Indirizzo (via/piazza)</label>
            <input type="text" name="dati[indirizzo_dispositivo]" id="indirizzo_dispositivo" class="form-control" placeholder="via/piazza" value="<?php echo ( @$fields['indirizzo_dispositivo'] ) ? $fields['indirizzo_dispositivo'] : ''; ?>" >
        </div>

        <div class="form-group col-md-3">
            <label for="numero_civico_dispositivo">Numero civico</label>
            <input type="text" name="dati[numero_civico_dispositivo]" id="numero_civico_dispositivo" class="form-control" placeholder="n. civico"  value="<?php echo ( @$fields['numero_civico_dispositivo'] ) ? $fields['numero_civico_dispositivo'] : ''; ?>" >
        </div>

        <div class="form-group col-md-4">
            <label for="citta_dispositivo">Città</label>
            <input type="text" name="dati[citta_dispositivo]" id="citta_dispositivo" class="form-control" placeholder="città"  value="<?php echo ( @$fields['citta_dispositivo'] ) ? $fields['citta_dispositivo'] : ''; ?>" >
        </div>

        <div class="form-group col-md-4">
            <label for="provincia_dispositivo">Provincia</label>
            <input type="text" name="dati[provincia_dispositivo]" id="provincia_dispositivo" class="form-control" placeholder="provincia" value="<?php echo ( @$fields['provincia_dispositivo'] ) ? $fields['provincia_dispositivo'] : ''; ?>" >
        </div>

        <div class="form-group col-md-4">
            <label for="cap_dispositivo">CAP</label>
            <input type="text" name="dati[cap_dispositivo]" id="cap_dispositivo" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields['cap_dispositivo'] ) ? $fields['cap_dispositivo'] : ''; ?>" >
        </div>
    </fieldset>

    <div class="contratto_nav_buttons">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev">Indietro</button>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext">Avanti</button>
    </div>
</form>