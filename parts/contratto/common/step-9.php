<?php 
    $fields = @$this->contrattoData['firme']; 
    $cbAccettazioneContratto = (bool) tcGetFieldValue($fields,"accettazione_contratto",false);
    $cbFirmaContratto = (bool) tcGetFieldValue($fields,"firma_contratto",false);
    $cbApprovazioneArticoliContratto = (bool) tcGetFieldValue($fields,"approvazione_articoli_contratto",false);
    showSteps(9);
?>
<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    
   <p>Scarica il pdf</p>
    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i tuoi consensi</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        
    </div>
</form>