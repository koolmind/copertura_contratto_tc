<?php 

$pdf = new CUSTOMPDF('P','mm','A4');
$pdf->AddFont('FFDin','','FFDINPro-Regular.php');
$pdf->AddFont('FFDin','B','FFDINPro-Bold.php');
$pdf->AddFont('FFDin','BI','FFDINPro-BoldItalic.php');

$pdf->SetMargins(5, 0, 5);
$pdf->SetLineWidth(.3);
$pdf->SetDrawColor(0, 86, 122);
$pdf->SetTitle('Proposta di contratto MyHome');
$pdf->SetAuthor('Terrecablate Reti e Servizi srl a socio unico');


$header_image = get_bloginfo('template_directory')."/img/pdf-testa-home.png";
$footer_image = get_bloginfo('template_directory')."/img/pdf-piede-home.png";

$lineHeight=5;
$cellHeight=6;


$pdf->AddPage();
$pdf->Image($header_image, 0, 5, 210,25.7);
$pdf->Image($footer_image, 0, 278, 210,16);

$pdf->SetY(35);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'Sezione riservata a Terrecablate');
$pdf->Ln(4);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','',10);


$col = array();
$col[] = array('text' => 'ID Contratto:', 'width' => '80', 'height' => 10, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.2', 'linearea' => 'B');
$col[] = array('text' => ' ', 'width' => '20', 'height' => 10, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.2', 'linearea' => '');
$col[] = array('text' => 'Data:', 'width' => '80', 'height' => 10, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Line(5,57,205,57);

$pdf->SetY(62);
$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','B',14);
$pdf->MultiCell(0,$lineHeight, 'PROPOSTA DI CONTRATTO PER LA TUA CASA'); 

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'La presente Proposta di Contratto deve essere compilata in ogni sua parte, firmata e trasmessa a:');
$pdf->SetFont('FFDin','B',10);
$pdf->MultiCell(0,$lineHeight, 'Terrecablate Reti e Servizi, viale Toselli 9/A - 53100 Siena');

$pdf->Ln(3);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('FFDin','',8);
$pdf->SetFillColor(244,244,244);
$pdf->MultiCell(0,$lineHeight, utf8_decode("Il/La sottoscritto/a, di seguito e nel prosieguo altresì \"Cliente\" così come sotto identificata/o, dichiara di aver ricevuto da Terrecablate Reti e Servizi S.r.l. completa informativa pre-contrattuale secondo il modello allegato alla presente Proposta, nonché completa informativa in ordine all'esercizio del diritto di recesso ai sensi dell'art. 49, comma 1, lett. h) del Codice del Consumo (Ripensamento), come da modello allegato, anteriormente alla presentazione della presente Proposta ed a mezzo delle presente Proposta, pertanto, propone a Terrecablate Reti e Servizi S.r.l. di concludere un contratto per la fornitura del Servizio di telefonia fissa e/o accesso internet secondo l'Offerta Commerciale in appresso indicata, alle condizioni e con le modalità risultanti dalla Proposta, e nei documenti che compongono il Contratto quali le Condizioni Generali di Contratto, la Carta dei Servizi, l'Offerta Commerciale e l'Informativa sul trattamento dei dati personali (D.Lgs 196 del 30 giungo 2003), che dichiara di ben conoscere ed accettare, in ogni loro parte."),0,'L', true);

$pdf->Ln(8);
$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '1. Dati Anagrafici e recapiti del Cliente');

$pdf->SetFont('FFDin','',10);
$pdf->SetTextColor(0,0,0);

$col = array();
$col[] = array('text' => utf8_decode('Cognome: '. strtoupper($fields['cognome_cliente']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Nome: '. strtoupper($fields['nome_cliente']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;


$col = array();
$col[] = array('text' => utf8_decode('Indirizzo Via/Piazza: '. strtoupper($fields['indirizzo_cliente']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('N°: '. strtoupper($fields['numero_civico_cliente']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;


$col = array();
$col[] = array('text' => utf8_decode('Città: '. strtoupper($fields['citta_cliente']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Provincia: '. strtoupper($fields['provincia_cliente']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('CAP: '. strtoupper($fields['cap_cliente']) ), 'width' => '64', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => utf8_decode('Codice Fiscale: '. strtoupper($fields['codice_fiscale_cliente']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => utf8_decode('Cell: '. strtoupper($fields['cell_cliente']) ), 'width' => '64', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['tel_cliente'] ? strtoupper($fields['tel_cliente']) : "";
$col[] = array('text' => utf8_decode('Tel: '.  $temp), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['fax_cliente'] ? strtoupper($fields['fax_cliente']) : "";
$col[] = array('text' => utf8_decode('Fax: '.  $temp), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;


$col = array();
$col[] = array('text' => utf8_decode('Data di nascita: '. strtoupper($fields['data_nascita_cliente']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Luogo di nascita: '. strtoupper($fields['luogo_nascita_cliente']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$col = array();
$col[] = array('text' => utf8_decode('Documento *: '. strtoupper($contratti_strings[$fields['tipo_documento_cliente']]) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('N°: '. strtoupper($fields['numero_documento_cliente']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => utf8_decode('Rilasciato da: '. strtoupper($fields['rilasciato_documento_cliente']) ), 'width' => '110', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('il: '. strtoupper($fields['data_documento_cliente']) ), 'width' => '45', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Scadenza: '. strtoupper($fields['scadenza_documento_cliente']) ), 'width' => '45', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => utf8_decode('Email: '. strtoupper($fields['email_cliente']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',6);
$pdf->MultiCell(0,$lineHeight, '* Allegare fotocopia del documento indicato');

$pdf->Ln(10);
$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '2. Indirizzo di attivazione e fornitura servizi');

$pdf->SetFont('FFDin','',10);
$pdf->SetTextColor(0,0,0);


$col = array();
$col[] = array('text' => utf8_decode('Presso: '. strtoupper($fields['presso_attivazione']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => utf8_decode('Indirizzo Via/Piazza: '. strtoupper($fields['indirizzo_attivazione']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('N°: '. strtoupper($fields['numero_civico_attivazione']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;


$col = array();
$col[] = array('text' => utf8_decode('Città: '. strtoupper($fields['citta_attivazione']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Provincia: '. strtoupper($fields['provincia_attivazione']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('CAP: '. strtoupper($fields['cap_attivazione']) ), 'width' => '64', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


/* ***********************
 * 	PAGINA 2
 */
$pdf->AddPage();
$pdf->Image($header_image, 0, 5, 210,25.7);
$pdf->Image($footer_image, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '3. Prodotti e Servizi richiesti');

$pdf->Ln(3);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','B',11);
$pdf->MultiCell(0,$lineHeight, 'OFFERTA COMMERCIALE TERRECABLATE');
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,$lineHeight, utf8_decode( $contratti_strings[$fields['offerta_selezionata']] ) );

$pdf->Ln(4);


if(@$fields['modem'] =='si' /*&& @$fields['filtro']*/) :
	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','B',11);
	$pdf->MultiCell(0,$lineHeight, 'MODEM WIFI');
	$pdf->SetFont('FFDin','',10);
	/*if($fields['offerta_selezionata'] == 'myhomeadsl' ){
		$pdf->MultiCell(0,$lineHeight, utf8_decode('Offerta MyHome ADSL, per i clienti raggiunti direttamente dalla rete Terrecablate il dispositivo è consigliato') );
		$pdf->MultiCell(0,$lineHeight, utf8_decode("Offerta MyHome ADSL, per i clienti NON raggiunti direttamente dalla rete Terrecablate il dispositivo è obbligatorio") );
	} */
	if($fields['offerta_selezionata'] == 'myhomefibra' ){
		$pdf->MultiCell(0,$lineHeight, utf8_decode("Offerta MyHome FIBRA, il dispositivo WI-FI UltraFibra è obbligatorio e già incluso nell'offerta") );
	}

	$pdf->SetTextColor(0, 0,0);
	$col = array();
	$col[] = array('text' => utf8_decode('Dispositivo (modem)*: '. strtoupper($fields['modem']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	/*$col[] = array('text' => utf8_decode('Filtro: '. strtoupper($fields['filtro']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');*/
	$columns[] = $col;
	
	$pdf->WriteTable($columns);
	$columns = null;
	
	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','',8);
	$pdf->MultiCell(0,$lineHeight, utf8_decode("* Nel caso in cui il cliente ometta l'indicazione il dispositivo NON verrà inviato.") ); 

	$pdf->SetFont('FFDin','',10);


	$pdf->Ln(4);

	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','B',11);
	$pdf->MultiCell(0,$lineHeight, 'INDIRIZZO DI INVIO DEL DISPOSITIVO');

	$pdf->SetTextColor(0, 0,0);
	$pdf->SetFont('FFDin','',10);
	if(@$fields['indirizzo_dispositivo']) :

		$col = array();
		$col[] = array('text' => utf8_decode('Presso: '. strtoupper($fields['presso_dispositivo']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
		$columns[] = $col;

		$col = array();
		$col[] = array('text' => utf8_decode('Indirizzo Via/Piazza: '. strtoupper($fields['indirizzo_dispositivo']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
		$col[] = array('text' => utf8_decode('N°: '. strtoupper($fields['numero_civico_dispositivo']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
		$columns[] = $col;

		$col = array();
		$col[] = array('text' => utf8_decode('Città: '. strtoupper($fields['citta_dispositivo']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
		$col[] = array('text' => utf8_decode('Provincia: '. strtoupper($fields['provincia_dispositivo']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
		$col[] = array('text' => utf8_decode('CAP: '. strtoupper($fields['cap_dispositivo']) ), 'width' => '64', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
		$columns[] = $col;

		$pdf->WriteTable($columns);
		$columns = null;

	else:
		$pdf->MultiCell(0,$lineHeight, utf8_decode('COME SOPRA ( si veda punto 2 )') );
	endif;
endif;

$pdf->Ln(4);

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','B',11);
$pdf->MultiCell(0,$lineHeight, 'OPZIONI TRAFFICO');

$pdf->Ln(1);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','',11);

$col = array();
$col[] = array('text' => utf8_decode('Chiamate verso cellulari nazionali'), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Chiamate verso fissi nazionali'), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['opzione_cellulari_nazionali'] ? $contratti_strings[$fields['opzione_cellulari_nazionali']] : "nessuna";
$col[] = array('text' => $temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['opzione_fissi_nazionali'] ? "minuti illimitati" : "nessuna";
$col[] = array('text' => $temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(4);

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','B',11);
$pdf->MultiCell(0,$lineHeight, 'SERVIZI SUPPLEMENTARI');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('FFDin','',11);
$temp ="";
if (@$fields['servizio_trasferimento_chiamata']) $temp.= "Trasferimento di chiamata, "; 
if (@$fields['servizio_identificazione_chiamante']) $temp.= "Identificazione chiamante, ";
if (@$fields['servizio_disabilitazione_identificazione']) $temp.= "Disabilitazione identificazione al chiamato, ";
if (@$fields['servizio_avviso_di_chiamata']) $temp.= "Avviso di chiamata, ";
if (@$fields['servizio_installazione_apparato']) $temp.="Intervento di installazione e configurazione apparati, ";
if (@$fields['servizio_dettaglio_chiamate']) $temp.="Dettaglio chiamate, ";
if (@$fields['servizio_linea_voip']) $temp.= "Linea VoIP aggiuntiva, ";
if (@$fields['servizio_ribaltamento_impianto']) $temp.= "Ribaltamento impianto, ";
$temp = ($temp) ? substr($temp, 0, -2) : "nessuna opzione";

$pdf->MultiCell(0,$lineHeight, $temp);

$pdf->Ln(10);
$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '4. Stato attuale linee telefoniche');

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, utf8_decode("Per poter effettuare l'attivazione delle linee telefoniche di Terrecablate è necessario indicare se la linea è una linea telefonica attiva, una linea telefonica che è stata attiva ma che non lo è adesso o se è necessario portare una nuova linea") );
$pdf->SetFont('FFDin','IB',10);
$pdf->MultiCell(0,$lineHeight, utf8_decode($contratti_strings[$fields['stato_attuale_linee']]),0,'C' );



/* ***********************
 * 	PAGINA 3
 */
$pdf->AddPage();
$pdf->Image($header_image, 0, 5, 210,25.7);
$pdf->Image($footer_image, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '5. Richiesta attivazione nuove linee');

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','',10);
$temp = ($fields['stato_attuale_linee'] == 'stato_attuale_nuovalinea') ? strtoupper(utf8_decode($fields['indirizzo_nuova_linea'])) : "-";
$pdf->MultiCell(0,$lineHeight, 'Indirizzo nuova linea: '. $temp );


$pdf->Ln(10);

$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '6. Tipologia linea e Mantenimento del numero (Number Portability)');
$pdf->Ln(4);
$pdf->SetFont('FFDin','',10);
$pdf->SetTextColor(0, 86, 122);
$pdf->MultiCell(0,$lineHeight, utf8_decode("Da compilare solo da parte dei titolari di linee telefoniche attualmente attive") );


// INTESTAZIONE TABELLA 6.a
$col = array();
$col[] = array('text' => utf8_decode('Linea telefonica ed internet'), 'width' => '25', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Solo linea telefonica'), 'width' => '25', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Numero telefonico'), 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Mantenimento attuale numero*'), 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('Operatore telefonico attuale/ codice di migrazione + carattere di controllo**'), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

// CORPO TABELLA 6.a con rowspan simulato
$col = array();
$temp = (@$fields['tipolinea_tipologia'] == 'internet_telefono') ? "X" : "";
$col[] = array('text' => $temp, 'width' => '25', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'L');

$temp = (@$fields['tipolinea_tipologia'] == 'solo_telefono') ? "X" : "";
$col[] = array('text' => $temp, 'width' => '25', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');

$temp = @$fields['tipolinea_tel1'] ? utf8_decode($fields['tipolinea_tel1']):"";
$col[] = array('text' => $temp, 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');

$temp = (@$fields['tipolinea_mantieni_tel'] && @$fields['tipolinea_tipologia'] != 'solo_internet') ? strtoupper($fields['tipolinea_mantieni_tel']):"";
$col[] = array('text' => $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');

$col[] = array('text' => 'Operatore', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LR');
$columns[] = $col;

$col = array();
$col[] = array('text' => ' ', 'width' => '120', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'L');

$temp = (@$fields['tipolinea_operatore_tel'] && @$fields['tipolinea_tipologia'] != 'solo_internet') ? utf8_decode($fields['tipolinea_operatore_tel']) : "";
$col[] = array('text' => $temp, 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LRB');
$columns[] = $col;

$col = array();
$col[] = array('text' => ' ', 'width' => '120', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LR');

$col[] = array('text' => 'cod. Migrazione + carattere di controllo', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LR');
$columns[] = $col;

$col = array();
$col[] = array('text' => ' ', 'width' => '120', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LR');
$temp = (@$fields['tipolinea_codice_migrazione1'] && @$fields['tipolinea_tipologia'] != 'solo_internet') ? utf8_decode($fields['tipolinea_codice_migrazione1']) : "";
$col[] = array('text' => $temp, 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LRB');
$columns[] = $col;

$col = array();
$col[] = array('text' => ' ', 'width' => '120', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LR');

$col[] = array('text' => 'cod. Migrazione + carattere di controllo', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LR');
$columns[] = $col;

$col = array();
$col[] = array('text' => ' ', 'width' => '120', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LRB');
$temp = (@$fields['tipolinea_codice_migrazione2'] && @$fields['tipolinea_tipologia'] != 'solo_internet') ? utf8_decode($fields['tipolinea_codice_migrazione2']) : "";
$col[] = array('text' => $temp, 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'LRB');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$pdf->Ln(2);

// INTESTAZIONE TABELLA 6.b
$col = array();
$col[] = array('text' => utf8_decode('Linea solo internet'), 'width' => '50', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'LTRB');
$col[] = array('text' => utf8_decode('Numero di identificazione'), 'width' => '70', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => utf8_decode('cod. Migrazione + carattere di controllo'), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

// CORPO TABELLA 6.b
$col = array();
$temp = (@$fields['tipolinea_tipologia'] == 'solo_internet') ? "X" : "";
$col[] = array('text' => $temp, 'width' => '50', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'BLR');

$temp = (@$fields['tipolinea_numero_identificazione'] && @$fields['tipolinea_tipologia'] == 'solo_internet')  ? utf8_decode($fields['tipolinea_numero_identificazione']) : "";
$col[] = array('text' => $temp, 'width' => '70', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'BLR');

$temp = (@$fields['tipolinea_codice_migrazione2'] && @$fields['tipolinea_tipologia'] == 'solo_internet')? utf8_decode($fields['tipolinea_codice_migrazione3']) : "";
$col[] = array('text' => $temp, 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'BLR');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;



$pdf->Ln(10);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',11);
$pdf->MultiCell(0,$lineHeight, utf8_decode("DATI ESATTI INTESTATARIO E UBICAZIONE ATTUALE LINEA TELEFONICA") );
$pdf->SetFont('FFDin','',9);
$pdf->MultiCell(0,$lineHeight, utf8_decode("riprendere dati dall'attuale bolletta ed allegarne possibilmente copia") );
$pdf->SetFont('FFDin','',11);
$pdf->SetTextColor(0,0,0);

$col = array();
$temp = @$fields['tipolinea_cognome_intestatario'] ? strtoupper(utf8_decode($fields['tipolinea_cognome_intestatario'])) : "";
$col[] = array('text' => 'Cognome: '. $temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['tipolinea_nome_intestatario'] ? strtoupper(utf8_decode($fields['tipolinea_nome_intestatario'])) : "";
$col[] = array('text' => 'Nome: '. $temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['tipolinea_indirizzo_intestatario'] ? strtoupper(utf8_decode($fields['tipolinea_indirizzo_intestatario'])) : "";
$col[] = array('text' => 'Indirizzo intestatario: '. $temp, 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['tipolinea_civico_intestatario'] ? strtoupper(utf8_decode($fields['tipolinea_civico_intestatario'])) : "";
$col[] = array('text' => utf8_decode('N°. '). $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['tipolinea_citta_intestatario'] ? strtoupper(utf8_decode($fields['tipolinea_citta_intestatario'])) : "";
$col[] = array('text' => utf8_decode('Città: ').$temp, 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['tipolinea_provincia_intestatario'] ? strtoupper(utf8_decode($fields['tipolinea_provincia_intestatario'])) : "";
$col[] = array('text' => 'Provincia: '. $temp, 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['tipolinea_cap_intestatario'] ? strtoupper(utf8_decode($fields['tipolinea_cap_intestatario'])) : "";
$col[] = array('text' => 'CAP: '. $temp, 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['tipolinea_indirizzo_linea'] ? strtoupper(utf8_decode($fields['tipolinea_indirizzo_linea'])) : "";
$col[] = array('text' =>'Indirizzo ubicazione linea (se diverso da quello sopra indicato): '.$temp, 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['tipolinea_civico_linea'] ? strtoupper(utf8_decode($fields['tipolinea_civico_linea'])) : "";
$col[] = array('text' =>utf8_decode('N°. '). $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;


$col = array();
$temp = @$fields['tipolinea_citta_linea'] ? strtoupper(utf8_decode($fields['tipolinea_citta_linea'])) : "";
$col[] = array('text' =>utf8_decode('Città: ').$temp, 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['tipolinea_provincia_linea'] ? strtoupper(utf8_decode($fields['tipolinea_provincia_linea'])) : "";
$col[] = array('text' =>'Provincia: '. $temp, 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['tipolinea_cap_linea'] ? strtoupper(utf8_decode($fields['tipolinea_cap_linea'])) : "";
$col[] = array('text' =>'CAP: '. $temp, 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(10);

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',6);
$pdf->MultiCell(0,$lineHeight, utf8_decode("* Campo obbligatorio: il cliente deve dare precisa indicazione della volontà di mantenere il proprio numero di telefono sia barrando la casella sopra indicata sia frmando il punto b) della sezione 7. Qualora venga omessa una delle due indicazioni Terrecablate NON effettuerà la portabilità del numero telefonico che quindi verrà sostituito con un numero nuovo.") );
$pdf->Ln(2);
$pdf->MultiCell(0,$lineHeight, utf8_decode("** Codice di migrazione. Qualora non fosse presente in fattura va richiesto al proprio operatore assieme al carattere di controllo. Il carattere di controllo è composto da una sola lettera, va inserito come ultimo carattere.") );


/* ***********************
 * 	PAGINA 4
 */
$pdf->AddPage();
$pdf->Image($header_image, 0, 5, 210,25.7);
$pdf->Image($footer_image, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '7. Servizi di migrazione e mantenimento del numero telefonico');

$pdf->Ln(6);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',11);
$pdf->MultiCell(0,$lineHeight, utf8_decode("IL SOTTOSCRITTO") );
$pdf->SetFont('FFDin','',10);
$pdf->SetTextColor(0,0,0);


$col = array();
$temp = @$fields['migrazione_cognome'] ? strtoupper(utf8_decode($fields['migrazione_cognome'])) : "";
$col[] = array('text' =>utf8_decode('Cognome: ').$temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['migrazione_nome'] ? strtoupper(utf8_decode($fields['migrazione_nome'])) : "";
$col[] = array('text' =>utf8_decode('Nome: ').$temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['migrazione_indirizzo'] ? strtoupper(utf8_decode($fields['migrazione_indirizzo'])) : "";
$col[] = array('text' =>utf8_decode('Residente in Via/Piazza: ').$temp, 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['migrazione_numero_civico'] ? strtoupper(utf8_decode($fields['migrazione_numero_civico'])) : "";
$col[] = array('text' =>utf8_decode('N°: ').$temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['migrazione_citta'] ? strtoupper(utf8_decode($fields['migrazione_citta'])) : "";
$col[] = array('text' =>utf8_decode('Città: ').$temp, 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['migrazione_provincia'] ? strtoupper(utf8_decode($fields['migrazione_provincia'])) : "";
$col[] = array('text' =>utf8_decode('Provincia: ').$temp, 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$fields['migrazione_cap'] ? strtoupper(utf8_decode($fields['migrazione_cap'])) : "";
$col[] = array('text' =>utf8_decode('CAP: ').$temp, 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['migrazione_codice_fiscale'] ? strtoupper(utf8_decode($fields['migrazione_codice_fiscale'])) : "";
$col[] = array('text' =>utf8_decode('Codice Fiscale: ').$temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;


$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(4);

$pdf->MultiCell(0,$lineHeight, utf8_decode("In qualità di titolare delle linee telefoniche e/o di connessione alla rete internet indicate al punto 6 che precedono, con la presente dichiara di averne la piena e libera disponibilità e pertanto dichiara e manifesta, ad ogni effeto di legge, la propia volontà di voler usufruire su dette linee dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l.") );


if( @$fields['migrazione_servizi'] &&  $fields['migrazione_servizi']=='1' ):
$pdf->Ln(4);
$pdf->SetFont('FFDin','',12);
$pdf->SetTextColor(0, 86, 122);
$pdf->MultiCell(0,$lineHeight, utf8_decode("a) Richiesta di migrazione dei servizi telefonici ed internet") );

$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(0,$lineHeight, utf8_decode("Il cliente dichiara di voler recedere dal rapporto contrattuale con l'operatore richiamato al punto 6 della presente proposta , con riferimento alle linee telefoniche sopra indicate al fine di usufruire dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l. in modalità ULL e/o WLR e/o Bitstream e/o Vula e/o Bitstream NGA. A tal fine dà mandato alla società Terrecablate Reti e Servizi S.r.l di inoltrare al suddetto operatore l'ordine di lavorazione e, se richiesto, la manifestazione della propria volontà di recesso oggetto della presente richiesta, secondo le forme di legge, ed a compiere ogni altra operazione necessaria per la fornitura dei succitati servizi.") );

$pdf->Ln(4);

$col = array();
$col[] = array('text' =>utf8_decode('Data '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>utf8_decode('Firma '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;
endif;


if( @$fields['migrazione_portability'] &&  $fields['migrazione_portability']=='1' ):
$pdf->Ln(8);
$pdf->SetFont('FFDin','',12);
$pdf->SetTextColor(0, 86, 122);
$pdf->MultiCell(0,$lineHeight, utf8_decode("b) Richiesta di mantenimento del numero telefonico (Number Portability)*") );

$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(0,$lineHeight, utf8_decode("Il cliente dichiara di voler mantenere i numeri di cui al punto 6. nell'ambito dei servizi forniti da Terrecablate Reti e Servizi S.r.l.. Chiede pertanto che sia attivata la procedura per la prestazione del servizio di Number Portability con l'operatore indicato al precedente punto 6 relativamente ai numeri sopra specificati . A tal fine dà mandato a Terrecablate Reti e Servizi S.r.l . affinché essa provveda ad inoltrare ai suddetti operatori l'ordine di lavorazione e la manifestazione della volontà di recesso oggetto della presente richiesta , secondo le forme di legge, ed a compiere ogni altra operazione necessaria per la prestazione del servizio di Number Portability. Il cliente richiede che la gestione delle numerazioni sopra indicate venga delegata a Terrecablate Reti e Servizi S.r.l.. A tale scopo, autorizzo quest'ultima società ad attivare tutte le procedure necessarie con l'operatore che gestisce attualmente le numerazioni stesse . Il Titolare manleva Terrecablate Reti e Servizi S.r.l. da eventuali inconvenienti che possano portare all’ insuccesso della Number Portability. Qualora il titolare intendesse successivamente revocare il mandato conferito a Terrecablate Reti e Servizi S.r.l., sarà sua cura darne a quest’ultima comunicazione per iscritto.") );

$pdf->Ln(4);
$col = array();
$col[] = array('text' =>utf8_decode('Data '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>utf8_decode('Firma '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(2);
$pdf->SetFont('FFDin','',6);
$pdf->SetTextColor(0, 86, 122);
$pdf->MultiCell(0,4, utf8_decode("* Campo obbligatorio: il cliente deve dare precisa indicazione della volontà di mantenere il proprio numero di telefono sia firmando il punto b) che barrando la casella indicata nella sezione 6. Qualora venga omessa una delle due indicazioni Terrecablate NON potrà effettuare e quindi NON effettuerà la portabilità del numero telefonico che quindi verrà sostituito con un numero nuovo.") );
endif;

$pdf->Ln(12);
$pdf->SetFont('FFDin','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,$lineHeight, "NOTE: ");



/* ***********************
 * 	PAGINA 5 
 */
$pdf->AddPage();
$pdf->Image($header_image, 0, 5, 210,25.7);
$pdf->Image($footer_image, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '8. Manifestazione di consenso al trattamento dei dati personali ( REG. EU 679/206)');

$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(0,4, utf8_decode("Letta e compresa l'informativa privacy riportata nell'allegato al presente Documento di Accettazione \"INFORMATIVA Al SENSI DELL'ART. 13 DEL REGOLAMENTO UE 679/2016 RELATIVA AL TRATTAMENTO DEI DATI PERSONALI\" ") );

/* Consenso trattamento dati: commerciale */
$pdf->Ln(2);
$temp = $fields['consenso_trattamento_commerciale'] ? "[X] PRESTO IL CONSENSO     [ ] NEGO IL CONSENSO" : "[ ] PRESTO IL CONSENSO     [X] NEGO IL CONSENSO";
$pdf->MultiCell(0,4, $temp, 0,'C');
$pdf->MultiCell(0,4, utf8_decode("al trattamento dei dati personali da parte di Terrecablate per l'invio di comunicazioni promozionali e di marketing, incluso l'invio di newsletter e ricerche di mercato, attraverso strumenti automatizzati (sms, mms, email, notifiche push, fax) e non (posta cartacea, telefono con operatore). ") );

/* Consenso trattamento dati: a terzi */
$pdf->Ln(2);
$temp = $fields['consenso_terzi'] ? "[X] PRESTO IL CONSENSO     [ ] NEGO IL CONSENSO" : "[ ] PRESTO IL CONSENSO     [X] NEGO IL CONSENSO";
$pdf->MultiCell(0,4, $temp, 0,'C');
$pdf->MultiCell(0,4, utf8_decode("alla comunicazione dei propri dati ad altre società per l'invio di loro comunicazioni promozionali e di marketing, incluso l'invio di newsletter e ricerche di mercato, attraverso strumenti automatizzati (sms, mms, email, notifiche push, fax) e non (posta cartacea, telefono con operatore). ") );

/* Consenso trattamento dati: profilazione */
$pdf->Ln(2);
$temp = $fields['consenso_profilazione'] ? "[X] PRESTO IL CONSENSO     [ ] NEGO IL CONSENSO" : "[ ] PRESTO IL CONSENSO     [X] NEGO IL CONSENSO";
$pdf->MultiCell(0,4, $temp, 0,'C');
$pdf->MultiCell(0,4, utf8_decode("al trattamento dei dati personali da parte di Terrecablate per l'analisi delle proprie scelte di acquisto, preferenze e caratteristiche anagrafiche, raccolte sia off line nei negozi sia sui siti web, al fine di meglio strutturare comunicazioni e proposte commerciali personalizzate, effettuare analisi generali per fini di orientamento strategico e di intelligence commerciale e, in genere, per attività di profilazione.  ") );

$pdf->Ln(2);
$col = array();
$col[] = array('text' =>utf8_decode('Data '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>utf8_decode('Titolare '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$pdf->Ln(6);
$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, utf8_decode('9. Scelta Modalità di pagamento')) ;

$pdf->Ln(2);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','B',10);
$pdf->MultiCell(0,4, $contratti_strings[$fields['modalita_pagamento']] );

if($fields['modalita_pagamento'] == 'pagamento_cc'):
$pdf->Ln(2);
$pdf->SetFont('FFDin','',8);
$pdf->MultiCell(0,4, utf8_decode("La informiamo che il metodo di pagamento con Carta di Credito verrà gestito ricorrendo all'apposito servizio messo a disposizione da CartaSi che rende disponibili unicamente i circuiti Visa e Mastercad e non potranno essere utilizzate Carte di Credito in modalità prepagata/ricaricabile. Terrecablate Reti e Servizi S.r.l. La informa che scegliendo la modalità di pagamento con Carta di Credito, Le verrà inviato tramite e-mail, il Codice Cliente ed il Codice Contratto mediante i quali dovrà registrarsi al portale clienti di Terrecablate (MyTerrecablate, rinvenibile all'indirizzo internet http://portale.terrecablate.it ) al fine di completare la procedura di addebito permanente sulla propria Carta di Credito e Le rammenta che la procedura di attivazione dei Servizi richiesti non potrà perfezionarsi senza che Lei vi abbia provveduto. A tale proposito Terrecablate Reti e Servizi S.r.l., inoltre, le rammenta che il termine per perfezionare la procedura di registrazione al Portale Cliente MyTerrecablate e di autorizzazione all'addebito permanente su Carta di Credito è di 10 giorni dalla data di accettazione del Contratto da parte di Terrecablate. Ove Lei abbia scelto la modalità di pagamento mediante addebito su Carta di Credito, Terrecablate Reti e Servizi S.r.l. la informa che i Suoi dati, occorrenti per tale attività, non saranno trattati e non risiederanno in alcun Database di Terrecablate Reti e Servizi S.r.l. ma saranno trattati in autonomia da Carta SI tramite i propri sistemi"));
endif;

$pdf->Ln(6);
$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, utf8_decode('10. Firma proposta di contratto')) ;

$pdf->Ln(2);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'COMUNICAZIONE DI ACCETTAZIONE E CONFERMA DEL CONTRATTO');
$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,4, utf8_decode("Il Cliente dichiara di voler ricevere la conferma del contratto concluso su un mezzo durevole mediante spedizione all'indirizzo e-mail indicato al punto 1 della Proposta") );

$col = array();
$col[] = array('text' =>utf8_decode('Data '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>utf8_decode('Firma '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$pdf->Ln(6);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'FIRMA DELLA PROPOSTA DI CONTRATTO');

$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,4, utf8_decode("La firma conferma le obbligazioni del Cliente previste nella presente Proposta di Contratto per la prestazione di Servizi di comunicazione elettronica (telefonie fissa ed internet) anche con riferimento alla modalità di pagamento prescelta. Il Contratto tra il Cliente e Terrecablate Reti e Servizi S.r.l. si perfeziona in base alla procedura contenuta negli Articoli 4 e 5 delle Condizioni Generali di Contratto.") );

$col = array();
$col[] = array('text' =>utf8_decode('Data '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>utf8_decode('Firma '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(6);
$pdf->MultiCell(0,4, utf8_decode("Il Cliente, previa attenta e specifica lettura, dichiara di aver preso visione e conoscenza ed espressamente approva, ai sensi degli articoli 1341 e 1342, C.C., i seguenti articoli delle Condizioni Generali di Contratto: 3.DATI PERSONALI DEL CLIENTE; 5. ACCETTAZIONE DELLA PROPOSTA; 6. NON ACCETTAZIONE DELLA PROPOSTA - MANCATA CONCLUSIONE DEL CONTRATTO; 8. DURATA DEL CONTRATTO; 9. MODIFICHE DEL CONTRATTO DA PARTE DI TERRECABLATE; 11. CESSIONE DEL CONTRATTO; 12 CARATTERISTICHE DEI SERVIZI; 14. OPZIONE; 19. USO PERSONALE -  ABUSO DEL CONTRATTO E DEI SERVIZI – TRAFFICO ANOMALO; 21. LIMITAZIONE E FUNZIONAMENTO DEI SERVIZI; 25. OMESSO PAGAMENTO – LIMITAZIONE E SOSPENSIONE DEI SERVIZI; 28 RECESSO DI TERRECABLATE; 29. APPARATI FORNITI DA TERRECABLATE; 30. CESSAZIONE DEL CONTRATTO – OBBLIGHI RESTITUTORI DEL CLIENTE; 39. LIMITAZIONE DI RESPONSABILITÀ - MANLEVA") );

$col = array();
$col[] = array('text' =>utf8_decode('Data '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>utf8_decode('Firma '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


if($fields['modalita_pagamento'] == 'pagamento_sdd'):
/* ***********************
 * 	PAGINA 6 - SOLO PER BONIFICO
 */
$pdf->AddPage();
$pdf->Image($header_image, 0, 5, 210,25.7);
$pdf->Image($footer_image, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(98, 174, 46);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, 'MOD. A - AUTORIZZAZIONE PERMANENTE DI ADDEBITO IN CONTO');
$pdf->Ln(1);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',6);
$pdf->MultiCell(0,$lineHeight, utf8_decode("Al fine di poter accettare la richiesta, è necessario che tutti i campi contrassegnati con * siano compilati, che il modulo sia sottoscritto dal titolare del conto corrente sul quale viene richiesto l'addebito del Conto Terrecablate Retie Servizi o da soggetto delegato ad operare sul conto corrente. E necessario inoltre allegare al modulo copia del Documento d'identità valido e del tesserino del Codice Fiscale del sottoscrittore della richiesta di domiciliazione.
AUTORIZZAZIONE PER L'ADDEBITO IN CONTO CORRENTE DELLE DISPOSIZIONI SEPA CORE DIRECT DEBIT (1)") );


$pdf->Ln(1);
$pdf->SetFont('FFDin','',10);

$col = array();
$col[] = array('text' =>'DATI INDENTIFICATIVI DEL CREDITORE', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' =>'Creditore:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>'TERRECABLATE RETI E SERVIZI S.R.L.', 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$col[] = array('text' =>'Sede legale:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>'VIALE TOSELLI - 9/A - 53100 SIENA', 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$col[] = array('text' =>'Codice Identifcativo del Creditore:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>'IT150010000001169690524', 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(2);

$col = array();
$col[] = array('text' =>'DATI IDENTIFICATIVI DELL\'INTESTATARIO DEL CONTO CORRENTE (di seguito DEBITORE)', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['sdd_debitore_nome'] ? strtoupper( utf8_decode($fields['sdd_debitore_nome']) ) : "";
$col[] = array('text' =>'Cognome e Nome *:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$fields['sdd_debitore_cf_piva'] ? strtoupper( utf8_decode($fields['sdd_debitore_cf_piva']) ) : "";
$col[] = array('text' =>'Codice Fiscale *:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$fields['sdd_debitore_iban'] ? strtoupper( utf8_decode($fields['sdd_debitore_iban']) ) : "";
$col[] = array('text' =>'Codice IBAN del conto corrente:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(1);
$pdf->SetFont('FFDin','',6);
$pdf->MultiCell(0,$lineHeight, utf8_decode( "Il Sottoscritto Debitore autorizza il Creditore a disporre sul conto corrente sopra indicato addebiti in via continuativa ed il Prestatore di Servizi di Pagamento (di seguito “PSP”) ad eseguire l'addebito secondo le disposizioni impartite dal Creditore. Il rapporto con il PSP è regolato dal contratto stipulato dal Debitore con il PSP stesso. Il Debitore ha facoltà di richiedere al PSP il rimborso di quanto addebitato, secondo quanto stabilito nel suddetto contratto; eventuali richieste di rimborso devono essere presentate entro e non oltre 8 settimane a decorrere dalla data di addebito. (2)" ) );

$pdf->Ln(2);
$pdf->SetFont('FFDin','',10);

$col = array();
$col[] = array('text' =>'DATI IDENTIFICATIVI DEL SOTTOSCRITTORE', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['sdd_sottoscrittore_nome'] ? strtoupper( utf8_decode($fields['sdd_sottoscrittore_nome']) ) : "";
$col[] = array('text' =>'Cognome e Nome:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$fields['sdd_sottoscrittore_cf'] ? strtoupper( utf8_decode($fields['sdd_debitore_cf_piva']) ) : "";
$col[] = array('text' =>'Codice Fiscale:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;


$col = array();
$col[] = array('text' =>'Luogo:', 'width' => '66', 'height' => 15, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>'Data:', 'width' => '66', 'height' => 15, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>'Firma:', 'width' => '68', 'height' => 15, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(2);

$col = array();
$col[] = array('text' =>'TITOLARE DEL CONTRATTO/LINEA TELEFONICA (da compilare solo se il sottoscrittore non coincide con il titolare del contratto)', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$fields['sdd_titolare_linea'] ? strtoupper( utf8_decode($fields['sdd_titolare_linea']) ) : "";
$col[] = array('text' =>'Linea Telefonica / Contratto:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$fields['sdd_titolare_nome'] ? strtoupper( utf8_decode($fields['sdd_titolare_nome']) ) : "";
$col[] = array('text' =>'Cognome e Nome:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$fields['sdd_titolare_cf_piva'] ? strtoupper( utf8_decode($fields['sdd_titolare_cf_piva']) ) : "";
$col[] = array('text' =>'Codice Fiscale:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$fields['sdd_titolare_telefono'] ? strtoupper( utf8_decode($fields['sdd_titolare_telefono']) ) : "";
$col[] = array('text' =>'Recapito Telefonico:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(2);
$pdf->SetFont('FFDin','',6);
$pdf->SetTextColor(0,0,0);


$col = array();
$col[] = array('text' =>' ', 'width' => '66', 'height' => 15, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '66', 'height' => 15, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '66', 'height' => 15, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>'Luogo', 'width' => '66', 'height' => 10, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'T');
$col[] = array('text' =>'Data', 'width' => '66', 'height' => 10, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'T');
$col[] = array('text' =>'Firma', 'width' => '66', 'height' => 10, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'T');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$pdf->SetTextColor(0, 86, 122);
$pdf->MultiCell(0,$lineHeight, utf8_decode( "Note
	1) La presente autorizzazione permanente di addebito in conto corrente è subordinata all'accettazione da parte del Prestatore di Servizi di Pagamento (PSP) del Debitore.
	2) A titolo esemplificativo, possono essere PSP le banche, gli istituti di moneta elettronica e gli istituti di pagamento autorizzati.
	3) Nel caso di c/c intestato a persona giuridica il sottoscrittore coincide con il soggetto delegato ad operare sul conto. Nel caso di c/c intestato a persona fisica il sottoscrittore coincide con il titolare medesimo ovvero con il soggetto delegato ad operare sullo stesso" ) );

endif; // end PAGAMENTO SDD


// add a static page
$pdf->setSourceFile("Contratto_MyHome.pdf");

// ----- Elenchi telefonici
$pdf->AddPage();
$tplIdx = $pdf->importPage(7);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$tplIdx = $pdf->importPage(8);
$pdf->useTemplate($tplIdx, 0, 0, 210);

// ----- GDPR
$pdf->AddPage();
$tplIdx = $pdf->importPage(9);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$tplIdx = $pdf->importPage(10);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->Output();

//$pdf->Output('D','contratto-home-'. $fields['token'] .'.pdf');