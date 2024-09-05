<h4>OPZIONI DI TRAFFICO</h4>
					
<div class="col-md-12"> 

	<div class="radio">
		<?php $chk = ( @$fields['opzione_cellulari_nazionali'] &&  $fields['opzione_cellulari_nazionali']=='opzione_mobile_250') ? "checked='checked'": ""; ?>
		<input type="radio" name="dati[opzione_cellulari_nazionali]" id="opzione_mobile_250" value="opzione_mobile_250" <?php echo $chk;?> ><label class="control-label">Chiamate verso Cellulari Nazionali 250min (+ 7,50 €/mese)</label>
	</div>

	<div class="radio">
		<?php $chk = ( @$fields['opzione_cellulari_nazionali'] &&  $fields['opzione_cellulari_nazionali']=='opzione_mobile_500') ? "checked='checked'": ""; ?>
		<input type="radio" name="dati[opzione_cellulari_nazionali]" id="opzione_mobile_500" value="opzione_mobile_500" <?php echo $chk;?> ><label class="control-label">Chiamate verso Cellulari Nazionali 500min (+ 13,00 €/mese)</label>
	</div>

	<div class="radio">
		<?php $chk = ( !@$fields['opzione_cellulari_nazionali'] ) ? "checked='checked'": ""; ?>
		<input type="radio" name="dati[opzione_cellulari_nazionali]" value="" <?php echo $chk;?> ><label class="control-label">Nessuna</label>
	</div>
	
</div>

<p>&nbsp;</p>


<h4>SERVIZI SUPPLEMENTARI</h4>
					
