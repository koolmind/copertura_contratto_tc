<?php 
$pdf_file = generate_contratto_pdf($this->contrattoUID);
?>


<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
	<input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    
    <input type="hidden" id="tipocli" name="tipocli" value="aziende">

    <p><a href="<?php echo $pdf_file;?>" target="_blank">Scarica contratto in pdf</a></p>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro (solo x debug)</button>
        <!-- <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i tuoi consensi</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div> -->
        <!-- <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard" disabled>ACCETTA E CONCLUDI<i class="fas fa-long-arrow-alt-right"></i></button> -->
    </div>

</form>

