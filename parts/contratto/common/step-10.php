<?php 
$pdf_file = generate_contratto_pdf($this->contrattoUID);
?>

<p><a href="<?php echo $pdf_file;?>" target="_blank">Scarica contratto in pdf</a></p>