<div class="col-md-12">
	<table class="table-responsive table-striped tab-servizi">
	<tbody>
		<tr>
			<td colspan="2">
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_configurazione_bridge'] &&  $fields['servizio_configurazione_bridge']=='1') ? "checked='checked'": ""; ?>	
					<input type="checkbox" name="dati[servizio_configurazione_bridge]" id="servizio_configurazione_bridge" value="1" <?php echo $chk;?>><label class="control-label">Configurazione Modem BRIDGE: la CPE Terrecablate funzionerà da Bridge per la rete dati. Tutti i servizi dati (VPN, Wi-Fi, Firewall, ecc) saranno confgurati e gestiti dal cliente su un proprio apparato di frontiera sul quale verrà rilasciato l’IP. L’apparato del cliente dovrà supportare il protocollo PPPoE (ove disponibile) (+ 20,00 €)</label>	
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_trasferimento_chiamata_voip'] &&  $fields['servizio_trasferimento_chiamata_voip']=='1') ? "checked='checked'": ""; ?>
					<input type="checkbox" name="dati[servizio_trasferimento_chiamata_voip]" id="servizio_trasferimento_chiamata_voip" value="1" <?php echo $chk;?>><label class="control-label">Trasferimento di chiamata automatico (solo VoIP) (+ 15,00 € + 3,00 €/mese)</label>
				</div>	
			</td>
			<td>				
				<input type="text" class="form-control" name="dati[servizio_trasferimento_chiamata_voip_src]" id="servizio_trasferimento_chiamata_voip_src" placeholder="numero da deviare" value="<?php echo ( @$fields ) ? $fields['servizio_trasferimento_chiamata_voip_src'] : ''; ?>">
				<input type="text" class="form-control" name="dati[servizio_trasferimento_chiamata_voip_dst]" id="servizio_trasferimento_chiamata_voip_dst" placeholder="numero su cui deviare" value="<?php echo ( @$fields ) ? $fields['servizio_trasferimento_chiamata_voip_dst'] : ''; ?>" >
			</td>
		</tr>

		<tr>
			<td>
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_avviso_di_chiamata'] &&  $fields['servizio_avviso_di_chiamata']=='1') ? "checked='checked'": ""; ?>
					<input type="checkbox" name="dati[servizio_avviso_di_chiamata]" id="servizio_avviso_di_chiamata" value="1" <?php echo $chk;?>><label class="control-label">Avviso di chiamata (ove non compreso) (+ 1,00 €/mese)</label>
				</div>	
			</td>
			<td>
				<input type="text" class="form-control" name="dati[servizio_avviso_di_chiamata_num]" id="servizio_avviso_di_chiamata_num" placeholder="sul/i numero/i" value="<?php echo ( @$fields ) ? $fields['servizio_avviso_di_chiamata_num'] : ''; ?>" >
			</td>
		</tr>

		<tr>
			<td>
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_trasferimento_chiamata'] &&  $fields['servizio_trasferimento_chiamata']=='1') ? "checked='checked'": ""; ?>
					<input type="checkbox" name="dati[servizio_trasferimento_chiamata]" id="servizio_trasferimento_chiamata" value="1" <?php echo $chk;?>><label class="control-label">Trasferimento di chiamata (+ 1,00 €/mese)</label>
				</div>	
			</td>
			<td>
				<input type="text" class="form-control" name="dati[servizio_trasferimento_chiamata_num]" id="servizio_trasferimento_chiamata_num" placeholder="sul/i numero/i" value="<?php echo ( @$fields ) ? $fields['servizio_trasferimento_chiamata_num'] : ''; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_identificazione_chiamante'] &&  $fields['servizio_identificazione_chiamante']=='1') ? "checked='checked'": ""; ?>
					<input type="checkbox" name="dati[servizio_identificazione_chiamante]" id="servizio_identificazione_chiamante" value="1" <?php echo $chk;?>><label class="control-label">Identifcazione del chiamante (ove non compreso) (+ 1,00 €/mese)</label>
				</div>	
			</td>
			<td>
				<input type="text" class="form-control" name="dati[servizio_identificazione_chiamante_num]" id="servizio_identificazione_chiamante_num" placeholder="sul/i numero/i" value="<?php echo ( @$fields ) ? $fields['servizio_identificazione_chiamante_num'] : ''; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_disabilitazione_identificazione'] &&  $fields['servizio_disabilitazione_identificazione']=='1') ? "checked='checked'": ""; ?>
					<input type="checkbox" name="dati[servizio_disabilitazione_identificazione]" id="servizio_disabilitazione_identificazione" value="1" <?php echo $chk;?>><label class="control-label">Disabilitazione identificazione al chiamato (+ 1,00 €/mese)</label>
				</div>	
			</td>
			<td>
				<input type="text" class="form-control" name="dati[servizio_disabilitazione_identificazione_num]" id="servizio_disabilitazione_identificazione_num" placeholder="sul/i numero/i" value="<?php echo ( @$fields ) ? $fields['servizio_disabilitazione_identificazione_num'] : ''; ?>">
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_installazione_apparato'] &&  $fields['servizio_installazione_apparato']=='1') ? "checked='checked'": ""; ?>	
					<input type="checkbox" name="dati[servizio_installazione_apparato]" id="servizio_installazione_apparato" value="1" <?php echo $chk;?>><label class="control-label">Intervento di installazione e configurazione apparati Terrecablate su prima presa (+ 70,00 €)</label>	
				</div>
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_dettaglio_chiamate'] &&  $fields['servizio_dettaglio_chiamate']=='1') ? "checked='checked'": ""; ?>	
					<input type="checkbox" name="dati[servizio_dettaglio_chiamate]" id="servizio_dettaglio_chiamate" value="1" <?php echo $chk;?>><label class="control-label">Dettaglio chiamate</label>
				</div>
			</td>
		</tr>

		<?php if($prodotto != 'myofficevoce'): ?>
		<tr>
			<td>
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_linea_analogica_aggiuntiva'] &&  $fields['servizio_linea_analogica_aggiuntiva']=='1') ? "checked='checked'": ""; ?>	
					<input type="checkbox" name="dati[servizio_linea_analogica_aggiuntiva]" id="servizio_linea_analogica_aggiuntiva" value="1" <?php echo $chk;?>><label class="control-label">Linea Analogica Aggiuntiva (solo per servizi con ADSL, previa verifica tecnica) (+ 30,00 € + 10,00€/mese) </label>
				</div>	
			</td>
			<td>
				<input type="text" class="form-control" name="dati[servizio_linea_analogica_aggiuntiva_num]" id="servizio_linea_analogica_aggiuntiva_num" placeholder="sul numero" value="<?php echo ( @$fields ) ? $fields['servizio_linea_analogica_aggiuntiva_num'] : ''; ?>">
			</td>
		</tr>
		<?php endif; ?>

		<?php //if($prodotto == 'myoffice2fibra' || $prodotto == 'myoffice4fibra'): ?>
		<tr>
			<td>
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_numeri_aggiuntivi'] &&  $fields['servizio_numeri_aggiuntivi']=='1') ? "checked='checked'": ""; ?>	
					<input type="checkbox" name="dati[servizio_numeri_aggiuntivi]" id="servizio_numeri_aggiuntivi" value="1" <?php echo $chk;?>><label class="control-label">Numeri aggiuntivi (+ 1,00€/mese cadauno) </label>
				</div>	
			</td>
			<td>
				<input type="text" class="form-control" name="dati[servizio_numeri_aggiuntivi_qta]" id="servizio_numeri_aggiuntivi_qta" placeholder="quantità" value="<?php echo ( @$fields ) ? $fields['servizio_numeri_aggiuntivi_qta'] : ''; ?>">
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_isdn'] &&  $fields['servizio_isdn']=='1') ? "checked='checked'": ""; ?>
					<input type="checkbox" name="dati[servizio_isdn]" id="servizio_isdn" value="1" <?php echo $chk;?>><label class="control-label">Opzione ISDN: I due o quattro canali voce, dei servizi Office, saranno rilasciati su interfaccia ISDN (+ 50,00 € + 5,00 €/mese; il costo di attivazione è dovuto solo per richieste non contestuali all'attivazione del servizio)</label>
				</div>
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_trunk_sip'] &&  $fields['servizio_trunk_sip']=='1') ? "checked='checked'": ""; ?>	
					<input type="checkbox" name="dati[servizio_trunk_sip]" id="servizio_trunk_sip" value="1" <?php echo $chk;?>><label class="control-label">Opzione TrunkSip: I due o quattro canali voce, dei servizi MyOffce, saranno rilasciati su interfaccia TrunkSip (+ 20,00 €)</label>	
				</div>
			</td>
		</tr>
		<?php //endif; ?>

		<tr>
			<td colspan="2">
				<div class="checkbox">
					<?php $chk = ( @$fields['servizio_ribaltamento_impianto'] &&  $fields['servizio_ribaltamento_impianto']=='1') ? "checked='checked'": ""; ?>	
					<input type="checkbox" name="dati[servizio_ribaltamento_impianto]" id="ribaltamento_impianto" value="1" <?php echo $chk;?>><label class="control-label">Ribaltamento dell'impianto (+ 40,00 €)</label>
				</div>	
			</td>
		</tr>

	</tbody>
	</table>

	
</div>