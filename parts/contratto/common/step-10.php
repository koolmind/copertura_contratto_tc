<?php 
$pdf_file = generate_contratto_pdf($this->contrattoUID);
?>

<h3>Hai finalmente completato tutte le parti della tua proposta di contratto</h3>
<p>Per inoltrare la richiesta ai nostri uffici procedi come segue:
    <ul>
        <li><b>Scarica</b> il contratto cliccando sul bottone qui sotto.</li>
        <li><b>Stampalo e firmalo</b> in ogni sua parte.</li>
        <li><b>Invialo</b> a info@terrecablate.it, corredato da una copia del tuo documento di identità</li>
    </ul>
</p>

<p><a href="<?php echo $pdf_file;?>" target="_blank" class="btn-download"><i class="fas fa-download"></i>&nbsp;Scarica contratto in pdf</a></p>

<!-- <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
	<input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    
    <input type="hidden" id="tipocli" name="tipocli" value="aziende">

    

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro (solo x test Simone)</button>
    </div>

</form> -->

