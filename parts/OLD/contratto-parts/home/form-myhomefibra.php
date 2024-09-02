<?php 
/* 
 * Template part > form Residenziale MyHome Fibra
 */
?>
<section id="main-content">
	<div class="container contratti-wrap contratti-R">
		<div class="row">
			<h1 class="fontdin">MyHome Fibra <small>- PROPOSTA DI CONTRATTO PER LA TUA CASA</small></h1>

			<p class="fontdin">La presente Proposta di Contratto deve essere compilata in ogni sua parte, stampata, firmata e trasmessa a:<br>
			<strong>Terrecablate Reti e Servizi, viale Toselli 9/A - 53100 Siena</strong></p> 

			<form class="form form-horizontal form-contratto" id="frm-contratto" method="post" data-url ="<?php echo admin_url('admin-ajax.php');?>" >
				<?php include('form-part-home-1.php'); ?>
			
				<?php include('form-part-home-2.php'); ?>
				
				<fieldset id="fields-prodotti-servizi-richiesti">
					<legend>3. Prodotti e servizi richiesti</legend>
					<div class="clearfix sub-section">
						<h4>OFFERTA COMMERCIALE TERRECABLATE</h4>
						
						<div class="col-md-6">
							<i class="fa fa-check" aria-hidden="true"></i><strong>MyHome Fibra</strong>
						</div>
						
						
						<div class="form-group col-md-6">
							<label class="col-md-5 control-label">Modem</label>
							<div class="col-md-7"> 
								<!--div>									
									<!--input type="radio" name="modem" id="modem-si" value="si" checked="checked"><label class="control-label">SI</label>
									<input type="radio" name="modem" id="modem-no" value="no"><label class="control-label">NO</label>
								</div -->
								<div>
									<i class="fa fa-check" aria-hidden="true"></i><label class="control-label">obbligatorio</label>
									<input type="hidden" name="dati[modem]" id="modem-si" value="si">
								</div>
							</div>
						
							<!--label class="col-md-5 control-label">Filtro</label>
							<div class="col-md-7"> 
								<div class="radio radio-inline">
									<input type="radio" name="filtro" id="filtro-plug" value="plug" checked="checked"><label class="control-label">PLUG</label>
									<input type="radio" name="filtro" id="filtro-tripolare" value="tripolare"><label class="control-label">TRIPOLARE</label>
								</div>
							</div-->
						</div>
					</div>
					
					
					<div class="clearfix sub-section">
						
						<?php include('form-part-home-3-consegna-dispositivo.php'); ?>					
						
					</div>


					<div class="clearfix sub-section">
						<?php include('form-part-home-3-opzioni-servizi.php'); ?>
					</div>
				</fieldset>

				<?php include(__DIR__.'/../common/form-part-4.php'); ?>

				<?php include(__DIR__.'/../common/form-part-5.php'); ?>

				<?php include('form-part-home-6.php'); ?>

				<?php include('form-part-home-7.php'); ?>

				<?php include(__DIR__.'/../common/form-part-8-9.php'); ?>

				<?php include('form-part-home-modA.php'); ?>
				
				<input type="hidden" name="dati[offerta_selezionata]" id="offerta_selezionata" value="myhomefibra">
				<input type="hidden" name="isSubmitted" value="1">
		
				<button type="submit" name="btnSubmit">AVANTI &raquo;</button>
				<small class="text-danger form-message" id="form-message-confirm">IMPOSSIBILE PROCEDERE! Alcuni campi obbligatori non sono stati completati!</small>
			</form>


		</div>
	</div>
</section>