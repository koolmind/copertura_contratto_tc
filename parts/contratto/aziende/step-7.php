<?php 
    $fields = @$this->contrattoData['pagamento']; 

    showSteps(7);
?>
<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="accettazione>
    <input type="hidden" id="tipocli" name="tipocli" value="aziende">
   
    <fieldset id="fields-gdpr" class="mt-3">
        <legend>9. Firma della Proposta di Contratto</legend>
        
        <div class="row">
            <div class="col-12">
                <div class="d-flex gap-5 justify-content-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pagamento" id="pagamentoCC" value="cc">
                        <label class="form-check-label" for="pagamentoCC">Carta di credito</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pagamento" id="pagamentoSDD" value="sdd">
                        <label class="form-check-label" for="pagamentoSDD">Addebito automatico in conto corrente</label>
                    </div>
                </div>
                <p>
                qualcosa
                </p>
            </div>            
            
        </div>        
    </fieldset>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard jsCheckPagamentoFields">ACCETTA E CONCLUDI<i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>