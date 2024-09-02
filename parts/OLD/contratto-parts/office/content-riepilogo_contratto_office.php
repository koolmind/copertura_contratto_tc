<?php 
/* 
 * Template part > Riepilogo Contratto
 */
?>
<section id="main-content">
    
	<div class="container contratti-wrap contratti-A contratto-riepilogo">
		<div class="row">
			<h1 class="fontdin">MyOffice <small>- PROPOSTA DI CONTRATTO PER LA TUA IMPRESA</small></h1>
			<p class="fontdin">RIEPILOGO DATI. Verifica i tuoi dati e premi GENERA IL CONTRATTO per scaricare il pdf.</p> 
			<hr style="border-width: 4px; border-color: rgb(235, 110, 43);" />

			<section class="clearfix">
				<h3>1. Dati anagrafici e sede legale dell'azienda</h3>
				<div class="col-md-12 riepilogo"><strong>Denominazione/Ragione sociale o Cognome: </strong><?php echo $fields['cognome_azienda'];?></div>
				<div class="col-md-12 riepilogo"><strong>Nome: </strong><?php echo $fields['nome_azienda'];?></div>
				<div class="col-md-12 riepilogo"><strong>Sede Via/Piazza: </strong><?php echo $fields['indirizzo_azienda'];?> n. <?php echo $fields['numero_civico_azienda'];?>, <?php echo $fields['citta_azienda'];?>, <?php echo $fields['provincia_azienda'];?> <?php echo $fields['cap_azienda'];?></div>
				<div class="col-md-6 riepilogo"><strong>P.IVA o Codice Fiscale: </strong><?php echo $fields['codice_fiscale_azienda'];?></div>
				<div class="col-md-4 riepilogo"><strong>Cell: </strong><?php echo $fields['cell_cliente'];?></div>
				<div class="col-md-4 riepilogo"><strong>Tel: </strong><?php echo (@$fields['tel_cliente']) ? $fields['tel_cliente'] : "";?></div>
				<div class="col-md-4 riepilogo"><strong>Fax: </strong><?php echo (@$fields['fax_cliente']) ? $fields['fax_cliente'] : "";?></div>
				<div class="col-md-12 riepilogo"><strong>Indirizzo email:</strong> <?php echo $fields['email_cliente'];?></div>

				<div class="col-md-12 riepilogo"><strong>Ruolo: </strong><?php echo $fields['ruolo_cliente'];?></div>
				<div class="col-md-4 riepilogo"><strong>Nome: </strong><?php echo $fields['nome_cliente'];?></div>
				<div class="col-md-4 riepilogo"><strong>Cognome: </strong><?php echo $fields['cognome_cliente'];?></div>
				<div class="col-md-4 riepilogo"><strong>Sesso: </strong><?php echo $fields['sesso_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Data di nascita: </strong><?php echo $fields['data_nascita_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Luogo di nascita: </strong><?php echo $fields['luogo_nascita_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Provincia: </strong><?php echo $fields['provincia_nascita_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Codice Fiscale: </strong><?php echo $fields['codice_fiscale_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Nazionalità: </strong><?php echo $fields['nazionalita_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Documento: </strong><?php echo $fields['tipo_documento_cliente'];?> n. <?php echo $fields['numero_documento_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Rilasciato da: </strong><?php echo $fields['rilasciato_documento_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Data rilascio:</strong> <?php echo $fields['data_documento_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Data scadenza:</strong> <?php echo $fields['scadenza_documento_cliente'];?></div>
				<div class="col-md-12 riepilogo"><strong>Residenza (o domicilio italiano): </strong><?php echo $fields['indirizzo_cliente'];?> n. <?php echo $fields['numero_civico_cliente'];?>, <?php echo $fields['citta_cliente'];?>, <?php echo $fields['provincia_cliente'];?> <?php echo $fields['cap_cliente'];?></div>
				
			</section>
		
			
			<section class="clearfix">
				<h3>2. Indirizzo di attivazione e fornitura servizi</h3>
				<?php if(@$fields['indirizzo_attivazione']) :?>
					<div class="col-md-12 riepilogo"><strong>Indirizzo att.: </strong><?php echo $fields['indirizzo_attivazione'];?> n. <?php echo $fields['numero_civico_attivazione'];?>, <?php echo $fields['citta_attivazione'];?>, <?php echo $fields['provincia_attivazione'];?> <?php echo $fields['cap_attivazione'];?></div>
				<?php else:; ?>
					<div class="col-md-12 riepilogo">come sopra</div>
				<?php endif; ?>
			</section>

			
			<section class="clearfix">
				<h3>3. Prodotti e servizi richiesti</h3>
				<div class="col-md-12 riepilogo"><strong>SERVIZIO INTERNET/TELEFONO TERRECABLATE: <?php echo $contratti_strings[$fields['offerta_selezionata']];?> </strong></div>

				<div class="col-md-12 etichetta"><h4>INDIRIZZO INVIO DISPOSITIVO</h4></div>
				<?php if(@$fields['indirizzo_dispositivo']) : ?>
				<div class="col-md-12 riepilogo"><strong>Presso: </strong><?php echo $fields['presso_dispositivo'];?></div>
				<div class="col-md-12 riepilogo"><strong>Indirizzo: </strong><?php echo $fields['indirizzo_dispositivo'];?> n. <?php echo $fields['numero_civico_dispositivo'];?>, <?php echo $fields['citta_dispositivo'];?>, <?php echo $fields['provincia_dispositivo'];?> <?php echo $fields['cap_dispositivo'];?></div>
				<?php else:; ?>
				<div class="col-md-12 riepilogo">come sopra (vedi punto 2)</div>
				<?php endif; ?>


				<?php if($fields['offerta_selezionata'] == 'myofficeisdn'): ?>
					<div class="col-md-6 riepilogo"><strong>Tipo di borchia:</strong> <?php echo $fields['borchia'];?></div>
					<div class="col-md-6 riepilogo"><strong>Numeri aggiuntivi per servizio:</strong> <?php echo $fields['numeri_isdn'];?></div>
				<?php elseif($fields['offerta_selezionata'] == 'myofficefax'): ?>
					<div class="col-md-6 riepilogo"><strong>Email sul quale ricevere il fax:</strong> <?php echo $fields['fax_email'];?></div>
					<div class="col-md-6 riepilogo"><strong>Nome con cui comparire:</strong> <?php echo $fields['fax_nome'];?></div>
				<?php endif; ?>

				<div class="col-md-12 etichetta"><h4>OPZIONI DI TRAFFICO</h4></div>			
				<div class="col-md-6 riepilogo"><strong>Verso cellulari nazionali: </strong><?php echo (@$fields['opzione_cellulari_nazionali']) ?  $contratti_strings[$fields['opzione_cellulari_nazionali']] : 'nessuna';?></div>
				
				
				<div class="col-md-12 etichetta"><h4>SERVIZI SUPPLEMENTARI</h4></div>
				<div class="col-md-12 riepilogo">
					<?php if (@$fields['servizio_configurazione_bridge']): ?>Configurazione Modem BRIDGE;<br><?php endif;?>
					<?php if (@$fields['servizio_isdn']): ?>Opzione ISDN;<br><?php endif;?>
					

					<?php if (@$fields['servizio_trasferimento_chiamata_voip']): ?>Trasferimento di chiamata automatico per servizi VoIP (deviare il numero <?php echo @$fields['servizio_trasferimento_chiamata_voip_src']; ?>  sul numero <?php echo @$fields['servizio_trasferimento_chiamata_voip_dst']; ?>); <br><?php endif;?>
					
					<?php if (@$fields['servizio_avviso_di_chiamata']): ?>Avviso di chiamata (sul/i numero/i <?php echo @$fields['servizio_avviso_di_chiamata_num']; ?> );<br> <?php endif;?>

					<?php if (@$fields['servizio_trasferimento_chiamata']): ?>Trasferimento di chiamata (sul/i numero/i <?php echo @$fields['servizio_trasferimento_chiamata_num']; ?> ); <br><?php endif;?>

					<?php if (@$fields['servizio_identificazione_chiamante']): ?>Identificazione chiamante (sul/i numero/i <?php echo @$fields['servizio_identificazione_chiamante_num']; ?> );<br> <?php endif;?>

					<?php if (@$fields['servizio_disabilitazione_identificazione']): ?>Disabilitazione identificazione al chiamato (sul/i numero/i <?php echo @$fields['servizio_disabilitazione_identificazione_num']; ?> ); <br><?php endif;?>

					<?php if (@$fields['servizio_installazione_apparato']): ?>Intervento di installazione e configurazione apparati; <br><?php endif;?>
					<?php if (@$fields['servizio_dettaglio_chiamate']): ?>Dettaglio chiamate; <br><?php endif;?>
					
					<?php if (@$fields['servizio_linea_analogica_aggiuntiva']): ?>Linea Analogica aggiuntiva (sul numero <?php echo @$fields['servizio_linea_analogica_aggiuntiva_num']; ?> ); <br><?php endif;?>

					<?php if (@$fields['servizio_numeri_aggiuntivi']): ?>Numeri aggiuntivi (quantità: <?php echo @$fields['servizio_numeri_aggiuntivi_qta']; ?> );<br> <?php endif;?>

					<?php if (@$fields['servizio_trunk_sip']): ?>Opzione TrunkSip; <br><?php endif;?>

					<?php if (@$fields['servizio_ribaltamento_impianto']): ?>Ribaltamento impianto; <br><?php endif;?>
				</div>
			</section>

			<section class="clearfix">
				<h3>4. Stato attuale linee telefoniche</h3>
				<div class="col-md-12 riepilogo"><i class="fa fa-check" aria-hidden="true"></i><?php echo $contratti_strings[$fields['stato_attuale_linee']];?></div>
			</section>

			<?php if($fields['stato_attuale_linee'] == 'stato_attuale_nuovalinea'): ?>
				<section class="clearfix">
					<h3>5. Richiesta attivazione nuove linee</h3>
					<div class="col-md-12 riepilogo"><strong>Indirizzo nuova linea: </strong><?php echo $fields['indirizzo_nuova_linea'];?></div>
				</section>
			<?php endif; ?>


			<?php if($fields['stato_attuale_linee'] != 'stato_attuale_nuovalinea'): ?>
				<section class="clearfix">
					<h3>6. Tipologia linea e Mantenimento nel numero (Number Portability)</h3>
										
					<div class="col-md-12 etichetta"><h4>TIPOLOGIA E DETTAGLI DELLA LINEA</h4></div>					

					
					<table class="table-responsive table-bordered tab-tipolinea">
					<thead>
						<tr>
							<th width="45px">TIPOLOGIA</th>
							<th width="45px">PBX</th>
							<th>Numero/capofila</th>
							<th>Portabilità dei<br>numeri telefonici</th>
							<th>Sottonumeri<br>(solo ISDN)</th>
							<th>Codice migrazione + carattere di controllo</th>
						</tr>
					</thead>
					
					<tbody>
						<?php 
						for($i=0; $i<4; $i++):
							if(@$fields['tipolinea_az_tipologia'.($i+1)]): ?>
						<tr>
							<td><?php echo $fields['tipolinea_az_tipologia'.($i+1)]; ?></td>
							<td><?php echo (@$fields['tipolinea_az_pbx'.($i+1)]) ? 'SI' : '';?></td>
							<td>
								<?php echo (@$fields['tipolinea_az_tel'.(2*$i+1)] ); ?><br>
								<?php echo (@$fields['tipolinea_az_tel'.(2*$i+2)]); ?><br>
							</td>
							<td><?php echo (@$fields['tipolinea_az_portabilita'.($i+1)]=='si') ? 'SI' : 'NO';?></td>
							<td><?php echo (@$fields['tipolinea_az_multinumero'.($i+1)]==1) ? 'SI' : 'NO';?></td>
							<td>
								<?php echo (@$fields['tipolinea_az_codice_migrazione'.(2*$i+1)]);?>
								<?php echo (@$fields['tipolinea_az_codice_migrazione'.(2*$i+2)]);?>
							</td>
						</tr>
						<?php 
							endif;
						endfor;?>
					</tbody>
					</table>

					<?php if(@$fields['tipolinea_az_soloadsl']): ?>
					<table class="table-responsive table-bordered tab-tipolinea">
					<tbody>
						<tr>
							<th width="120px" rowspan="2">Solo ADSL</th>
							<th>numero di identificazione</th>
							<th>Codice migrazione + carattere di controllo</th>
						</tr>
						<tr>
							<td><?php echo (@$fields['tipolinea_az_numero_identificazione']);?></td>
							<td><?php echo (@$fields['tipolinea_az_codice_migrazione9']);?></td>								
						</tr>
					</tbody>
					</table>
					<?php endif; ?>

					<?php if(@$fields['tipolinea_az_gnr']): ?>
					<table class="table-responsive table-bordered tab-tipolinea">
					<tbody>
						<tr>
							<th width="120px" rowspan="2">GNR</th>
							<th width="140px">inizio numerazione</th>
							<td><?php echo (@$fields['tipolinea_az_gnr_inizio']);?></td>
						</tr>
						<tr>
							<th width="140px">fine numerazione</th>
							<td><?php echo (@$fields['tipolinea_az_gnr_fine']);?></td>
						</tr>
					</tbody>
					</table>
					<?php endif; ?>					


					<div class="col-md-12 etichetta"><h4>DATI ESATTI INTESTATARIO E UBICAZIONE ATTUALE LINEA TELEFONICA</h4></div>
					<div class="col-md-6 riepilogo"><strong>Denominazione/Ragione sociale o Cognome: </strong><?php echo $fields['tipolinea_cognome_intestatario'];?></div>
					<div class="col-md-6 riepilogo"><strong>Nome: </strong><?php echo @$fields['tipolinea_nome_intestatario'];?></div>
					<div class="col-md-12 riepilogo"><strong>Sede Via/Piazza: </strong><?php echo $fields['tipolinea_indirizzo_intestatario'];?> n. <?php echo $fields['tipolinea_civico_intestatario'];?>, <?php echo $fields['tipolinea_citta_intestatario'];?>, <?php echo $fields['tipolinea_provincia_intestatario'];?> <?php echo $fields['tipolinea_cap_intestatario'];?></div>
					<?php if(@$fields['tipolinea_indirizzo_linea']): ?>
						<div class="col-md-12 riepilogo"><strong>Indirizzo ubicazione linea (se diverso da quello sopra indicato): </strong><?php echo $fields['tipolinea_indirizzo_linea'];?> n. <?php echo $fields['tipolinea_civico_linea'];?>, <?php echo $fields['tipolinea_citta_linea'];?>, <?php echo $fields['tipolinea_provincia_linea'];?> <?php echo $fields['tipolinea_cap_linea'];?></div>
					<?php endif; ?>	
				</section>
			<?php endif; ?>


			<section class="clearfix">
				<h3>7. Servizi di migrazione e mantenimento del numero telefonico</h3>
				<div class="col-md-12 riepilogo"><strong>Denominazione/Ragione sociale o Cognome: </strong><?php echo $fields['migrazione_cognome_azienda'];?></div>
				<div class="col-md-12 riepilogo"><strong>Nome: </strong><?php echo $fields['migrazione_nome_azienda'];?></div>
				<div class="col-md-12 riepilogo"><strong>Sede via/piazza : </strong><?php echo $fields['migrazione_indirizzo_azienda'];?> n. <?php echo $fields['migrazione_numero_civico_azienda'];?>, <?php echo $fields['migrazione_citta_azienda'];?>, <?php echo $fields['migrazione_provincia_azienda'];?> <?php echo $fields['migrazione_cap_azienda'];?></div>
				<div class="col-md-12 riepilogo"><strong>Partita IVA / Codice Fiscale: </strong><?php echo $fields['migrazione_codice_fiscale_azienda'];?></div>

				<div class="col-md-12 riepilogo"><strong>Ruolo: </strong><?php echo $fields['migrazione_ruolo_cliente'];?></div>
				<div class="col-md-4 riepilogo"><strong>Nome: </strong><?php echo $fields['migrazione_nome'];?></div>
				<div class="col-md-4 riepilogo"><strong>Cognome: </strong><?php echo $fields['migrazione_cognome'];?></div>
				<div class="col-md-4 riepilogo"><strong>Sesso: </strong><?php echo $fields['migrazione_sesso'];?></div>
				<div class="col-md-6 riepilogo"><strong>Data di nascita: </strong><?php echo $fields['migrazione_data_nascita'];?></div>
				<div class="col-md-6 riepilogo"><strong>Luogo di nascita: </strong><?php echo $fields['migrazione_luogo_nascita'];?></div>
				<div class="col-md-6 riepilogo"><strong>Provincia: </strong><?php echo $fields['migrazione_provincia_nascita'];?></div>
				<div class="col-md-6 riepilogo"><strong>Codice Fiscale: </strong><?php echo $fields['migrazione_codice_fiscale'];?></div>
				<div class="col-md-6 riepilogo"><strong>Nazionalità: </strong><?php echo $fields['migrazione_nazionalita'];?></div>
				<div class="col-md-6 riepilogo"><strong>Documento: </strong><?php echo $fields['migrazione_tipo_documento'];?> n. <?php echo $fields['migrazione_numero_documento'];?></div>
				<div class="col-md-6 riepilogo"><strong>Rilasciato da: </strong><?php echo $fields['migrazione_rilasciato_documento'];?></div>
				<div class="col-md-6 riepilogo"><strong>Data rilascio:</strong> <?php echo $fields['migrazione_data_documento'];?></div>
				<div class="col-md-6 riepilogo"><strong>Data scadenza:</strong> <?php echo $fields['migrazione_scadenza_documento'];?></div>
				<div class="col-md-12 riepilogo"><strong>Residenza (o domicilio italiano): </strong><?php echo $fields['migrazione_indirizzo'];?> n. <?php echo $fields['migrazione_numero_civico'];?>, <?php echo $fields['migrazione_citta'];?>, <?php echo $fields['migrazione_provincia'];?> <?php echo $fields['migrazione_cap'];?></div>
				
				<?php if(@$fields['migrazione_servizi']): ?>
				<div class="col-md-12 riepilogo"><?php echo $contratti_strings['richiesta_migrazione'];?></div>				
				<?php endif; ?>

				<?php if(@$fields['migrazione_portability']): ?>
				<div class="col-md-12 riepilogo"><?php echo $contratti_strings['richiesta_portability'];?></div>				
				<?php endif; ?>
				
			</section>

			<section class="clearfix">
				<h3>8. Manifestazione di consenso al trattamento dei dati personali ( REG. EU 679/2016 )</h3>
				<p>Letta e compresa l'informativa privacy riportata nell'allegato al presente Documento di Accettazione "INFORMATIVA Al SENSI DELL'ART. 13 DEL REGOLAMENTO UE 679/2016 RELATIVA AL TRATTAMENTO DEI DATI PERSONALI"<br/>

				<p>
				<?php if($fields['consenso_trattamento_commerciale']) : ?>
					<i class="fa fa-check" aria-hidden="true"></i><strong>PRESTO IL CONSENSO</strong>
				<?php else: ?>
					<i class="fa fa-times" aria-hidden="true"></i><strong>NEGO IL CONSENSO</strong>
				<?php endif; ?>
				&nbsp; al trattamento dei dati personali da parte di Terrecablate per l'invio di comunicazioni promozionali e di marketing, incluso l'invio di newsletter e ricerche di mercato, attraverso strumenti
automatizzati (sms, mms, email, notifiche push, fax) e non (posta cartacea, telefono con operatore). 
				</p>

				<p>
				<?php if($fields['consenso_terzi']) : ?>
					<i class="fa fa-check" aria-hidden="true"></i><strong>PRESTO IL CONSENSO</strong>
				<?php else: ?>
					<i class="fa fa-times" aria-hidden="true"></i><strong>NEGO IL CONSENSO</strong>
				<?php endif; ?>
				&nbsp; alla comunicazione dei propri dati ad altre società per l'invio di loro comunicazioni promozionali e di marketing, incluso l'invio di newsletter e ricerche di mercato, attraverso strumenti
automatizzati (sms, mms, email, notifiche push, fax) e non (posta cartacea, telefono con operatore).
				</p>

				<p>
				<?php if($fields['consenso_profilazione']) : ?>
					<i class="fa fa-check" aria-hidden="true"></i><strong>PRESTO IL CONSENSO</strong>
				<?php else: ?>
					<i class="fa fa-times" aria-hidden="true"></i><strong>NEGO IL CONSENSO</strong>
				<?php endif; ?>
				&nbsp; al trattamento dei dati personali da parte di Terrecablate per l'analisi delle proprie scelte di acquisto, preferenze e caratteristiche anagrafiche, raccolte sia off line nei negozi sia sui siti
web, al fine di meglio strutturare comunicazioni e proposte commerciali personalizzate, effettuare analisi generali per fini di orientamento strategico e di intelligence commerciale e, in
genere, per attività di profilazione. 
				</p>

			</section>

			<section class="clearfix">
				<h3>9. Modalità di pagamento</h3>
				<div class="col-md-12 riepilogo"><strong>Scelgo di pagare tramite: </strong><?php echo $contratti_strings[$fields['modalita_pagamento']];?></div>
			</section>

			<?php if($fields['modalita_pagamento'] =='pagamento_sdd'): ?>
			<section class="clearfix">
				<h3>MOD.A - AUTORIZZAZIONE PERMANENTE DI ADDEBITO IN CONTO</h3>
				<div class="col-md-12 etichetta"><h4>DATI IDENTIFICATIVI DELL’INTESTATARIO DEL CONTO CORRENTE</h4></div>
				<div class="col-md-12 riepilogo"><strong>Cognome e Nome/ Rag. sociale: </strong><?php echo $fields['sdd_debitore_nome'];?></div>
				<div class="col-md-12 riepilogo"><strong>Codice Fiscale o P.IVA: </strong><?php echo $fields['sdd_debitore_cf_piva'];?></div>
				<div class="col-md-12 riepilogo"><strong>Codice IBAN Conto Corrente: </strong><?php echo $fields['sdd_debitore_iban'];?></div>

				<div class="col-md-12 etichetta"><h4>DATI IDENTIFICATIVI DEL SOTTOSCRITTORE</h4></div>
				<div class="col-md-12 riepilogo"><strong>Cognome e Nome: </strong><?php echo $fields['sdd_sottoscrittore_nome'];?></div>
				<div class="col-md-12 riepilogo"><strong>Codice Fiscale: </strong><?php echo $fields['sdd_sottoscrittore_cf'];?></div>

				<div class="col-md-12 etichetta"><h4>TITOLARE DEL CONTRATTO/LINEA TELEFONICA</h4></div>
				<?php if( !@$fields['sdd_titolare_linea'] ): echo "come sopra"; else: ?>
					<div class="col-md-12 riepilogo"><strong>Linea telefonica /  Contratto: </strong><?php echo $fields['sdd_titolare_linea'];?></div>
					<div class="col-md-12 riepilogo"><strong>Cognome e nome / Rag. sociale: </strong><?php echo $fields['sdd_titolare_nome'];?></div>
					<div class="col-md-12 riepilogo"><strong>Codice Fiscale o P.IVA: </strong><?php echo $fields['sdd_titolare_cf_piva'];?></div>
					<div class="col-md-12 riepilogo"><strong>Recapito telefonico alternativo: </strong><?php echo (@$fields['sdd_titolare_telefono']) ? $fields['sdd_titolare_telefono'] : '';?></div>
				<?php endif; ?>		
			</section>
			<?php endif; ?>

		</div>

		<?php 
		$qsA=array();
		$qsA[] = "prd=".$fields['offerta_selezionata'];
		$qsA[] = "st=3";
		$qsA[] = "t=".$fields['token'];
		$qs = implode("&", $qsA);
		?>
		<a href="<?php echo get_the_permalink(768)."?".$qs; ?>" class="btn-orange">&laquo; INDIETRO</a>
		<a href="<?php echo get_bloginfo('url');?>/pdf/generatepdf.php?ar=a&t=<?php echo $fields['token'];?>" class="btn-orange"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>GENERA CONTRATTO</a>
	</div>
</section>