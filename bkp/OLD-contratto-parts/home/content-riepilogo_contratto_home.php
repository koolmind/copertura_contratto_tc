<?php 
/* 
 * Template part > Riepilogo Contratto
 */
?>
<section id="main-content">
    
	<div class="container contratti-wrap contratti-R contratto-riepilogo">
		<div class="row">
			<h1 class="fontdin">MyHome <small>- PROPOSTA DI CONTRATTO PER LA TUA CASA</small></h1>
			<p class="fontdin">RIEPILOGO DATI. Verifica i tuoi dati e premi GENERA IL CONTRATTO per scaricare il pdf.</p> 
			<hr style="border-width: 4px; border-color: rgb(98, 174, 46);" />		

			<section class="clearfix">
				<h3>1. Dati anagrafici e recapiti del Cliente</h3>
				<div class="col-md-6 riepilogo"><strong>Nome: </strong><?php echo $fields['nome_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Cognome: </strong><?php echo $fields['cognome_cliente'];?></div>
				<div class="col-md-12 riepilogo"><strong>Indirizzo: </strong><?php echo $fields['indirizzo_cliente'];?> n. <?php echo $fields['numero_civico_cliente'];?>, <?php echo $fields['citta_cliente'];?>, <?php echo $fields['provincia_cliente'];?> <?php echo $fields['cap_cliente'];?></div>
				<div class="col-md-12 riepilogo"><strong>Codice Fiscale: </strong><?php echo $fields['codice_fiscale_cliente'];?></div>
				<div class="col-md-4 riepilogo"><strong>Cell: </strong><?php echo $fields['cell_cliente'];?></div>
				<div class="col-md-4 riepilogo"><strong>Tel: </strong><?php echo (@$fields['tel_cliente']) ? $fields['tel_cliente'] : "";?></div>
				<div class="col-md-4 riepilogo"><strong>Fax: </strong><?php echo (@$fields['fax_cliente']) ? $fields['fax_cliente'] : "";?></div>
				<div class="col-md-6 riepilogo"><strong>Data di nascita: </strong><?php echo $fields['data_nascita_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Luogo di nascita: </strong><?php echo $fields['luogo_nascita_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Documento: </strong><?php echo $fields['tipo_documento_cliente'];?> n. <?php echo $fields['numero_documento_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Rilasciato da: </strong><?php echo $fields['rilasciato_documento_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Data rilascio:</strong> <?php echo $fields['data_documento_cliente'];?></div>
				<div class="col-md-6 riepilogo"><strong>Data scadenza:</strong> <?php echo $fields['scadenza_documento_cliente'];?></div>
				<div class="col-md-12 riepilogo"><strong>Indirizzo email:</strong> <?php echo $fields['email_cliente'];?></div>
			</section>
			
			
			<section class="clearfix">
				<h3>2. Indirizzo di attivazione e fornitura servizi</h3>
				<div class="col-md-12 riepilogo"><strong>Presso: </strong><?php echo $fields['presso_attivazione'];?></div>
				<div class="col-md-12 riepilogo"><strong>Indirizzo att.: </strong><?php echo $fields['indirizzo_attivazione'];?> n. <?php echo $fields['numero_civico_attivazione'];?>, <?php echo $fields['citta_attivazione'];?>, <?php echo $fields['provincia_attivazione'];?> <?php echo $fields['cap_attivazione'];?></div>
			</section>

			
			<section class="clearfix">
				<h3>3. Prodotti e servizi richiesti</h3>
				<div class="col-md-12 riepilogo"><strong>Offerta commerciale Terrecablate: <?php echo strtoupper($fields['offerta_selezionata']);?> </strong></div>

				<?php if(@$fields['modem'] /*&& @$fields['filtro']*/) :?>
					<div class="col-md-12 riepilogo"><strong>Dispositivo (modem): <?php echo $fields['modem'];?> </strong><br>
						<em><?php
						/*if($fields['offerta_selezionata'] == 'myhomeadsl' ){
							echo "Offerta MyHome ADSL, per i clienti raggiunti direttamente dalla rete Terrecablate il dispositivo è consigliato.<br/>";
							echo "Offerta MyHome ADSL, per i clienti NON raggiunti direttamente dalla rete Terrecablate il dispositivo è obbligatorio";
						} */
						if($fields['offerta_selezionata'] == 'myhomefibra' ){
							echo "Offerta MyHome FIBRA, il dispositivo WI-FI UltraFibra è obbligatorio e già incluso nell'offerta";
						} ?></em>
					</div>
					
					
					<!--div class="col-md-6 riepilogo"><strong>Filtro: <?php echo $fields['filtro'];?> </strong></div-->

					<div class="col-md-12 etichetta"><h4>INDIRIZZO INVIO DISPOSITIVO</h4></div>
					<?php if(@$fields['indirizzo_dispositivo']) : ?>
					<div class="col-md-12 riepilogo"><strong>Presso: </strong><?php echo $fields['presso_dispositivo'];?></div>
					<div class="col-md-12 riepilogo"><strong>Indirizzo: </strong><?php echo $fields['indirizzo_dispositivo'];?> n. <?php echo $fields['numero_civico_dispositivo'];?>, <?php echo $fields['citta_dispositivo'];?>, <?php echo $fields['provincia_dispositivo'];?> <?php echo $fields['cap_dispositivo'];?></div>
					<?php else:; ?>
					<div class="col-md-12 riepilogo">come sopra (vedi punto 2)</div>
					<?php endif; ?>
				<?php endif; ?>

				<div class="col-md-12 etichetta"><h4>OPZIONI DI TRAFFICO</h4></div>			
				<div class="col-md-6 riepilogo"><strong>Verso cellulari nazionali: </strong><?php echo (@$fields['opzione_cellulari_nazionali']) ?  $contratti_strings[$fields['opzione_cellulari_nazionali']] : 'nessuna';?></div>
				<div class="col-md-6 riepilogo"><strong>Verso fissi nazionali: </strong><?php echo (@$fields['opzione_fissi_nazionali']) ? "min. illimitati" : 'nessuna';?></div>
				
				<div class="col-md-12 etichetta"><h4>SERVIZI SUPPLEMENTARI</h4></div>
				<div class="col-md-12 riepilogo">
					<?php if (@$fields['servizio_trasferimento_chiamata']): ?>Trasferimento di chiamata; <?php endif;?>
					<?php if (@$fields['servizio_identificazione_chiamante']): ?>Identificazione chiamante; <?php endif;?>
					<?php if (@$fields['servizio_disabilitazione_identificazione']): ?>Disabilitazione identificazione al chiamato; <?php endif;?>
					<?php if (@$fields['servizio_avviso_di_chiamata']): ?>Avviso di chiamata; <?php endif;?>
					<?php if (@$fields['servizio_installazione_apparato']): ?>Intervento di installazione e configurazione apparati; <?php endif;?>
					<?php if (@$fields['servizio_dettaglio_chiamate']): ?>Dettaglio chiamate; <?php endif;?>
					<?php if (@$fields['servizio_linea_voip']): ?>Linea VoIP aggiuntiva; <?php endif;?>
					<?php if (@$fields['servizio_ribaltamento_impianto']): ?>Ribaltamento impianto; <?php endif;?>
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
					<div class="col-md-12 riepilogo"><strong>Tipo: </strong><?php echo $contratti_strings[$fields['tipolinea_tipologia']];?></div>
					
					<?php if($fields['tipolinea_tipologia'] != 'solo_internet'): ?>
						
						<div class="col-md-6 riepilogo"><strong>Numero telefonico: </strong><?php echo $fields['tipolinea_tel1'];?></div>
						<div class="col-md-6 riepilogo"><strong>Mantieni numero telefonico: </strong><?php echo $fields['tipolinea_mantieni_tel'];?></div>

						<div class="col-md-12 riepilogo"><strong>Operatore telefonico: </strong><?php echo $fields['tipolinea_operatore_tel'];?></div>
						<div class="col-md-12 riepilogo"><strong>Codice Migrazione + Carattere di controllo: </strong><?php echo $fields['tipolinea_codice_migrazione1'];?></div>
						<?php if(@$fields['tipolinea_codice_migrazione2']): ?>
						<div class="col-md-12 riepilogo"><strong>Codice Migrazione + Carattere di controllo: </strong><?php echo $fields['tipolinea_codice_migrazione2'];?></div>
						<?php endif; ?>
					
					<?php else: ?>
					
						<div class="col-md-12 riepilogo"><strong>Num. Indentificazione: </strong><?php echo $fields['tipolinea_numero_identificazione'];?></div>
						<div class="col-md-12 riepilogo"><strong>Codice Migrazione + Carattere di controllo: </strong><?php echo $fields['tipolinea_codice_migrazione3'];?></div>
					
					<?php endif; ?>					

					<div class="col-md-12 etichetta"><h4>DATI ESATTI INTESTATARIO E UBICAZIONE ATTUALE LINEA TELEFONICA</h4></div>
					<div class="col-md-6 riepilogo"><strong>Cognome: </strong><?php echo $fields['tipolinea_cognome_intestatario'];?></div>
					<div class="col-md-6 riepilogo"><strong>Nome: </strong><?php echo $fields['tipolinea_nome_intestatario'];?></div>
					<div class="col-md-12 riepilogo"><strong>Indirizzo: </strong><?php echo $fields['tipolinea_indirizzo_intestatario'];?> n. <?php echo $fields['tipolinea_civico_intestatario'];?>, <?php echo $fields['tipolinea_citta_intestatario'];?>, <?php echo $fields['tipolinea_provincia_intestatario'];?> <?php echo $fields['tipolinea_cap_intestatario'];?></div>
					<?php if(@$fields['tipolinea_indirizzo_linea']): ?>
						<div class="col-md-12 riepilogo"><strong>Indirizzo alternativo: </strong><?php echo $fields['tipolinea_indirizzo_linea'];?> n. <?php echo $fields['tipolinea_civico_linea'];?>, <?php echo $fields['tipolinea_citta_linea'];?>, <?php echo $fields['tipolinea_provincia_linea'];?> <?php echo $fields['tipolinea_cap_linea'];?></div>
					<?php endif; ?>	
				</section>
			<?php endif; ?>


			<section class="clearfix">
				<h3>7. Servizi di migrazione e mantenimento del numero telefonico</h3>
				<div class="col-md-12 etichetta"><h4>IL SOTTOSCRITTO</h4></div>	
				<div class="col-md-6 riepilogo"><strong>Nome: </strong><?php echo $fields['migrazione_nome'];?></div>
				<div class="col-md-6 riepilogo"><strong>Cognome: </strong><?php echo $fields['migrazione_cognome'];?></div>
				<div class="col-md-12 riepilogo"><strong>Residente in via/piazza : </strong><?php echo $fields['migrazione_indirizzo'];?> n. <?php echo $fields['migrazione_numero_civico'];?>, <?php echo $fields['migrazione_citta'];?>, <?php echo $fields['migrazione_provincia'];?> <?php echo $fields['migrazione_cap'];?></div>
				<div class="col-md-12 riepilogo"><strong>Codice Fiscale: </strong><?php echo $fields['migrazione_codice_fiscale'];?></div>

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
				<div class="col-md-12 riepilogo"><strong>Cognome e Nome: </strong><?php echo $fields['sdd_debitore_nome'];?></div>
				<div class="col-md-12 riepilogo"><strong>Codice Fiscale: </strong><?php echo $fields['sdd_debitore_cf_piva'];?></div>
				<div class="col-md-12 riepilogo"><strong>Codice IBAN Conto Corrente: </strong><?php echo $fields['sdd_debitore_iban'];?></div>

				<div class="col-md-12 etichetta"><h4>DATI IDENTIFICATIVI DEL SOTTOSCRITTORE</h4></div>
				<div class="col-md-12 riepilogo"><strong>Cognome e Nome: </strong><?php echo $fields['sdd_sottoscrittore_nome'];?></div>
				<div class="col-md-12 riepilogo"><strong>Codice Fiscale: </strong><?php echo $fields['sdd_sottoscrittore_cf'];?></div>

				<div class="col-md-12 etichetta"><h4>TITOLARE DEL CONTRATTO/LINEA TELEFONICA</h4></div>
				<?php if( !@$fields['sdd_titolare_linea'] ): echo "come sopra"; else: ?>
					<div class="col-md-12 riepilogo"><strong>Linea telefonica /  Contratto: </strong><?php echo $fields['sdd_titolare_linea'];?></div>
					<div class="col-md-12 riepilogo"><strong>Cognome e nome / Rag. sociale: </strong><?php echo $fields['sdd_titolare_nome'];?></div>
					<div class="col-md-12 riepilogo"><strong>Codice Fiscale: </strong><?php echo $fields['sdd_titolare_cf_piva'];?></div>
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
		<a href="<?php echo get_the_permalink(768)."?".$qs; ?>" class="btn-green">&laquo; INDIETRO</a>
		<a href="<?php echo get_bloginfo('url');?>/pdf/generatepdf.php?ar=r&t=<?php echo $fields['token'];?>" class="btn-green"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>GENERA CONTRATTO</a>
	</div>
</section>
