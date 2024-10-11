<?php 
    $fields = @$this->contrattoData['elenchi']; 
    $rbElenchi =  tcGetFieldValue($fields,"elenchi_consenso",false);
    $cbIniziale =  tcGetFieldValue($fields,"elenchi_soloiniziale",false);
    $rbNomeDaNumero =  tcGetFieldValue($fields,"elenchi_nomedanumero",false);
    $rbPosta =  tcGetFieldValue($fields,"elenchi_posta",false);

    showSteps(7);
?>
<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
    <input type="hidden" id="section" name="section" value="elenchi">
    <!-- <input type="hidden" id="tipocli" name="tipocli" value="aziende"> -->
   
    <fieldset id="fields-elenchi" class="mt-3">
        <legend>7. Richiesta inserimento/modifica/revoca dati nei nuovi elenchi telefonici</legend>

        <div class="row mx-0 mb-4">
			<div class="col note_default">
                <p class="mb-2">Gentile cliente,<br>
                Lei può decidere, rispondendo alle domande di seguito riportate, se ed in quale modo far inserire il Suo nome e altri Suoi dati personali negli elenchi telefonici. 
                Se Lei è un nuovo abbonato e risponde "NO" i Suoi dati non saranno inseriti. La scelta che sta per fare potrà in futuro essere liberamente cambiata.</p>
                <p class="mb-2">I Suoi dati potranno essere utilizzati per le normali comunicazioni tra persone e, in base a recenti modifiche legislative, anche per chiamate pubblicitarie, a meno
                    che Lei non decida di iscriversi al “Registro pubblico delle opposizioni” per dire no alle telefonate promozionali.</p>
                <p class="mb-2">Cinque sono i modi per iscriversi a questo Registro:</p>
                <ul>
                    <li>Per raccomandata, scrivendo a:<br>
                        GESTORE DEL REGISTRO PUBBLICO DELLE OPPOSIZIONI - ABBONATI UFFICIO ROMA NOMENTANO<br>
                        CASELLA POSTALE 7211 - 00162 ROMA (RM)
                    </li>
                    <li>via fax: 06.5422 4822</li>
                    <li>Per e-mail: abbonati.rpo@fub.it</li>
                    <li>Tramite il numero verde: 800.265.265</li>
                    <li>Compilando il modulo elettronico disponibile nella apposita “area abbonato” sul sito:http://www.registrodelleopposizioni.it</li>
                </ul>

                <p class="mb-2">Presso i seguenti recapiti Lei potrà: avere una ulteriore copia di questo modulo; modificare liberamente, e senza alcun onere,
                    tutte le scelte da Lei effettuate; esercitare i Suoi diritti riconosciuti dal Codice in materia di protezione dei dati personali.</p>
                <p class="mb-2">Sito web: www.terrecablate.it<br>
                Indirizzo Postale: Terrecablate Reti e Servizi S.r.l. – Viale Toselli 9/A – 53100 Siena<br>
                Per altre informazioni: Servizio Clienti 800078100 </p>
                <p class="mb-2">Per l’esercizio dei diritti di cui agli articoli 15.22 del Regolamento UE 679/2016 Lei potrà rivolgersi ai recapiti indicati nell'informativa in allegato.</p>
                <p class="my-5">
                <b>Dal 1 Novembre 2011</b><br>
                gli abbonati alla telefonia fissa o mobile che abbiano cambiato operatore telefonico richiedendo la conservazione del numero (c.d. Number Portability) e non
                rispondano alle domande del questionario e non lo riconsegnino, mantengono le scelte fatte con il precedente operatore relativamente alla presenza in elenco
                dei dati e delle informazioni già fornite. I dati saranno utilizzati solo con modalità strettamente funzionali per prestare i servizi richiesti dal Cliente, o per quali
                ha manifestato il consenso.
                </p>
			</div>		
		</div>
        
        <div class="row">
            <div class="col-12 mb-4">
                <h4 class="titolo-sez text-center">1. Vuole che il suo nome sia presente nei nuovi elenchi telefonici?</h4>
                <div class="d-flex gap-5 justify-content-center mb-3">
                    <div class="form-check">                    
                        <input class="form-check-input" type="radio" name="dati[elenchi_consenso]" id="consensoElenchiOK" value="1" <?php echo $rbElenchi === "1" ? ' checked ' : ''; ?> >
                        <label class="form-check-label" for="consensoElenchiOK">SI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dati[elenchi_consenso]" id="consensoElenchiKO" value="0" <?php echo $rbElenchi === "0"  ? ' checked ' : ''; ?> >
                        <label class="form-check-label" for="consensoElenchiKO">NO</label>
                    </div>
                </div>
                <h4 class="titoletto smaller"><b>SE HA RISPOSTO NO</b>: può fermarsi qui e non rispondere alle altre domande oppure, pur avendo deciso di non figurare nei nuovi elenchi, può chiedere che i dati che indicherà più avanti 
                possano essere forniti a chi ne faccia richiesta ad un Servizio di informazione abbonati. Se è interessato, barri la casella seguente e indichi ai punti 2, 3 del questionario i dati 
                che non vuole siano pubblicati negli elenchi, ma vuole che siano forniti a chi li richiede.</h4>
                <div class="form-check check-zone mb-2">
                    <input class="form-check-input" type="checkbox" name="dati[elenchi_servabbonati]" id="consensoAbbonati" value="1">
                    <label class="form-check-label" for="consensoAbbonati">Desidero che i miei dati vengano forniti, se richiesti, ad un Servizio Abbonati</label>
                </div>
                <h4 class="titoletto smaller"><b>SE HA RISPOSTO SI, PROSEGUA CON LE DOMANDE SUCCESSIVE</b></h4>
            </div>
        </div>

        <h4 class="titolo-sez text-center">2. Con quali dati vuole essere inserito negli elenchi?</h4>
        <h4 class="titoletto smaller">Di seguito indichi i dati con i quali vuole essere inserito all’interno dei nuovi elenchi. Può decidere di comparire senza la Via e il Numero Civico, o solamente senza quest’ultimo, 
            non compilando i relativi campi. Devono essere indicati i dati dell’intestatario.</h4>
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <label for="elenchi_cognome">Cognome / Ragione sociale:</label>
                <input type="text" name="dati[elenchi_cognome]" id="elenchi_cognome" class="form-control" value="<?php tcGetFieldValue($fields,'elenchi_cognome'); ?>">
            </div>
            <div class="col-12 col-md-4 mb-4">
                <label for="elenchi_nome">Nome:</label>
                <input type="text" name="dati[elenchi_nome]" id="elenchi_nome" class="form-control" value="<?php tcGetFieldValue($fields,'elenchi_nome'); ?>">
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="form-check d-flex align-items-center gap-2">
                    <input class="form-check-input" type="checkbox" name="dati[elenchi_soloiniziale]" id="elenchi_soloiniziale" value="1" <?php echo $cbIniziale === "1" ? ' checked ' : ''; ?>>
                    <label class="form-check-label" for="elenchi_soloiniziale"> Barri la casella per comparire solo con l’iniziale del nome (es.: per Lorenzo, L.). Se non barra la casella il nome verrà pubblicato per esteso</label>
                </div>
            </div>
        </div>

        <div class="row">
			<div class="tc-input col-12 mb-4">
				<label for="elenchi_numero">Numero telefonico</label>
				<input type="text" name="dati[elenchi_numero]" id="elenchi_numero" class="form-control" placeholder="" value="<?php tcGetFieldValue($fields,'elenchi_numero'); ?>">
			</div>		
		</div>

        <div class="row">
			<div class="tc-input col-12 col-md-8 mb-4">
				<label for="elenchi_indirizzo">Indirizzo (via/piazza)</label>
				<input type="text" name="dati[elenchi_indirizzo]" id="elenchi_indirizzo" class="form-control" placeholder="via/piazza" value="<?php tcGetFieldValue($fields,'elenchi_indirizzo'); ?>">
			</div>
		
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="elenchi_civico">Numero civico</label>
				<input type="text" name="dati[elenchi_civico]" id="elenchi_civico" class="form-control" placeholder="n. civico" value="<?php tcGetFieldValue($fields,'elenchi_civico'); ?>">
			</div>
		</div>

		<div class="row">
			<div class="tc-input col-12 col-md-4 mb-4">
				<label for="elenchi_citta">Comune</label>
				<input type="text" name="dati[elenchi_citta]" id="elenchi_citta" class="form-control" placeholder="città" value="<?php tcGetFieldValue($fields,'elenchi_citta'); ?>">
			</div>
		
            <div class="tc-input col-6 col-md-4 mb-4">
				<label for="elenchi_cap">CAP</label>
				<input type="text" name="dati[elenchi_cap]" id="elenchi_cap" class="form-control" placeholder="c.a.p." value="<?php tcGetFieldValue($fields,'elenchi_cap'); ?>">
			</div>

			<div class="tc-input col-6 col-md-4 mb-4">
				<label for="elenchi_provincia">Provincia</label>
				<input type="text" name="dati[elenchi_provincia]" id="elenchi_provincia" class="form-control" placeholder="provincia" value="<?php tcGetFieldValue($fields,'elenchi_provincia'); ?>" maxlength="2">
			</div>
		</div>

        <h4 class="titolo-sez text-center">3. Vuole che negli elenchi figurino altri suoi dati?</h4>
        <h4 class="titoletto smaller">Può chiedere che negli elenchi siano inseriti anche altri suoi dati. Li indichi qui sotto.</h4>
        <div class="row">
            <div class="col-12 mb-4">
                <label for="elenchi_titolo">Titolo di studio / Specializzazione:</label>
                <input type="text" name="dati[elenchi_titolo]" id="elenchi_titolo" class="form-control" value="<?php tcGetFieldValue($fields,'elenchi_titolo'); ?>">
                <span class="note_info">Può indicarlo in forma abbreviata (es.: dott., prof., avv., ing., rag., geom.)</span>
            </div>
            <div class="col-12 mb-4">
                <label for="elenchi_professione">Professione / Attività:</label>
                <input type="text" name="dati[elenchi_professione]" id="elenchi_professione" class="form-control" value="<?php tcGetFieldValue($fields,'elenchi_professione'); ?>">
                <span class="note_info">(Solo per chi svolge attività di rilevanza economica, non previsto per utenze residenziali)</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <h4 class="titolo-sez text-center">4. Desidera che una persona che conosce il suo numero di telefono possa risalire al suo nome?</h4>
                <h4 class="titoletto smaller">Una persona che non conosce o che non ricorda il suo nome, potrebbe risalire ad esso sulla base del suo numero telefonico o di un altro suo dato. È d’accordo?</h4>
                <div class="d-flex gap-5 justify-content-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dati[elenchi_nomedanumero]" id="consensoNomeDaNumeroOK" value="1" <?php echo $rbNomeDaNumero === "1" ? ' checked ' : ''; ?> >
                        <label class="form-check-label" for="consensoNomeDaNumeroOK">SI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dati[elenchi_nomedanumero]" id="consensoNomeDaNumeroKO" value="0" <?php echo $rbNomeDaNumero === "0"  ? ' checked ' : ''; ?> >
                        <label class="form-check-label" for="consensoNomeDaNumeroKO">NO</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <h4 class="titolo-sez text-center">5. Vuole ricevere pubblicità per posta?</h4>
                <h4 class="titoletto smaller">Lei ha il diritto di dire SI o NO all'invio di pubblicità, promozioni, offerte commerciali, ecc. tramite posta cartacea al Suo indirizzo indicato negli elenchi.<br>
                    SONO D'ACCORDO CON L'USO DEL MIO INDIRIZZO PER L'INVIO DI POSTA CARTACEA PUBBLICITARIA:<br>
                    Se SI, iI simbolo della bustina indicherà questa Sua scelta.</h4>
                <div class="d-flex gap-5 justify-content-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dati[elenchi_posta]" id="consensoPostaOK" value="1" <?php  echo $rbPosta === "1" ? ' checked ' : ''; ?> >
                        <label class="form-check-label" for="consensoPostaOK">SI</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="dati[elenchi_posta]" id="consensoPostaKO" value="0" <?php echo $rbPosta === "0"  ? ' checked ' : ''; ?> >
                        <label class="form-check-label" for="consensoPostaKO">NO</label>
                    </div>
                </div>
            </div>
        </div>
     
    </fieldset>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard jsCheckElenchiFields" disabled>Avanti <i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>