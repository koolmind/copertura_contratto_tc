<?php 
error_log("Generazione contratto: " . $this->contrattoUID);
$pdf_file = generate_contratto_pdf($this->contrattoUID);

$modulo_variazione = TC_ADDONS_ROOT_URL . "/stuff/MD.CO.17.Mod_richiesta_variazione_offerta_commerciale_Rev02.pdf";
?>

<h3>Hai finalmente completato tutte le parti della tua proposta di contratto</h3>
<p>Per inoltrare la richiesta ai nostri uffici procedi come segue:
    <ul>
        <li><b>Scarica</b> il contratto cliccando sul bottone qui sotto.</li>
        <li><b>Stampalo e firmalo</b> in ogni sua parte.</li>
        <li><b>Invialo</b> a info@terrecablate.it, corredato da una copia del tuo documento di identità</li>
    </ul>
</p>


<div class="row mx-0 mb-4">
    <div class="col note_default ">
        <p><b>NOTA BENE:</b> Se sei già nostro cliente e stai effettuando una variazione contrattuale, è necessario scaricare il modulo aggiuntivo disponibile qui sotto. <br/>
        Assicurati di <b>compilare il modulo</b> e di <b>inviarlo in allegato</b> insieme al nuovo contratto.</p>
        <p class="mb-2 mt-2"><a href="<?php echo $modulo_variazione;?>" target="_blank" class="btn-download" style="padding:8px 16px;"><i class="fas fa-download"></i>&nbsp;Scarica il modulo di variazione contrattuale</a></p>
	</div>		
</div>

<p class="mb-4 mt-3"><a href="<?php echo $pdf_file;?>" target="_blank" class="btn-download"><i class="fas fa-download"></i>&nbsp;Scarica contratto in pdf</a></p>

<!-- 
<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
	<input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    
    <input type="hidden" id="tipocli" name="tipocli" value="aziende">

    

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro (solo x test Simone)</button>
    </div>

</form> -->

