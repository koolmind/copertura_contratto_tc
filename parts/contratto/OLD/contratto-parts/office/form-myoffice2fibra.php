<?php 
/* 
 * Template part > form BUSINESS MyOffice 2 Fibra
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
						
						<div class="col-md-6">
							<i class="fa fa-check" aria-hidden="true"></i><strong>MyOffice 2 FIBRA</strong>
						</div>
					</div>
					
					
					<div class="clearfix sub-section">
						<?php include('form-part-office-3-consegna-dispositivo.php'); ?>					
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
				
				<input type="hidden" name="dati[offerta_selezionata]" id="offerta_selezionata" value="myoffice2fibra">
				<input type="hidden" name="isSubmitted" value="1">
		
				<button type="submit" name="btnSubmit">AVANTI &raquo;</button>
				<small class="text-danger form-message" id="form-message-confirm">IMPOSSIBILE PROCEDERE! Alcuni campi obbligatori non sono stati completati!</small>
			</form>


		</div>
	</div>
</section>