<?php $sel =  (@$fields['stato_attuale_linee'] ) ? $fields['stato_attuale_linee'] : ''; ?>

<fieldset id="fields-stato-attuale-linee">
	<legend>4. Stato attuale linee telefoniche</legend>
	<p>Per poter effettuare l’attivazione delle linee telefoniche di terrecablate è necessario indicare se la linea o le linee da migrare sono: una o più linee telefoniche attive, una o più linee telefoniche che sono
state attive ma che non lo sono adesso o una nuova linea.</p>
	
	<div class="form-group" id="radios-stato_attuale_linee">

		<div class="radio col-md-4">
			<input type="radio" name="dati[stato_attuale_linee]" id="stato_attuale_migrazione" <?php if($sel =='stato_attuale_migrazione') {echo "checked='checked'";} ?> class="tc-required" value="stato_attuale_migrazione"><label class="control-label">All'indirizzo di attivazione sono presenti una o più linee telefoniche di altro operatore attive da migrare <strong>(compilare il punto 6)</strong></label>
		</div>	



		<div class="radio col-md-4">
			<input type="radio" name="dati[stato_attuale_linee]" id="stato_attuale_nuovalinea" <?php if($sel =='stato_attuale_nuovalinea') {echo "checked='checked'";} ?> class="tc-required" value="stato_attuale_nuovalinea"><label class="control-label">All'indirizzo di attivazione sono state presenti una o più linee telefoniche di altro operatore adesso non attive, da riattivare, in casa non è mai stata attiva alcuna linea telefonica,va portata una nuova linea <strong>(compilare il punto 5)</strong></label>
		</div>	
	


		<div class="radio col-md-4">
			<input type="radio" name="dati[stato_attuale_linee]" id="stato_attuale_soloadsl" class="tc-required" <?php if($sel =='stato_attuale_soloadsl') {echo "checked='checked'";} ?> value="stato_attuale_soloadsl"><label class="control-label">All'indirizzo di attivazione sono presenti solo linee Internet attive <strong>(compilare il punto 6)</strong></label>
		</div>	
		
		<small class="text-danger form-message" style="clear:both;">Campo richiesto. Selezionare un'opzione.</small>
	</div>
	
	
</fieldset>