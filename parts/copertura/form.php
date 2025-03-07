<?php
$tipoCli = isset($_GET['tc'])  ? $_GET['tc'] : null;
?>

 <form action="" class="copertura" id="frm-verifica-cop">					
    <!-- <h3>TIPOLOGIA CLIENTE</h3> -->
    <input type="hidden" name="vc" value="1" />
 
    <div class="form-row">
        <label>TIPOLOGIA CLIENTE</label>
        <div class="switch-field">    
            <input type="radio" class="cbTipoCli" id="tipo-a" name="tipoCli" value="aziende" <?php if($tipoCli=="aziende") {echo " checked";} ?>/>
            <label for="tipo-a" id="label-azienda">Azienda</label>
            <input type="radio" class="cbTipoCli" id="tipo-r" name="tipoCli" value="residenziali" <?php if($tipoCli=="residenziali") {echo " checked";} ?>/>
            <label for="tipo-r" id="label-residenziale" >Residenziale</label>
        </div>
    </div>
    
    <div class="form-row">
        <label>PROVINCIA</label>
        <div class="input-wrapper">
            <select name="provincia" id="selProvincia" class="input-large"></select>
        </div>
    </div>
    
    <div class="form-row">
        <label>COMUNE</label>
        <div class="input-wrapper">
            <select name="comune" id="selComune" class="input-large" disabled="disabled">
                <option value="">- seleziona comune -</option>
            </select>
        </div>
    </div>
    
    <div class="form-row">
        <label>INDIRIZZO</label>
        <input type="hidden" name="particella" id="particella" class="input-particella" readonly="readonly" aria-readonly="true">
        <div class="input-wrapper">
            <input type="text" name="selIndirizzo" id="indirizzo" class="input-large" placeholder="non inserire via/piazza/..." disabled="disabled">
        </div>
        <span class="help">indicare solo il nome, senza via/piazza/...</span>
    </div>

    <div class="form-row">
        <label>NUMERO CIVICO</label>
        <div class="input-wrapper">
            <select name="civico" id="selCivico" class="input-small" disabled="disabled"></select>
        </div>
        <span class="help">in caso di assenza del tuo numero civico segnacelo, scrivendo a <a href="mailto:info@terrecablate.it">info@terrecablate.it</a></span>
    </div>
    
    <hr />
    
    <div class="form-row sondaggio">
        <label>COME HAI CONOSCIUTO TERRECABLATE?</label>
        <small>Per motivi puramente statistici ci farebbe piacere se volessi indicarci come hai conosciuto l'offerta di Terrecablate. La tua risposta sarà utilizzata in maniera aggregata e non sarà collegata ai tuoi dati personali.</small>
        <div class="two-cols">
            <div class="input-wrapper">
                <select id="selCome" class="input-large">
                    <option value="">- scelgi un'opzione -</option>
                    <option value="passaparola">Passaparola (amici, familiari, colleghi)</option>
                    <option value="social">Social media (Facebook, Instagram, TikTok, ecc.)</option>
                    <option value="motori">Ricerca su Google o altri motori di ricerca</option>
                    <option value="pubblicita">Pubblicità (volantini, cartelloni, spot online o radio, sponsorizzazioni)</option>
                    <option value="cliente">Sono già cliente</option>
                    <option value="altro">Altro</option>
                </select>
            </div>
            <div class="input-wrapper hide">
                <input type="text" id="refAltro" class="input-large" placeholder="specifica, se vuoi..." maxlength="30" >
            </div>
            <input type="hidden" name="come" id="come" value=""/>
        </div>
    </div>
    

    <input type="hidden" name="tipoCli" value="<?php echo $tipoCli; ?>">
    <button type="submit" id="btnVerifica" class="btn-standard" name="vc" value="1">Verifica Copertura</button>
    <div id="preloader" class="nascondi"><div></div><div></div><div></div></div>
    <!-- <img src="https://www.terrecablate.it/wp-content/themes/terrecablate2017/newcopertura/img/preloader.gif" alt="" srcset="" id="preloader" class="nascondi"> -->
</form>
