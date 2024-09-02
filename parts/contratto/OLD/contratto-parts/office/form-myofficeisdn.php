<?php 
/* 
 * Template part > form BUSINESS MyOffice ISDN
 */
?>
<section id="main-content">
	<div class="container contratti-wrap contratti-A">
		<div class="row">
			<h1 class="fontdin">MyOffice Fibra <small>- PROPOSTA DI CONTRATTO PER LA TUA IMPRESA</small></h1>

			<p class="fontdin">La presente Proposta di Contratto deve essere compilata in ogni sua parte, stampata, firmata e trasmessa a:<br>
			<strong>Terrecablate Reti e Servizi, viale Toselli 9/A - 53100 Siena</strong></p> 

			<form class="form form-horizontal form-contratto" id="frm-contratto" method="post" data-url ="<?php echo admin_url('admin-ajax.php');?>" >
				<?php include('form-part-office-1.php'); ?>
			
				<?php include('form-part-office-2.php'); ?>
				
				<fieldset id="fields-prodotti-servizi-richiesti">
					<legend>3. Prodotti e servizi richiesti</legend>
					<div class="clearfix sub-section">
						<h4>SERVIZI INTERNET* E TELEFONO TERRECABLATE</h4>
						
						<div class="col-md-3">
							<i class="fa fa-check" aria-hidden="true"></i><strong>MyOffice ISDN</strong>
						</div>

						<div class="form-group col-md-9">
							<label class="col-md-5 control-label">Tipo di Borchia</label>
							<div class="col-md-7"> 
								<div class="radio radio-inline">
									<?php $sel = ( @$fields['borchia'] ) ? $fields['borchia'] : 'nt1'; ?>
									<input type="radio" name="borchia" id="borchia-nt1" value="NT1" <?php if($sel=='nt1'){ echo "checked='checked'"; } ?> ><label class="control-label">NT1</label>
									<input type="radio" name="borchia" id="borchia-nt1plus" value="NT1 PLUS" <?php if($sel=='nt1 plus'){ echo "checked='checked'"; } ?> ><label class="control-label">NT1 PLUS</label>
								</div>
							</div>
						
							<label class="col-md-5 control-label">Quantità numeri aggiuntivi per servizio (Max 8): </label>
							<div class="col-md-7"> 
								<input type="text" class="form-control" name="numeri_isdn" id="numeri_isdn" value="<?php echo (@$fields['numeri_isdn']) ? $fields['numeri_isdn'] : '';?>" >
							</div>
						</div>

					</div>
					

					<div class="clearfix sub-section">
						<?php include('form-part-office-3-opzioni-servizi.php'); ?>
					</div>
				</fieldset>

				<?php include(__DIR__.'/../common/form-part-4.php'); ?>

				<?php include(__DIR__.'/../common/form-part-5.php'); ?>

				<?php include('form-part-office-6.php'); ?>

				<?php include('form-part-office-7.php'); ?>

				<?php include(__DIR__.'/../common/form-part-8-9.php'); ?>

				<?php include('form-part-office-modA.php'); ?>
				
				<input type="hidden" name="dati[offerta_selezionata]" id="offerta_selezionata" value="myofficefibra">
				<input type="hidden" name="isSubmitted" value="1">
		
				<button type="submit" name="btnSubmit">AVANTI &raquo;</button>
				<small class="text-danger form-message" id="form-message-confirm">IMPOSSIBILE PROCEDERE! Alcuni campi obbligatori non sono stati completati!</small>
			</form>


		</div>
	</div>
</section>