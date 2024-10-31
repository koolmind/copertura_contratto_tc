<?php 
    global $sesso, $docs, $ruoli;

    showSteps(8);

    $offerta = $this->contrattoData['offerta'];
    $anagrafica = $this->contrattoData['anagrafica'];
    $attivazione = $this->contrattoData['attivazione'];
    $servizi = $this->contrattoData['servizi'];
    $migrazione = $this->contrattoData['migrazione'];
    $gdpr = $this->contrattoData['gdpr'];
    $pagamento = $this->contrattoData['pagamento'];

    // Output per la parte degli elenchi
    $elenchi = $this->contrattoData['elenchi'];
    $strElenchi = "<div class='col-12'>Il cliente ";
    $strElenchi .= $elenchi['elenchi_consenso'] ? "<b>DESIDERA</b>" : "<b>NON DESIDERA</b>" ;
    $strElenchi .= " che il suo nome sia presente nei nuovi elenchi telefonci.</div>";
    $servAbb = $elenchi['elenchi_servabbonati'] ? "DESIDERA" : "NON DESIDERA";
    $strElenchi .= sprintf("<div class='col-12'>Il cliente <b>%s</b> che i suoi dati vengano comunicati, su richiesta, da parte di un Servizio Abbonati.</div>", $servAbb);
    
    $datiElenco = "";
    $datiElenco .= $elenchi['elenchi_cognome'] ? "<div class='col-12 col-md-4'><b>Cognome/Rag.Sociale:</b> {$elenchi['elenchi_cognome']}</div>" : "";
    $datiElenco .= $elenchi['elenchi_nome'] ? "<div class='col-12 col-md-4'><b>Nome:</b> {$elenchi['elenchi_nome']}</div>" : "";
    $datiElenco .= $elenchi['elenchi_soloiniziale'] ? "<div class='col-12 col-md-4'><b>Solo Iniziale:</b> SI</b></div>": "";
    $datiElenco .= $elenchi['elenchi_numero'] ? "<div class='col-12'><b>Numero tel.:</b> {$elenchi['elenchi_numero']}</div>" : "";

    $addr = "";
    $addr .= $elenchi['elenchi_indirizzo'] ? "<b>Indirizzo:</b> {$elenchi['elenchi_indirizzo']}" : "";
    $addr .= $elenchi['elenchi_civico'] ? " n. {$elenchi['elenchi_civico']}" : "";
    $addr .= $elenchi['elenchi_cap'] ? ", {$elenchi['elenchi_cap']}" : "";
    $addr .= $elenchi['elenchi_citta'] ? " - {$elenchi['elenchi_citta']}  " : "";    
    $addr .= $elenchi['elenchi_provincia'] ? "({$elenchi['elenchi_provincia']})" : "";
    
    $altriDatiElenco = "";
    $altriDatiElenco .= $elenchi['elenchi_titolo'] ? "<div class='col-12'><b>Titolo di studio/Specializzazione:</b> {$elenchi['elenchi_titolo']}</div>" : "";
    $altriDatiElenco .= $elenchi['elenchi_titolo'] ? "<div class='col-12'><b>Professione/Attività:</b> {$elenchi['elenchi_professione']}</div>" : "";
    
    $strElenchi .= $datiElenco !="" ? "<hr class='my-2' /><div class='col-12'><small><b>Dati da pubblicare:</b></small></div>{$datiElenco}": "";
    $strElenchi .= $addr !="" ? "<div class='col-12'>{$addr}</div>": "";
    $strElenchi .= $altriDatiElenco !="" ? "<hr class='my-2' /><div class='col-12'><small><b>Dati aggiuntivi:</b></small></div> {$altriDatiElenco}<br>": "";

    $isAzienda = (bool) ($offerta['target']=='aziende');

    

