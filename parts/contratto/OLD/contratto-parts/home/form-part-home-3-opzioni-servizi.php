<h4>OPZIONI DI TRAFFICO (abbinabili a tutti i servizi)</h4>
					
<div class="col-md-12"> 

	<div class="checkbox">
		<?php $chk = ( @$fields['opzione_cellulari_nazionali'] &&  $fields['opzione_cellulari_nazionali']=='opzione_mobile_250') ? "checked='checked'": ""; ?>
		<input type="checkbox" name="dati[opzione_cellulari_nazionali]" id="opzione_mobile_250" value="opzione_mobile_250" value="1" <?php echo $chk;?> ><label class="control-label">Chiamate verso Cellulari Nazionali 250min (+ 7,50 €/mese)</label>
	</div>

	<div class="checkbox">
		<?php $chk = ( @$fields['opzione_fissi_nazionali'] &&  $fields['opzione_fissi_nazionali']=='1') ? "checked='checked'": ""; ?>
		<input type="checkbox" name="dati[opzione_fissi_nazionali]" id="opzione_fissi_nazionali" value="1" <?php echo $chk;?>><label class="control-label">Chiamate illimitate verso Fissi Nazionali (+ 5,00 €/mese)</label>
	</div>	
</div>

<p>&nbsp;</p>


<h4>SERVIZI SUPPLEMENTARI</h4>
					
<div class="col-md-12">
	<div class="checkbox">
		<?php $chk = ( @$fields['servizio_trasferimento_chiamata'] &&  $fields['servizio_trasferimento_chiamata']=='1') ? "checked='checked'": ""; ?>
		<input type="checkbox" name="dati[servizio_trasferimento_chiamata]" id="servizio_trasferimento_chiamata" value="1" <?php echo $chk;?>><label class="control-label">Trasferimento di chiamata (+ 1,20 €/mese)</label>
	</div>	

	<div class="checkbox">
		<?php $chk = ( @$fields['servizio_identificazione_chiamante'] &&  $fields['servizio_identificazione_chiamante']=='1') ? "checked='checked'": ""; ?>
		<input type="checkbox" name="dati[servizio_identificazione_chiamante]" id="servizio_identificazione_chiamante" value="1" <?php echo $chk;?>><label class="control-label">Identifcazione del chiamante (ove non compreso) (+ 1,20 €/mese)</label>
	</div>	

	<div class="checkbox">
		<?php $chk = ( @$fields['servizio_disabilitazione_identificazione'] &&  $fields['servizio_disabilitazione_identificazione']=='1') ? "checked='checked'": ""; ?>
		<input type="checkbox" name="dati[servizio_disabilitazione_identificazione]" id="servizio_disabilitazione_identificazione" value="1" <?php echo $chk;?>><label class="control-label">Disabilitazione identificazione al chiamato (+ 1,20 €/mese)</label>
	</div>	

	<div class="checkbox">
		<?php $chk = ( @$fields['servizio_avviso_di_chiamata'] &&  $fields['servizio_avviso_di_chiamata']=='1') ? "checked='checked'": ""; ?>
		<input type="checkbox" name="dati[servizio_avviso_di_chiamata]" id="servizio_avviso_di_chiamata" value="1" <?php echo $chk;?>><label class="control-label">Avviso di chiamata (+ 1,20 €/mese)</label>
	</div>	


	<div class="checkbox">
		<?php $chk = ( @$fields['servizio_installazione_apparato'] &&  $fields['servizio_installazione_apparato']=='1') ? "checked='checked'": ""; ?>	
		<input type="checkbox" name="dati[servizio_installazione_apparato]" id="servizio_installazione_apparato" value="1" <?php echo $chk;?>><label class="control-label">Intervento di Installazione e confgurazione apparati (solo per apparati Terrecablate) (+ 70,00 €)</label>
	</div>	
	
	<div class="checkbox">
		<?php $chk = ( @$fields['servizio_dettaglio_chiamate'] &&  $fields['servizio_dettaglio_chiamate']=='1') ? "checked='checked'": ""; ?>	
		<input type="checkbox" name="dati[servizio_dettaglio_chiamate]" id="servizio_dettaglio_chiamate" value="1" <?php echo $chk;?>><label class="control-label">Dettaglio chiamate</label>
	</div>	

	<?php if($prodotto != 'myhomevoce'): ?>
	<div class="checkbox">
		<?php $chk = ( @$fields['linea_voip_aggiuntiva'] &&  $fields['linea_voip_aggiuntiva']=='1') ? "checked='checked'": ""; ?>	
		<input type="checkbox" name="dati[linea_voip_aggiuntiva]" id="linea_voip_aggiuntiva" value="1" <?php echo $chk;?>><label class="control-label">Linea VoIP Aggiuntiva, con nuovo numero Terrecablate (+ 20,00 € + 2,00€/mese) </label>
	</div>	
	<?php endif; ?>

	<div class="checkbox">
		<?php $chk = ( @$fields['servizio_ribaltamento_impianto'] &&  $fields['servizio_ribaltamento_impianto']=='1') ? "checked='checked'": ""; ?>	
		<input type="checkbox" name="dati[servizio_ribaltamento_impianto]" id="servizio_ribaltamento_impianto" value="1" <?php echo $chk;?>><label class="control-label">Ribaltamento dell'impianto (+ 40,00 €)</label>
	</div>	
</div>