<fieldset id="fields-tipologia-mantenimento-linee">
	<legend>6. Tipologia linea e Mantenimento del numero (Number Portability)</legend>
	
	<p>&nbsp;</p>
	<h4>Da compilare solo da parte dei titolari di linee telefoniche attualmente attive.</h4>


	<table class="table-responsive table-bordered tab-tipolinea">
		<thead>
			<tr>
				<th width="45px">POTS</th>
				<th width="45px">ISDN</th>
				<th width="45px">PBX</th>
				<th>Numero/capofila</th>
				<th>Portabilità dei<br>numeri telefonici</th>
				<th>Sottonumeri<br/>(solo ISDN)</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<?php $sel = ( @$fields['tipolinea_az_tipologia1'] ) ? $fields['tipolinea_az_tipologia1'] : ''; ?>
				<td>
					<div class="radio"><input type="radio" name="dati[tipolinea_az_tipologia1]" id="" value="POTS" <?php if($sel=='POTS') { echo "checked='checked'"; } ?> >
				</td>
				<td>
					<div class="radio"><input type="radio" name="dati[tipolinea_az_tipologia1]" id="" value="ISDN" <?php if($sel=='ISDN') { echo "checked='checked'"; } ?> >
				</td>
				<td>
					<?php $chk = ( @$fields['tipolinea_az_pbx1'] &&  $fields['tipolinea_az_pbx1']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_pbx1]" value="1" <?php echo $chk; ?> >
				</td>
				<td>
					<input type="text" name="dati[tipolinea_az_tel1]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_tel1'] ) ? $fields['tipolinea_az_tel1'] : ''; ?>" />
					<input type="text" name="dati[tipolinea_az_tel2]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_tel2'] ) ? $fields['tipolinea_az_tel2'] : ''; ?>" />
				</td>
				<td>
					<?php $port = ( @$fields['tipolinea_az_portabilita1'] ) ? $fields['tipolinea_az_portabilita1'] : ''; ?>
					<div class="radio">
						<input type="radio" name="dati[tipolinea_az_portabilita1]" value="si" <?php if($port=='si') { echo "checked='checked'"; } ?> ><label class="control-label">SI</label>
						<input type="radio" name="dati[tipolinea_az_portabilita1]" value="no" <?php if($port=='no') { echo "checked='checked'"; } ?> ><label class="control-label">NO</label>
					</div>
				</td>
				<td>
					<?php $chk = ( @$fields['tipolinea_az_multinumero1'] &&  $fields['tipolinea_az_multinumero1']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_multinumero1]" id="" value="1" <?php echo $chk; ?> ><label class="control-label">multinumero</label></div>
				</td>
				<td>
					<label>Codice migrazione + carattere di controllo</label>
					<input type="text" name="dati[tipolinea_az_codice_migrazione1]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_codice_migrazione1'] ) ? $fields['tipolinea_az_codice_migrazione1'] : ''; ?>" />
					<label>Codice migrazione + carattere di controllo</label>
					<input type="text" name="dati[tipolinea_az_codice_migrazione2]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_codice_migrazione2'] ) ? $fields['tipolinea_az_codice_migrazione2'] : ''; ?>" />
				</td>
			</tr>

			<tr>
				<?php $sel = ( @$fields['tipolinea_az_tipologia2'] ) ? $fields['tipolinea_az_tipologia2'] : ''; ?>
				<td>
					<div class="radio"><input type="radio" name="dati[tipolinea_az_tipologia2]" id="" value="POTS" <?php if($sel=='POTS') { echo "checked='checked'"; } ?> >
				</td>
				<td>
					<div class="radio"><input type="radio" name="dati[tipolinea_az_tipologia2]" id="" value="ISDN" <?php if($sel=='ISDN') { echo "checked='checked'"; } ?> >
				</td>
				<td>
					<?php $chk = ( @$fields['tipolinea_az_pbx2'] &&  $fields['tipolinea_az_pbx2']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_pbx2]" value="1" <?php echo $chk; ?> >
				</td>
				<td>
					<input type="text" name="dati[tipolinea_az_tel3]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_tel3'] ) ? $fields['tipolinea_az_tel3'] : ''; ?>" />
					<input type="text" name="dati[tipolinea_az_tel4]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_tel4'] ) ? $fields['tipolinea_az_tel4'] : ''; ?>" />
				</td>
				<td>
					<?php $port = ( @$fields['tipolinea_az_portabilita2'] ) ? $fields['tipolinea_az_portabilita2'] : ''; ?>
					<div class="radio">
						<input type="radio" name="dati[tipolinea_az_portabilita2]" id="" value="si" <?php if($port=='si') { echo "checked='checked'"; } ?> ><label class="control-label">SI</label>
						<input type="radio" name="dati[tipolinea_az_portabilita2]" id="" value="no" <?php if($port=='no') { echo "checked='checked'"; } ?> ><label class="control-label">NO</label>
					</div>
				</td>
				<td>
					<?php $chk = ( @$fields['tipolinea_az_multinumero2'] &&  $fields['tipolinea_az_multinumero2']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_multinumero2]" id="" value="1" <?php echo $chk; ?> ><label class="control-label">multinumero</label></div>
				</td>
				<td>
					<label>Codice migrazione + carattere di controllo</label>
					<input type="text" name="dati[tipolinea_az_codice_migrazione3]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_codice_migrazione3'] ) ? $fields['tipolinea_az_codice_migrazione3'] : ''; ?>" />
					<label>Codice migrazione + carattere di controllo</label>
					<input type="text" name="dati[tipolinea_az_codice_migrazione4]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_codice_migrazione4'] ) ? $fields['tipolinea_az_codice_migrazione4'] : ''; ?>" />
				</td>
			</tr>

			<tr>
				<?php $sel = ( @$fields['tipolinea_az_tipologia3'] ) ? $fields['tipolinea_az_tipologia3'] : ''; ?>
				<td>
					<div class="radio"><input type="radio" name="dati[tipolinea_az_tipologia3]" id="" value="POTS" <?php if($sel=='POTS') { echo "checked='checked'"; } ?> >
				</td>
				<td>
					<div class="radio"><input type="radio" name="dati[tipolinea_az_tipologia3]" id="" value="ISDN" <?php if($sel=='ISDN') { echo "checked='checked'"; } ?> >
				</td>
				<td>
					<?php $chk = ( @$fields['tipolinea_az_pbx3'] &&  $fields['tipolinea_az_pbx3']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_pbx3]" value="1" <?php echo $chk; ?> >
				</td>
				<td>
					<input type="text" name="dati[tipolinea_az_tel5]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_tel5'] ) ? $fields['tipolinea_az_tel5'] : ''; ?>" />
					<input type="text" name="dati[tipolinea_az_tel6]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_tel6'] ) ? $fields['tipolinea_az_tel6'] : ''; ?>" />
				</td>
				<td>
					<?php $port = ( @$fields['tipolinea_az_portabilita3'] ) ? $fields['tipolinea_az_portabilita3'] : ''; ?>
					<div class="radio">
						<input type="radio" name="dati[tipolinea_az_portabilita3]" id="" value="si" <?php if($port=='si') { echo "checked='checked'"; } ?> ><label class="control-label">SI</label>
						<input type="radio" name="dati[tipolinea_az_portabilita3]" id="" value="no" <?php if($port=='no') { echo "checked='checked'"; } ?> ><label class="control-label">NO</label>
					</div>
				</td>
				<td>
					<?php $chk = ( @$fields['tipolinea_az_multinumero3'] &&  $fields['tipolinea_az_multinumero3']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_multinumero3]" id="" value="1" <?php echo $chk; ?> ><label class="control-label">multinumero</label></div>
				</td>
				<td>
					<label>Codice migrazione + carattere di controllo</label>
					<input type="text" name="dati[tipolinea_az_codice_migrazione5]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_codice_migrazione5'] ) ? $fields['tipolinea_az_codice_migrazione5'] : ''; ?>" />
					<label>Codice migrazione + carattere di controllo</label>
					<input type="text" name="dati[tipolinea_az_codice_migrazione6]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_codice_migrazione6'] ) ? $fields['tipolinea_az_codice_migrazione6'] : ''; ?>" />
				</td>
			</tr>

			<tr>
				<?php $sel = ( @$fields['tipolinea_az_tipologia4'] ) ? $fields['tipolinea_az_tipologia4'] : ''; ?>
				<td>
					<div class="radio"><input type="radio" name="dati[tipolinea_az_tipologia4]" id="" value="POTS" <?php if($sel=='POTS') { echo "checked='checked'"; } ?> >
				</td>
				<td>
					<div class="radio"><input type="radio" name="dati[tipolinea_az_tipologia4]" id="" value="ISDN" <?php if($sel=='ISDN') { echo "checked='checked'"; } ?> >
				</td>
				<td>
					<?php $chk = ( @$fields['tipolinea_az_pbx4'] &&  $fields['tipolinea_az_pbx4']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_pbx4]" value="1" <?php echo $chk; ?> >
				</td>
				<td>
					<input type="text" name="dati[tipolinea_az_tel7]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_tel7'] ) ? $fields['tipolinea_az_tel7'] : ''; ?>" />
					<input type="text" name="dati[tipolinea_az_tel8]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_tel8'] ) ? $fields['tipolinea_az_tel8'] : ''; ?>" />
				</td>
				<td>
					<?php $port = ( @$fields['tipolinea_az_portabilita4'] ) ? $fields['tipolinea_az_portabilita4'] : ''; ?>
					<div class="radio">
						<input type="radio" name="dati[tipolinea_az_portabilita4]" id="" value="si" <?php if($port=='si') { echo "checked='checked'"; } ?> ><label class="control-label">SI</label>
						<input type="radio" name="dati[tipolinea_az_portabilita4]" id="" value="no" <?php if($port=='no') { echo "checked='checked'"; } ?> ><label class="control-label">NO</label>
					</div>
				</td>
				<td>
					<?php $chk = ( @$fields['tipolinea_az_multinumero4'] &&  $fields['tipolinea_az_multinumero4']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_multinumero4]" id="" value="1" <?php echo $chk; ?> ><label class="control-label">multinumero</label></div>
				</td>
				<td>
					<label>Codice migrazione + carattere di controllo</label>
					<input type="text" name="dati[tipolinea_az_codice_migrazione7]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_codice_migrazione7'] ) ? $fields['tipolinea_az_codice_migrazione7'] : ''; ?>" />
					<label>Codice migrazione + carattere di controllo</label>
					<input type="text" name="dati[tipolinea_az_codice_migrazione8]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_codice_migrazione8'] ) ? $fields['tipolinea_az_codice_migrazione8'] : ''; ?>" />
				</td>
			</tr>		
			
		</tbody>
	</table>


	<table class="table-responsive table-bordered tab-tipolinea">
		<tbody>
			<tr>
				<th width="100px" rowspan="2">
					<?php $chk = ( @$fields['tipolinea_az_soloadsl'] &&  $fields['tipolinea_az_soloadsl']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_soloadsl]" id="" value="1" <?php echo $chk; ?> ><label class="control-label"><strong>Solo ADSL</strong></label></div>
				</th>
				<th>numero di intentificazione</th>
				<th>Codice migrazione + carattere di controllo</th>
			</tr>
			
			<tr>
				<td>
					<input type="text" name="dati[tipolinea_az_numero_identificazione]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_numero_identificazione'] ) ? $fields['tipolinea_az_numero_identificazione'] : ''; ?>" />
				</td>
				<td>
					<input type="text" name="dati[tipolinea_az_codice_migrazione9]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_codice_migrazione9'] ) ? $fields['tipolinea_az_codice_migrazione9'] : ''; ?>" />
				</td>
			</tr>
		</tbody>
	</table>


	<table class="table-responsive table-bordered tab-tipolinea">
		<tbody>
			<tr>
				<th width="100px" rowspan="2">
					<?php $chk = ( @$fields['tipolinea_az_gnr'] &&  $fields['tipolinea_az_gnr']=='1') ? "checked='checked'": ""; ?>
					<div class="checkbox"><input type="checkbox" name="dati[tipolinea_az_gnr]" id="" value="1" <?php echo $chk; ?> ><label class="control-label"><strong>GNR</strong></label></div>
				</th>
				<th width="140px">inizio numerazione</th>
				<td>
					<input type="text" name="dati[tipolinea_az_gnr_inizio]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_gnr_inizio'] ) ? $fields['tipolinea_az_gnr_inizio'] : ''; ?>" />
				</td>
			</tr>

			<tr>
				<th width="140px">fine numerazione</th>
				<td>
					<input type="text" name="dati[tipolinea_az_gnr_fine]" class="form-control" value="<?php echo ( @$fields['tipolinea_az_gnr_fine'] ) ? $fields['tipolinea_az_gnr_fine'] : ''; ?>" />
				</td>
			</tr>
			
			
		</tbody>
	</table>

	
	<p>&nbsp;</p>
	<h4>DATI ESATTI INTESTATARIO E UBICAZIONE ATTUALE LINEA TELEFONICA (riprendere dati dall’attuale bolletta ed allegarne possibilmente copia)</h4>

	<div class="form-group col-md-6">
		<label for="tipolinea_cognome_intestatario">Denominazione/Ragione sociale o Cognome</label>
		<input type="text" name="dati[tipolinea_cognome_intestatario]" id="tipolinea_cognome_intestatario" class="form-control" placeholder="cognome" value="<?php echo ( @$fields['tipolinea_cognome_intestatario'] ) ? $fields['tipolinea_cognome_intestatario'] : ''; ?>" >
	</div>

	<div class="form-group col-md-6">
		<label for="tipolinea_nome_intestatario">Nome</label>
		<input type="text" name="dati[tipolinea_nome_intestatario]" id="tipolinea_nome_intestatario" class="form-control" placeholder="nome" value="<?php echo ( @$fields['tipolinea_nome_intestatario'] ) ? $fields['tipolinea_nome_intestatario'] : ''; ?>" >
	</div>

	<div class="form-group col-md-9">
		<label for="tipolinea_indirizzo_intestatario">Indirizzo intestatario</label>
		<input type="text" name="dati[tipolinea_indirizzo_intestatario]" id="tipolinea_indirizzo_intestatario" class="form-control" placeholder="indirizzo" value="<?php echo ( @$fields['tipolinea_indirizzo_intestatario'] ) ? $fields['tipolinea_indirizzo_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-3">
		<label for="tipolinea_civico_intestatario">Numero civico</label>
		<input type="text" name="dati[tipolinea_civico_intestatario]" id="tipolinea_civico_intestatario" class="form-control" placeholder="n. civico" value="<?php echo ( @$fields['tipolinea_civico_intestatario'] ) ? $fields['tipolinea_civico_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_citta_intestatario">Città</label>
		<input type="text" name="dati[tipolinea_citta_intestatario]" id="tipolinea_citta_intestatario" class="form-control" placeholder="città" value="<?php echo ( @$fields['tipolinea_citta_intestatario'] ) ? $fields['tipolinea_citta_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_provincia_intestatario">Provincia</label>
		<input type="text" name="dati[tipolinea_provincia_intestatario]" id="tipolinea_provincia_intestatario" class="form-control" placeholder="provincia" value="<?php echo ( @$fields['tipolinea_provincia_intestatario'] ) ? $fields['tipolinea_provincia_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_cap_intestatario">CAP</label>
		<input type="text" name="dati[tipolinea_cap_intestatario]" id="tipolinea_cap_intestatario" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields['tipolinea_cap_intestatario'] ) ? $fields['tipolinea_cap_intestatario'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-9">
		<label for="tipolinea_indirizzo_linea">Indirizzo ubicazione linea (se diverso da quello sopra indicato)</label>
		<input type="text" name="dati[tipolinea_indirizzo_linea]" id="tipolinea_indirizzo_linea" class="form-control" placeholder="indirizzo" value="<?php echo ( @$fields['tipolinea_indirizzo_linea'] ) ? $fields['tipolinea_indirizzo_linea'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-3">
		<label for="tipolinea_civico_linea">Numero civico</label>
		<input type="text" name="dati[tipolinea_civico_linea]" id="tipolinea_civico_linea" class="form-control" placeholder="n. civico" value="<?php echo ( @$fields['tipolinea_civico_linea'] ) ? $fields['tipolinea_civico_linea'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_citta_linea">Città</label>
		<input type="text" name="dati[tipolinea_citta_linea]" id="tipolinea_citta_linea" class="form-control" placeholder="città" value="<?php echo ( @$fields['tipolinea_citta_linea'] ) ? $fields['tipolinea_citta_linea'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_provincia_linea">Provincia</label>
		<input type="text" name="dati[tipolinea_provincia_linea]" id="tipolinea_provincia_linea" class="form-control" placeholder="provincia" value="<?php echo ( @$fields['tipolinea_provincia_linea'] ) ? $fields['tipolinea_provincia_linea'] : ''; ?>" >
	</div>
	
	<div class="form-group col-md-4">
		<label for="tipolinea_cap_linea">CAP</label>
		<input type="text" name="dati[tipolinea_cap_linea]" id="tipolinea_cap_linea" class="form-control" placeholder="c.a.p." value="<?php echo ( @$fields['tipolinea_cap_linea'] ) ? $fields['tipolinea_cap_linea'] : ''; ?>" >
	</div>
	

</fieldset>