?>
<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="container mb-5" id="contratto_form">
    <input type="hidden" name="action" value="submit_contratto_aziende">
    <input type="hidden" id="cuid" name="cuid" value="<?php echo $this->contrattoUID; ?>">
   
    <fieldset id="fields-riepilogo" class="mt-3">
        <legend>Controlla i dati inseriti</legend>
        

        <div class="row">
            <div class="col-12 col-md-8 order-1 order-md-0">
                
                <?php if($isAzienda): ?>
                <div class="anagrafica riepilogo-box">
                    <h4 class="titolo">DATI AZIENDALI</h4>    
                    <div class="row px-2">
                        <div class="col-12">
                            Rag. Sociale: <b><?php echo $anagrafica['rag_sociale'];?></b>
                        </div>

                        <div class="col-12">
                        <?php printf("Sede: <b>%s, %s - %s %s (%s)</b>",
                                $anagrafica['azienda_indirizzo'],
                                $anagrafica['azienda_civico'],
                                $anagrafica['azienda_cap'],
                                $anagrafica['azienda_citta'],
                                $anagrafica['azienda_provincia'] ); ?>
                        </div>

                        <div class="col-12 col-md-4">
                            P.IVA/C.F.: <b><?php echo $anagrafica['azienda_piva_cf'];?></b>
                        </div>
                        
                        <div class="col-12 col-md-4">
                            Cod. Destinatario: <b><?php echo $anagrafica['azienda_cod_destinatario']; ?></b>
                        </div>

                        <div class="col-12 col-md-4">
                            PEC: <b><?php echo $anagrafica['cliente_pec']; ?></b>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="anagrafica riepilogo-box">
                    <h4 class="titolo">DATI PERSONALI</h4>    

                    <?php 
                    if($isAzienda):
                        printf('<div class="row px-2"><div class="col-12">Ruolo: <b>%s</b></div></div>',$anagrafica['cliente_ruolo']);
                    endif;
                    ?>
                    <div class="row px-2">
                        <div class="col-12 col-md-4">
                            Cognome: <b><?php echo $anagrafica['cliente_cognome'] ?></b>
                        </div>
                        <div class="col-12 col-md-4">
                            Nome: <b><?php echo $anagrafica['cliente_nome'] ?></b>
                        </div>
                        <div class="col-12 col-md-4">
                            Sesso: <b><?php echo $sesso[$anagrafica['cliente_sesso']] ?></b>
                        </div>
                    </div>
                    
                    <div class="row px-2">
                        <div class="col-12 col-md-6">
                           Nato/a il: <b><?php echo $anagrafica['cliente_data_nascita'] ?></b>
                        </div>
                        <div class="col-12 col-md-6">
                           A: <?php printf("<b>%s (%s)</b>",$anagrafica['cliente_luogo_nascita'], $anagrafica['cliente_provincia_nascita']);?>
                        </div>
                        <div class="col-12 col-md-6">
                            Nazionalità: <b><?php echo $anagrafica['cliente_nazionalita'] ?></b>
                        </div>
                        <div class="col-12 col-md-6">
                            C.F.: <b><?php echo $anagrafica['cliente_cod_fiscale'] ?></b>
                        </div>
                    </div>

                    <div class="row px-2">
                        <div class="col-12">
                        <?php printf("Residenza: <b>%s, %s - %s %s (%s)</b>",
                                $anagrafica['cliente_indirizzo'],
                                $anagrafica['cliente_civico'],
                                $anagrafica['cliente_cap'],
                                $anagrafica['cliente_citta'],
                                $anagrafica['cliente_provincia'] );
                        ?>
                        </div>
                    </div>

                    <div class="row px-2">                        
                        <div class="col-12 col-md-6">
                            Email: <b><?php echo $anagrafica['cliente_email'] ?></b>
                        </div>   
                        
                        <?php if(!$isAzienda): ?>
                        <div class="col">
                            PEC: <b><?php echo $anagrafica['cliente_pec']; ?></b>
                        </div>                   
                        <?php endif; ?>  

                        <div class="col-12 col-md-6">
                            Cellulare: <b><?php echo $anagrafica['cliente_cellulare'] ?></b>
                        </div>                        
                        <div class="col-12 col-md-6">
                            Telefono: <b><?php echo $anagrafica['cliente_telefono'] ?></b>
                        </div>                        
                        <div class="col-12 col-md-6">
                            Fax: <b><?php echo $anagrafica['azienda_fax'] ?></b>
                        </div>
                    </div>

                    <div class="row px-2">                        
                        <div class="col-12 col-md-6">
                            Tipo documento: <b><?php echo $docs[$anagrafica['cliente_tipo_documento']] ?></b>
                        </div>
                        <div class="col-12 col-md-6">
                            Num. documento: <b><?php echo $anagrafica['cliente_doc_numero'] ?></b>
                        </div>
                        <div class="col-12">
                            Emesso da: <b><?php echo $anagrafica['cliente_doc_emittente'] ?></b>
                        </div>
                        <div class="col-12 col-md-6">
                            Emesso il: <b><?php echo $anagrafica['cliente_doc_rilascio'] ?></b>
                        </div>
                        <div class="col-12 col-md-6">
                            Scade il: <b><?php echo $anagrafica['cliente_doc_scadenza'] ?></b>
                        </div>
                    </div>
                </div>

                <div class="attivazione riepilogo-box">
                    <h4 class="titolo">ATTIVAZIONE DEI SERVIZI</h4>    
                    <div class="row px-2">
                        <div class="col-12">
                        <?php printf("La linea sarà attivata in:<br> <b>%s, %s - %s %s (%s)</b>",
                                $attivazione['attivazione_indirizzo'],
                                $attivazione['attivazione_civico'],
                                $attivazione['attivazione_cap'],
                                $attivazione['attivazione_citta'],
                                $attivazione['attivazione_provincia'] );
                        ?>
                        </div>
                    </div>                    
                </div>

                <div class="consegna riepilogo-box">
                    <h4 class="titolo">CONSEGNA APPARECCHIATURE</h4>    
                    <div class="row px-2">
                        <div class="col-12">
                        <?php printf("Il modem e gli accessori saranno consegnati in:<br> <b>%s, %s - %s %s (%s)</b>",
                                $servizi['servizi_indirizzo'],
                                $servizi['servizi_civico'],
                                $servizi['servizi_cap'],
                                $servizi['servizi_citta'],
                                $servizi['servizi_provincia'] );
                        ?>
                        </div>
                    </div>                    
                </div>

                <div class="consegna riepilogo-box">
                    <h4 class="titolo">MIGRAZIONE/ATTIVAZIONE LINEA</h4>    
                    <div class="row px-2">
                        <div class="col-12">
                            Il cliente ha richiesto <b>
                            <?php 
                            if(isset($migrazione['linea_migrazione']) && $migrazione['linea_migrazione'] == '1') echo " la MIGRAZIONE della sua linea ";
                            if(isset($migrazione['linea_nuova']) && $migrazione['linea_nuova'] == '1') echo " l'ATTIVAZIONE di una nuova linea ";

                            if($migrazione['linea_portability'] == '1')
                                echo " CON PORTABILITÀ del suo numero.";
                            else 
                                echo " SENZA PORTABILITÀ del suo numero."; ?>
                            </b>
                        </div>

                        <?php if($migrazione['linea_portability'] == '1') { ?>
                        
                            <?php echo isset($migrazione['linea_codice_migrazione_1']) && $migrazione['linea_codice_migrazione_1']  ? '<div class="col-12 col-md-6">COD.MIGRAZIONE #1: <b>'. $migrazione['linea_codice_migrazione_1'] .'</b></div>' : ''; ?>
                            <?php echo isset($migrazione['linea_codice_migrazione_2']) && $migrazione['linea_codice_migrazione_2']  ? '<div class="col-12 col-md-6">COD.MIGRAZIONE #2: <b> '. $migrazione['linea_codice_migrazione_2'] .'</b></div>' : ''; ?>
                                                
                            <?php echo isset($migrazione['linea_numero_1']) && $migrazione['linea_numero_1']  ? '<div class="col-12 col-md-6">Numero #1:<b> '. $migrazione['linea_numero_1'] .'</b></div>' : ''; ?>
                            <?php echo isset($migrazione['linea_numero_2']) && $migrazione['linea_numero_2'] ? '<div class="col-12 col-md-6">Numero #2:<b> '. $migrazione['linea_numero_2'] .'</b></div>' : ''; ?>
                            <?php echo isset($migrazione['linea_numero_3']) && $migrazione['linea_numero_3'] ? '<div class="col-12 col-md-6">Numero #3:<b> '. $migrazione['linea_numero_3'] .'</b></div>' : ''; ?>
                            <?php echo isset($migrazione['linea_numero_4']) && $migrazione['linea_numero_4'] ? '<div class="col-12 col-md-6">Numero #4:<b> '. $migrazione['linea_numero_4'] .'</b></div>' : ''; ?>
                        <?php } ?>
                    </div>            
                </div>

                <div class="intestatario-linea riepilogo-box">
                    <h4 class="titolo">INTESTATARIO LINEA</h4>    
                
                    <?php if($isAzienda): ?>
                    <div class="row px-2">
                        <div class="col-12">
                            Rag. Sociale: <b><?php echo $migrazione['linea_rag_sociale'];?></b>
                        </div>

                        <div class="col-12">
                        <?php printf("Sede: <b>%s, %s - %s %s (%s)</b>",
                                $migrazione['linea_azienda_indirizzo'],
                                $migrazione['linea_azienda_civico'],
                                $migrazione['linea_azienda_cap'],
                                $migrazione['linea_azienda_citta'],
                                $migrazione['linea_azienda_provincia'] ); ?>
                        </div>

                        <div class="col-12">
                            P.IVA/C.F.: <b><?php echo $migrazione['linea_azienda_piva_cf'];?></b>
                        </div>
                    </div>

                    <div class="row px-2">
                        <div class="col-12">Ruolo: <b><?php echo $migrazione['linea_cliente_ruolo']; ?></b></div>
                    </div>
                    <?php endif; ?>

                
                    <div class="row px-2">
                        <div class="col-12 col-md-4">
                            Cognome: <b><?php echo $migrazione['linea_cliente_cognome'] ?></b>
                        </div>
                        <div class="col-12 col-md-4">
                            Nome: <b><?php echo $migrazione['linea_cliente_nome'] ?></b>
                        </div>
                        <div class="col-12 col-md-4">
                            Sesso: <b><?php echo $sesso[$migrazione['linea_cliente_sesso']] ?></b>
                        </div>
                    </div>
                    
                    <div class="row px-2">
                        <?php if($isAzienda): ?>
                        <div class="col-12 col-md-6">
                           Nato/a il: <b><?php echo $migrazione['linea_cliente_data_nascita'] ?></b>
                        </div>
                        <div class="col-12 col-md-6">
                           A: <?php printf("<b>%s (%s)</b>",$migrazione['linea_cliente_luogo_nascita'], $migrazione['linea_cliente_provincia_nascita']);?>
                        </div>
                        <div class="col-12 col-md-6">
                            Nazionalità: <b><?php echo $migrazione['linea_cliente_nazionalita'] ?></b>
                        </div>
                        <?php endif; ?>
                        <div class="col-12 col-md-6">
                            C.F.: <b><?php echo $migrazione['linea_cliente_cod_fiscale'] ?></b>
                        </div>
                    </div>

                    <div class="row px-2">
                        <div class="col-12">
                        <?php printf("Residenza/Domicilio: <b>%s, %s - %s %s (%s)</b>",
                                $migrazione['linea_cliente_indirizzo'],
                                $migrazione['linea_cliente_civico'],
                                $migrazione['linea_cliente_cap'],
                                $migrazione['linea_cliente_citta'],
                                $migrazione['linea_cliente_provincia'] );
                        ?>
                        </div>
                    </div>

                    <?php if($isAzienda): ?>
                    <div class="row px-2">                        
                        <div class="col-12 col-md-6">
                            Tipo documento: <b><?php echo $docs[$migrazione['linea_cliente_tipo_documento']] ?></b>
                        </div>
                        <div class="col-12 col-md-6">
                            Num. documento: <b><?php echo $migrazione['linea_cliente_doc_numero'] ?></b>
                        </div>
                        <div class="col-12">
                            Emesso da: <b><?php echo $migrazione['linea_cliente_doc_emittente'] ?></b>
                        </div>
                        <div class="col-12 col-md-6">
                            Emesso il: <b><?php echo $migrazione['linea_cliente_doc_rilascio'] ?></b>
                        </div>
                        <div class="col-12 col-md-6">
                            Scade il: <b><?php echo $migrazione['linea_cliente_doc_scadenza'] ?></b>
                        </div>
                    </div>                
                    <?php endif; ?>
                </div>

                <div class="gdpr riepilogo-box">
                    <h4 class="titolo">TRATTAMENTO DEI DATI</h4>    
                    <div class="row px-2">
                        <div class="col-12">
                        <p>Il cliente: <b><?php echo $gdpr['consenso_marketing'] == '1' ? "PRESTA IL CONSENSO ": "NON PRESTA IL CONSENSO" ?></b> al trattamento dei suoi dati per finalità di MARKETING.</p>
                        <p>Il cliente: <b><?php echo $gdpr['consenso_profilazione'] == '1' ? "PRESTA IL CONSENSO ": "NON PRESTA IL CONSENSO" ?></b> al trattamento dei suoi dati per finalità di PROFILAZIONE.</p>
                        </div>
                    </div>                    
                </div>

                <div class="pagamento riepilogo-box">
                    <h4 class="titolo">MODALITÀ DI PAGAMENTO</h4>    
                    <div class="row px-2">
                        <div class="col-12">
                            <?php 
                            if($pagamento['metodo_pagamento'] == 'cc'){
                                echo "Il cliente chiede che le sue fatture vengano addebitate sulla sua <b>CARTA DI CREDITO</b></p>";
                            }
                            
                            if($pagamento['metodo_pagamento'] == 'sdd') {
                                echo "Il cliente chiede che le sue fatture vengano addebitate direttamente sul <b>CONTO CORRENTE tramite SDD </b></p>";
                            }
                            ?>
                        </div>
                        <div class="col-12">
                            <b>INTESTATARIO DEL CONTO: </b> <?php echo $pagamento['sdd_intestatario_cognome_nome'];?>
                        </div>
                        <div class="col-12">
                            <b>P.IVA/C.F. : </b> <?php echo $pagamento['sdd_intestatario_codfisc_piva'];?>
                        </div>
                        <div class="col-12">
                            <b>IBAN : </b> <?php echo $pagamento['sdd_iban'];?>
                        </div>

                        <hr class="my-2">

                        <div class="col-12">
                            <b>SOTTOSCRITTORE: </b> <?php echo $pagamento['sdd_sottoscrittore_cognome_nome'];?>
                        </div>
                        <div class="col-12">
                            <b>P.IVA/C.F. : </b> <?php echo $pagamento['sdd_sottoscrittore_codfisc'];?>
                        </div>

                        <?php if($pagamento['sdd_titolare_linea']): ?>
                        
                        <hr class="my-2">
                        
                        <div class="col-12">
                            <b>LINEA/CONTRATTO: </b> <?php echo $pagamento['sdd_titolare_linea'];?>
                        </div>
                        <div class="col-12">
                            <b>COGNOME e Nome / Ragione sociale: </b> <?php echo $pagamento['sdd_titolare_cognome_nome'];?>
                        </div>
                        <div class="col-12">
                            <b>P.IVA/C.F. : </b> <?php echo $pagamento['sdd_titolare_codfisc_piva'];?>
                        </div>
                        <div class="col-12">
                            <b>Recapito telefonico alternativo: </b> <?php echo $pagamento['sdd_titolare_recapito'];?>
                        </div>
                        <?php endif; ?>
                    </div>                    
                </div>

                <div class="elenchi riepilogo-box">
                    <h4 class="titolo">INSERIMENTO NEL DB UNICO ELENCHI TELEFONICI</h4>    
                    
                    <div class="row px-2">
                        <?php echo $strElenchi; ?>
                        
                        <hr class="my-2" />
                        <div class="col-12">
                            Il cliente: <b><?php echo $elenchi['elenchi_nomedanumero'] == '1' ? "DESIDERA ": "NON DESIDERA" ?></b> che si possa risalire al suoi nome a partire da altri dati.
                        </div>
                        <div class="col-12">
                            Il cliente: <b><?php echo $elenchi['elenchi_posta'] == '1' ? "DESIDERA ": "NON DESIDERA" ?></b> ricevere pubblicità cartacea per posta.
                        </div>
                    </div>                    
                </div>


            </div><!-- colonna sinistra -->
            
            
            <div class="col-12 col-md-4 order-0 order-md-1 riepilogo-box b-offerta">
                <h4 class="titolo"><small>Hai scelto di acquistare</small><br/><?php echo $offerta['nomeofferta'];?></h4>
                <div class="row px-3 mt-4 mb-2">
                    <div class="col-9">Canone mensile</div>
                    <div class="col-3 text-end"><?php echo $offerta['canone'];?> €</div>
                    <?php $subTotale = floatval(preg_replace('/,/i', '.', $offerta['canone']));?>
                    
                </div>
                
                <?php if (isset($offerta['opzioni']) && count($offerta['opzioni'])): ?>
                    <div class="px-3 mt-1 mb-3" id="riepilogo-opzioni">
                        <strong>OPZIONI</strong>                    
                    <?php 
                        foreach ($offerta['opzioni'] as $opzione): 
                            $strName = $opzione['name'];
                            $strQty = intval($opzione['qty']) > 1 ? ' (x'.$opzione['qty'].')' : '' ;
                            $optCost = $opzione['cost'] * $opzione['qty'];
                            $strCost = number_format($optCost, 2,",",".");

                            $subTotale += $optCost ;
                    ?>
                            <div class="row pl-1">
                                <div class="col-9"><?php echo $strName;?> <?php echo $strQty;?> </div>
                                <div class="col-3 text-end"><?php echo $strCost;?> €</div>
                            </div>
                <?php   endforeach; ?>
                        </div>
                <?php endif; 
                    $strSubTotale = number_format($subTotale, 2,",",".");
                ?>

                <div class="row px-3 mt-4 mb-2 pt-1" style="border-top:1px solid #c9c9c9";>
                    <div class="col-9"><b>Totale mensile</b></div>
                    <div class="col-3 text-end"><?php echo $strSubTotale;?> €</div>
                </div>

                <div class="row px-3">
                    <div class="col-9"><b>Attivazione</b></div>
                    <div class="col-3 text-end">
                        <?php echo floatval($offerta['attivazione']) == 0 ? 'GRATIS' : $offerta['attivazione'] ." €";?>
                    </div>
                </div>

                <?php if(isset($migrazione['linea_nuova']) && $migrazione['linea_nuova'] == '1'): ?>
                <div class="row px-3">
                    <div class="col-9"><b>Maggiorazione attivazione nuova linea</b></div>
                    <div class="col-3 text-end">25,00 €</div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        

    </fieldset>

    <div class="contratto_nav_buttons d-flex justify-content-between mt-4">
        <button type="submit" id="btnContrattoPrev" name="btnContrattoPrev" class="btn-standard"><i class="fas fa-long-arrow-alt-left"></i> Indietro</button>
        <div class="info_messages">
            <span class="text-danger" id="errLabel">controlla i dati inseriti</span>
            <span class="saving hide" id="loadingLabel">salvataggio in corso...</span>
        </div>
        <button type="submit" id="btnContrattoNext" name="btnContrattoNext" class="btn-standard" disabled>I DATI SONO CORRETTI<i class="fas fa-long-arrow-alt-right"></i></button>
    </div>
</form>