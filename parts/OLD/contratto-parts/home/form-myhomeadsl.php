<?php 
/* 
 * Template part > form Residenziale MyHome
 */
?>
<section id="main-content">
    
	<div class="container contratti-wrap contratti-R">
		<div class="row">
			<h1 class="fontdin">MyHome Adsl <small>- PROPOSTA DI CONTRATTO PER LA TUA CASA</small></h1>

			<p class="fontdin">La presente Proposta di Contratto deve essere compilata in ogni sua parte, stampata, firmata e trasmessa a:<br>
			<strong>Terrecablate Reti e Servizi, viale Toselli 9/A - 53100 Siena</strong></p> 

			<form class="form form-horizontal form-contratto" id="frm-contratto" method="post" data-url ="<?php echo admin_url('admin-ajax.php');?>" >
				<?php include('form-part-home-1.php'); ?>
			
				<?php include('form-part-home-2.php'); ?>
				
				<fieldset id="fields-prodotti-servizi-richiesti">
					<legend>3. Prodotti e servizi richiesti</legend>
					
					<div class="clearfix sub-section">				
						<h3>OFFERTA COMMERCIALE TERRECABLATE</h3>
						
						<div class="col-md-6">
							<i class="fa fa-check" aria-hidden="true"></i><strong>MyHome ADSL</strong>
						</div>
						
						<div class="form-group col-md-6">
							
							<label class="col-md-5 control-label">Modem <sup>1</sup></label>
							<div class="col-md-7"> 
								<div class="radio radio-inline">
									<input type="radio" name="dati[modem]" id="modem-si" value="si" checked="checked"><label class="control-label">SI</label>
									<input type="radio" name="dati[modem]" id="modem-no" value="no"><label class="control-label">NO</label>
								</div>
							</div>
							
							<?php /*if (@$_GET['fr']==1):?>
								<span class="help-block">Sei raggiunto dai nostri servizi Fuori Rete. Il modem è obbligatorio.</span>
							<?php endif; */?>
						
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
					
						<div class="col-md-12">
							<span class="help-block">(1) Ove il dispositivo fosse opzionale, l'indicazione è obbligatoria. Nel caso in cui il cliente ometta l'indicazione il dispositivo NON verrà inviato.</span>
						</div>					
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
		
				<input type="hidden" name="dati[offerta_selezionata]" id="offerta_selezionata" value="myhomeadsl">
				<input type="hidden" name="isSubmitted" value="1">
		
				<button type="submit" name="btnSubmit">AVANTI &raquo;</button>
				<small class="text-danger form-message" id="form-message-confirm">IMPOSSIBILE PROCEDERE! Alcuni campi obbligatori non sono stati completati!</small>
			</form>

		</div>
	</div>
</section>
