<?php

$pdf = new CUSTOMPDF('P','mm','A4');
$pdf->AddFont('FFDin','','FFDINPro-Regular.php');
$pdf->AddFont('FFDin','B','FFDINPro-Bold.php');
//$pdf->AddFont('FFDin','BI',TC_ADDONS_ROOT . '/vendor/FPDF/font/FFDINPro-BoldItalic.php');

$pdf->SetMargins(5, 0, 5);
$pdf->SetLineWidth(.3);
$pdf->SetDrawColor(0, 86, 122);
$pdf->SetTitle('Proposta di contratto SmartOffice');
$pdf->SetAuthor('Terrecablate Reti e Servizi s.r.l. società benefit a socio unico');

$lineHeight=4;
$cellHeight=6;


// ***********	PAGINA 1 ***************
$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(33);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'Sezione riservata a Terrecablate');
$pdf->Ln(2);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','',10);


$col = array();
$col[] = array('text' => 'ID Contratto:', 'width' => '80', 'height' => 10, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.2', 'linearea' => 'B');
$col[] = array('text' => ' ', 'width' => '20', 'height' => 10, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.2', 'linearea' => '');
$col[] = array('text' => 'Data:', 'width' => '80', 'height' => 10, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Line(5,53,205,53);

$pdf->SetY(57);
$pdf->SetTextColor(235, 110, 43);
$pdf->SetFont('FFDin','B',14);
$pdf->MultiCell(0,$lineHeight, 'PROPOSTA DI CONTRATTO PER LA TUA IMPRESA');

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'La presente Proposta di Contratto deve essere compilata in ogni sua parte, firmata e trasmessa a:');
$pdf->SetFont('FFDin','B',10);
$pdf->MultiCell(0,$lineHeight, 'Terrecablate Reti e Servizi, viale Toselli 9/A - 53100 Siena');

$pdf->Ln(3);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('FFDin','',8);
$pdf->SetFillColor(244,244,244);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("Il/La sottoscritto/a, di seguito e nel prosieguo altresì \"Cliente\" così come sotto identificata/o, dichiara di aver ricevuto da Terrecablate Reti e Servizi S.r.l. completa informativa pre-contrattuale secondo il modello allegato alla presente Proposta, nonché completa informativa in ordine all'esercizio del diritto di recesso ai sensi dell'art. 49, comma 1, lett. h) del Codice del Consumo (Ripensamento), come da modello allegato, anteriormente alla presentazione della presente Proposta ed a mezzo delle presente Proposta, pertanto, propone a Terrecablate Reti e Servizi S.r.l. di concludere un contratto per la fornitura del Servizio di telefonia fissa e/o accesso internet secondo l'Offerta Commerciale in appresso indicata, alle condizioni e con le modalità risultanti dalla Proposta, e nei documenti che compongono il Contratto quali le Condizioni Generali di Contratto, la Carta dei Servizi, l'Offerta Commerciale e l'Informativa sul trattamento dei dati personali (D.Lgs 196 del 30 giungo 2003), che dichiara di ben conoscere ed accettare, in ogni loro parte."),0,'L', true);

$pdf->Ln(8);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '1. Dati Anagrafici e sede legale dell\'azienda');
$pdf->Ln(2);
$pdf->SetFont('FFDin','',10);
$pdf->SetTextColor(0,0,0);


$col = array();
$col[] = array('text' => decodeUTF8('Denominazione/Ragione sociale o Cognome: '. strtoupper($cnt['rag_sociale']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Sede Via/Piazza: '. strtoupper($cnt['azienda_indirizzo']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('N°: '. strtoupper($cnt['azienda_civico']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Città: '. strtoupper($cnt['azienda_citta']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($cnt['azienda_provincia']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('CAP: '. strtoupper($cnt['azienda_cap']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Partita IVA / Codice Fiscale: '. strtoupper($cnt['azienda_piva_cf']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;



$col = array();
$col[] = array('text' => decodeUTF8('Email: '. strtoupper($cnt['cliente_email']) ), 'width' => '64', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$cnt['cliente_telefono'] ? strtoupper($cnt['cliente_telefono']) : "";
$col[] = array('text' => decodeUTF8('Tel: '.  $temp), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$cnt['cliente_fax'] ? strtoupper($cnt['cliente_fax']) : "";
$col[] = array('text' => decodeUTF8('Fax: '.  $temp), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Cellulare: '. $cnt['cliente_cellulare']), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('PEC: '. $cnt['cliente_pec']), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Codice Destinatario: '. strtoupper($cnt['azienda_cod_destinatario']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$col = array();
$col[] = array('text' => decodeUTF8('Ruolo: '. strtoupper($cnt['cliente_ruolo']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Cognome: '. strtoupper($cnt['cliente_cognome']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Nome: '. strtoupper($cnt['cliente_nome']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Sesso: '. getSesso($cnt['cliente_sesso']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Data di nascita: '. showDate($cnt['cliente_data_nascita']) ), 'width' => '58', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Luogo di nascita: '. strtoupper($cnt['cliente_luogo_nascita']) ), 'width' => '96', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($cnt['cliente_provincia_nascita']) ), 'width' => '46', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Codice Fiscale: '. strtoupper($cnt['cliente_cod_fiscale']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Documento *: '. showDocumento($cnt['cliente_tipo_documento']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('N°: '. strtoupper($cnt['cliente_doc_numero']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Rilasciato da: '. strtoupper($cnt['cliente_doc_emittente']) ), 'width' => '110', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('il: '. showDate($cnt['cliente_doc_rilascio']) ), 'width' => '45', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Scadenza: '. showDate($cnt['cliente_doc_scadenza']) ), 'width' => '45', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Residenza (o domicilio italiano): '. strtoupper($cnt['cliente_indirizzo']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('N°: '. strtoupper($cnt['cliente_civico']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Città: '. strtoupper($cnt['cliente_citta']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($cnt['cliente_provincia']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('CAP: '. strtoupper($cnt['cliente_cap']) ), 'width' => '64', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(1);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',6);
$pdf->MultiCell(0,$lineHeight, '* Allegare fotocopia del documento indicato');

$pdf->Ln(10);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '2. Indirizzi');
$pdf->Ln(2);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'INDIRIZZO DI ATTIVAZIONE E FORNITURA DEI SERVIZI');

$pdf->SetFont('FFDin','',10);
$pdf->SetTextColor(0,0,0);

$col = array();
$col[] = array('text' => decodeUTF8('Indirizzo Via/Piazza: '. strtoupper($cnt['attivazione_indirizzo']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('N°: '. strtoupper($cnt['attivazione_civico']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Città: '. strtoupper($cnt['attivazione_citta']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($cnt['attivazione_provincia']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('CAP: '. strtoupper($cnt['attivazione_cap']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


// ***********	PAGINA 2 ***************

// Offerta e accesso
switch ($cnt['tipo_accesso']) {
    case 'TCRS_GPON':
    case 'OF_FTTH':
    case 'VULA FTTH':
    case 'Bitstream NGA FTTH':
        $specLabel = " FTTH";
            break;    
    case 'Bitstream Ethernet':
        $specLabel = " ADSL";
            break;    
    default:
        $specLabel = " FTTC";
        break;
}

$nomeCompletoOfferta = $cnt['nomeofferta'] . $specLabel;
$opzioni = $cnt['opzioni'] !== null ? maybe_unserialize($cnt['opzioni']) : null;

$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(33);

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '3. Prodotti e Servizi richiesti');

$pdf->Ln(3);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','B',11);
$pdf->MultiCell(0,$lineHeight, 'SERVIZI INTERNET E TELEFONO TERRECABLATE');
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("Sarà attivata l'offerta {$nomeCompletoOfferta}")); 

$pdf->Ln(4);

if($opzioni):
    $pdf->SetTextColor(0, 86, 122);
    $pdf->SetFont('FFDin','',10);
    $pdf->MultiCell(0,$lineHeight, 'OPZIONI AGGIUNTIVE');

    $pdf->SetFont('FFDin','',10);
    $pdf->SetTextColor(0,0,0);
    
    $columns = null;
    foreach($opzioni as $opt):
        $q = intval($opt['qty']);
        $p = number_format(floatval($q * $opt['cost']), 2,',','.');
        $txt  = "- " . strtoupper($opt['name']);
        $txt .= $q > 1 ? " ( x{$q} )": "";
        $txt .= ": +{$p} euro";
        $col = array();
        $col[] = array('text' => decodeUTF8( $txt ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
        $columns[] = $col;
    endforeach;

    $pdf->WriteTable($columns);
    $columns = null;
endif;

$pdf->Ln(4);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'INDIRIZZO DI INVIO NUOVO DISPOSITIVO');

$pdf->SetFont('FFDin','',10);
$pdf->SetTextColor(0,0,0);

$col = array();
$col[] = array('text' => decodeUTF8('Indirizzo Via/Piazza: '. strtoupper($cnt['servizi_indirizzo']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('N°: '. strtoupper($cnt['servizi_civico']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Città: '. strtoupper($cnt['servizi_citta']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($cnt['servizi_provincia']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('CAP: '. strtoupper($cnt['servizi_cap']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$pdf->Ln(10);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '4. Stato attuale linee telefoniche');

$pdf->SetTextColor(0,0,0);

$linea_port = $cnt['linea_portability'];
$linea_new = $cnt['linea_nuova'];
$linea_mig = $cnt['linea_migrazione'];

if($linea_new) {
    $txt = "Il cliente richiede l'ATTIVAZIONE di un a NUOVA LINEA.";
    if($linea_port) 
        $txt .= "Richiede inoltre la PORTABILITY del/i numero/i telefonico/i.";
}

if($linea_mig) {
    $txt = "Il cliente richiede la MIGRAZIONE della PROPRIA LINEA, con PORTABILITY del/i numero/i telefonico/i.";
}

$pdf->Ln(4);
$pdf->SetFont('FFDin','B',10);
$pdf->MultiCell(0,$lineHeight, decodeUTF8($txt),0,'L' );

$pdf->Ln(4);

$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("Si specifica che non sarà possibile effettuare la migrazione diretta nel caso in cui il servizio attualmente attivo sia basato su linea di accesso in rame (solo voce o xDSL) ed il servizio richiesto a Terrecablate sia basato su linea di accesso in fibra (FTTH), o viceversa. In questo caso verrà effettuata l'attivazione del servizio richiesto su una nuova linea e l'eventuale portabilità del numero (Number Portability) sarà effettuata in un momento successivo rispetto all'attivazione della nuova linea. In questo caso, resterà in carico al titolare della linea attualmente attiva l'eventuale comunicazione di disdetta da inviare all'attuale operatore, successivamente all'avvenuto passaggio del numero.") );


if($cnt["linea_portability"]):
	$pdf->Ln(10);

	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','',14);
	$pdf->MultiCell(0,$lineHeight, '5. Tipologia linea e Mantenimento del numero (Number Portability)');
	// $pdf->Ln(4);
	// $pdf->SetFont('FFDin','',10);
	// $pdf->SetTextColor(0, 86, 122);
	// $pdf->MultiCell(0,$lineHeight, decodeUTF8("Da compilare solo da parte dei titolari di linee telefoniche attualmente attive") );

	$pdf->Ln(4);
	$col = array();

	$col[] = array('text' => decodeUTF8('NUMERO/I'), 'width' => '100', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	$col[] = array('text' => decodeUTF8('CODICE/I MIGRAZIONE'), 'width' => '100', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');

	$columns[] = $col;

	$pdf->WriteTable($columns);
	$columns = null;

	$pdf->Ln(1);
	$col = array();

	if($cnt['linea_numero_1'] && $cnt['linea_codice_migrazione_1']) {
		$txtNum = $cnt['linea_numero_1'];
		$txtNum .= $cnt['linea_numero_2'] ? "\n{$cnt['linea_numero_2']}" : "";
		$txtNum .= $cnt['linea_numero_3'] ? "\n{$cnt['linea_numero_3']}" : "";
		$txtNum .= $cnt['linea_numero_4'] ? "\n{$cnt['linea_numero_4']}" : "";

		$txtMig = $cnt['linea_codice_migrazione_1'];
		$txtMig .= $cnt['linea_codice_migrazione_2'] ? "\n{$cnt['linea_codice_migrazione_2']}" : "";

		$col[] = array('text' => decodeUTF8($txtNum), 'width' => '100', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');

		$col[] = array('text' => decodeUTF8($txtMig), 'width' => '100', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	}

	$columns[] = $col;

	$pdf->WriteTable($columns);
	$columns = null;

	$pdf->Ln(10);

	// ------------ PUNTO 6 ----------------------------
	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','',14);
	$pdf->MultiCell(0,$lineHeight+3, '6. Servizi di migrazione e mantenimento del numero telefonico');

	$pdf->SetFont('FFDin','',10);
	$pdf->SetTextColor(0, 0, 0);


	$col = array();
	$col[] = array('text' => decodeUTF8('Denominazione/Ragione sociale o Cognome: '. strtoupper($cnt['linea_rag_sociale']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Denominazione/Ragione sociale o Cognome: '. strtoupper($cnt['linea_azienda_nome']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Sede Via/Piazza: '. strtoupper($cnt['linea_azienda_indirizzo']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('N°: '. strtoupper($cnt['linea_azienda_civico']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Città: '. strtoupper($cnt['linea_azienda_citta']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($cnt['linea_azienda_provincia']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('CAP: '. strtoupper($cnt['linea_azienda_cap']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Partita IVA / Codice Fiscale: '. strtoupper($cnt['linea_azienda_piva_cf']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;


	$col = array();
	$col[] = array('text' => decodeUTF8('Ruolo: '. strtoupper($cnt['linea_cliente_ruolo']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Cognome: '. strtoupper($cnt['linea_cliente_cognome']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Nome: '. strtoupper($cnt['linea_cliente_nome']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Sesso: '. getSesso($cnt['linea_cliente_sesso']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Data di nascita: '. showDate($cnt['linea_cliente_data_nascita']) ), 'width' => '58', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Luogo di nascita: '. strtoupper($cnt['linea_cliente_luogo_nascita']) ), 'width' => '96', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($cnt['linea_cliente_provincia_nascita']) ), 'width' => '46', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Codice Fiscale: '. strtoupper($cnt['linea_cliente_cod_fiscale']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Nazionalità: '. strtoupper($cnt['linea_cliente_nazionalita']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;


	$col = array();
	$col[] = array('text' => decodeUTF8('Documento *: '. showDocumento($cnt['linea_cliente_tipo_documento']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('N°: '. strtoupper($cnt['linea_cliente_doc_numero']) ), 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Rilasciato da: '. strtoupper($cnt['linea_cliente_doc_emittente']) ), 'width' => '110', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('il: '. showDate($cnt['linea_cliente_doc_rilascio']) ), 'width' => '45', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Scadenza: '. showDate($cnt['linea_cliente_doc_scadenza']) ), 'width' => '45', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Residenza (o domicilio italiano): '. strtoupper($cnt['linea_cliente_indirizzo']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('N°: '. strtoupper($cnt['linea_cliente_civico']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Città: '. strtoupper($cnt['linea_cliente_citta']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($cnt['linea_cliente_provincia']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('CAP: '. strtoupper($cnt['linea_cliente_cap']) ), 'width' => '64', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$pdf->WriteTable($columns);
	$columns = null;



	// ***********	NUOVA PAGINA - dettagli portability ***************

	$pdf->AddPage();
	$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
	$pdf->Image($fileFooterPath, 0, 278, 210,16);

	$pdf->SetY(35);

	$pdf->SetFont('FFDin','',10);
	$pdf->MultiCell(0,$lineHeight, decodeUTF8("In qualità di titolare delle linee telefoniche e/o di connessione alla rete internet indicate al punto 5 che precedono, con la presente dichiara di averne la piena e libera disponibilità e
	pertanto dichiara e manifesta, ad ogni effetto di legge, la propria volontà di voler usufruire su dette linee dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l.") );

	$pdf->Ln(10);

	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','',10);
	$pdf->MultiCell(0,$lineHeight, 'a) Richiesta di migrazione dei servizi telefonici ed internet');

	$pdf->Ln(2);
	$pdf->SetTextColor(0,0,0);
	$pdf->MultiCell(0,$lineHeight, "Il Cliente dichiara di voler recedere dal rapporto contrattuale con l'operatore richiamato al punto 5 della presente Proposta, con riferimento alle linee telefoniche sopra indicate al fine di usufruire dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l. A tal fine dà mandato alla società Terrecablate Reti e Servizi S.r.l di inoltrare al suddetto operatore l'ordine di lavorazione e, se richiesto, la manifestazione della propria volontà di recesso oggetto della presente richiesta, secondo le forme di legge, ed a compiere ogni altra operazione necessaria per la fornitura dei succitati servizi.");

	$pdf->Ln(4);

	$col = array();
	$col[] = array('text' =>decodeUTF8('Data '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
	$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
	$col[] = array('text' =>decodeUTF8('Firma '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
	$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$pdf->WriteTable($columns);
	$columns = null;


	$pdf->Ln(10);

	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','',10);
	$pdf->MultiCell(0,$lineHeight, 'b) Richiesta di mantenimento del numero telefonico (Number Portability) **');

	$pdf->Ln(2);
	$pdf->SetTextColor(0,0,0);
	$pdf->MultiCell(0,$lineHeight, decodeUTF8("Il Cliente dichiara di voler mantenere i numeri di cui al punto 5. nell'ambito dei servizi forniti da Terrecablate Reti e Servizi S.r.l.. Chiede pertanto che sia attivata la procedura per la prestazione del servizio di Number Portability con l'operatore indicato al precedente punto 5 relativamente ai numeri sopra specificati. A tal fine dà mandato a Terrecablate Reti e Servizi S.r.l . affinché essa provveda ad inoltrare ai suddetti operatori l'ordine di lavorazione e la manifestazione della volontà di recesso oggetto della presente richiesta, secondo le forme di legge, ed a compiere ogni altra operazione necessaria per la prestazione del servizio di Number Portability. Il Cliente richiede che la gestione delle numerazioni sopra indicate venga delegata a Terrecablate Reti e Servizi S.r.l.. A tale scopo, autorizzo quest'ultima società ad attivare tutte le procedure necessarie con l'operatore che gestisce attualmente le numerazioni stesse. Il Titolare manleva Terrecablate Reti e Servizi S.r.l. da eventuali inconvenienti che possano portare all'insuccesso della Number Portability. Qualora il titolare intendesse successivamente revocare il mandato conferito a Terrecablate Reti e Servizi S.r.l., sarà sua cura darne a quest'ultima comunicazione per iscritto") );

	$pdf->Ln(4);

	$col = array();
	$col[] = array('text' =>decodeUTF8('Data '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
	$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
	$col[] = array('text' =>decodeUTF8('Firma '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
	$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$pdf->WriteTable($columns);
	$columns = null;


	$pdf->Ln(8);

	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','',9);
	$pdf->MultiCell(0,$lineHeight, decodeUTF8("** Campo obbligatorio: il cliente deve dare precisa indicazione della volontà di mantenere il proprio numero di telefono sia firmando il punto b) che barrando la casella indicata nella sezione 5. Qualora venga omessa una delle due indicazioni Terrecablate NON potrà effettuare e quindi NON effettuerà la portabilità del numero telefonico che quindi verrà sostituito con un numero nuovo.") );


	$pdf->Ln(12);
	$pdf->SetFont('FFDin','B',10);
	$pdf->SetTextColor(0,0,0);
	$pdf->MultiCell(0,$lineHeight, "NOTE: ");

endif;


// ***********	PAGINA 4 ***************
$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight+3, '7. Manifestazione di consenso al trattamento dei dati personali ( REG. EU 679/206)');

$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(0,4, decodeUTF8("Letta e compresa l'informativa privacy riportata nell'allegato al presente Documento di Accettazione \"INFORMATIVA Al SENSI DELL'ART. 13 DEL REGOLAMENTO UE 679/2016 RELATIVA AL TRATTAMENTO DEI DATI PERSONALI\" ") );

// Consenso trattamento dati: commerciale
$pdf->Ln(2);
$temp = $cnt['consenso_marketing'] ? "[X] PRESTO IL CONSENSO     [ ] NEGO IL CONSENSO" : "[ ] PRESTO IL CONSENSO     [X] NEGO IL CONSENSO";
$pdf->MultiCell(0,4, $temp, 0,'C');
$pdf->MultiCell(0,4, decodeUTF8("al trattamento dei dati personali da parte di Terrecablate per l'invio di comunicazioni promozionali e di marketing, incluso l'invio di newsletter e ricerche di mercato, attraverso strumenti automatizzati (sms, mms, email, notifiche push, fax) e non (posta cartacea, telefono con operatore). ") );

// Consenso trattamento dati: profilazione
$pdf->Ln(2);
$temp = $cnt['consenso_profilazione'] ? "[X] PRESTO IL CONSENSO     [ ] NEGO IL CONSENSO" : "[ ] PRESTO IL CONSENSO     [X] NEGO IL CONSENSO";
$pdf->MultiCell(0,4, $temp, 0,'C');
$pdf->MultiCell(0,4, decodeUTF8("al trattamento dei dati personali da parte di Terrecablate per l'''analisi delle scelte d'''acquisto e delle preferenze comportamentali nei Punti Amici e sul sito web, al fine di meglio strutturare comunicazioni e proposte commerciali personalizzate, per effettuare analisi generali per fini di orientamento strategico e di intelligence commerciale e, in genere, per attività di profilazione.") );

$pdf->Ln(2);
$col = array();
$col[] = array('text' =>decodeUTF8('Data '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>decodeUTF8('Titolare '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$pdf->Ln(10);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight+3, decodeUTF8('8. Scelta Modalità di pagamento') );

$pdf->Ln(2);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','B',10);
$pdf->MultiCell(0,4, showMetodoPagamento($cnt['metodo_pagamento'] ) );

if($cnt['metodo_pagamento'] == 'cc'):
	$pdf->Ln(2);
	$pdf->SetFont('FFDin','',8);
	$pdf->MultiCell(0,4, decodeUTF8("La informiamo che il metodo di pagamento con Carta di Credito verrà gestito ricorrendo all'apposito servizio messo a disposizione da CartaSi che rende disponibili unicamente i circuiti Visa e Mastercad e non potranno essere utilizzate Carte di Credito in modalità prepagata/ricaricabile. Terrecablate Reti e Servizi S.r.l. La informa che scegliendo la modalità di pagamento con Carta di Credito, Le verrà inviato tramite e-mail, il Codice Cliente ed il Codice Contratto mediante i quali dovrà registrarsi al portale clienti di Terrecablate (MyTerrecablate, rinvenibile all'indirizzo internet http://portale.terrecablate.it ) al fine di completare la procedura di addebito permanente sulla propria Carta di Credito e Le rammenta che la procedura di attivazione dei Servizi richiesti non potrà perfezionarsi senza che Lei vi abbia provveduto. A tale proposito Terrecablate Reti e Servizi S.r.l., inoltre, le rammenta che il termine per perfezionare la procedura di registrazione al Portale Cliente MyTerrecablate e di autorizzazione all'addebito permanente su Carta di Credito è di 10 giorni dalla data di accettazione del Contratto da parte di Terrecablate. Ove Lei abbia scelto la modalità di pagamento mediante addebito su Carta di Credito, Terrecablate Reti e Servizi S.r.l. la informa che i Suoi dati, occorrenti per tale attività, non saranno trattati e non risiederanno in alcun Database di Terrecablate Reti e Servizi S.r.l. ma saranno trattati in autonomia da Carta SI tramite i propri sistemi"));
endif;


$pdf->Ln(6);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight+3, decodeUTF8('9. Firma proposta di contratto')) ;

$pdf->Ln(2);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'COMUNICAZIONE DI ACCETTAZIONE E CONFERMA DEL CONTRATTO');
$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,4, decodeUTF8("Il Cliente dichiara di voler ricevere la conferma del contratto concluso su un mezzo durevole mediante spedizione all'indirizzo e-mail indicato al punto 1 della Proposta") );

$pdf->Ln(2);
$col = array();
$col[] = array('text' =>decodeUTF8('Data '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>decodeUTF8('Firma '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
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
$pdf->MultiCell(0,4, decodeUTF8("La firma conferma le obbligazioni del Cliente previste nella presente Proposta di Contratto per la prestazione di Servizi di comunicazione elettronica (telefonie fissa ed internet) anche con riferimento alla modalità di pagamento prescelta. Il Contratto tra il Cliente e Terrecablate Reti e Servizi S.r.l. si perfeziona in base alla procedura contenuta negli Articoli 4 e 5 delle Condizioni Generali di Contratto.") );
$pdf->Ln(2);
$col = array();
$col[] = array('text' =>decodeUTF8('Data '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>decodeUTF8('Firma '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(6);
$pdf->MultiCell(0,4, decodeUTF8("Il Cliente, previa attenta e specifica lettura, dichiara di aver preso visione e conoscenza ed espressamente approva, ai sensi degli articoli 1341 e 1342, C.C., i seguenti articoli delle Condizioni Generali di Contratto: 3.DATI PERSONALI DEL CLIENTE; 5. ACCETTAZIONE DELLA PROPOSTA; 6. NON ACCETTAZIONE DELLA PROPOSTA – MANCATA CONCLUSIONE DEL CONTRATTO; 8. DURATA DEL CONTRATTO; 9. MODIFICHE DEL CONTRATTO DA PARTE DI TERRECABLATE; 11. CESSIONE DEL CONTRATTO; 12 CARATTERISTICHE DEI SERVIZI; 14. OPZIONE; 19. USO PERSONALE – ABUSO DEL CONTRATTO E DEI SERVIZI – TRAFFICO ANOMALO; 21. LIMITAZIONE E FUNZIONAMENTO DEI SERVIZI; 25. OMESSO PAGAMENTO – LIMITAZIONE E SOSPENSIONE DEI SERVIZI; 27 RECESSO DI TERRECABLATE; 28. APPARATI FORNITI DA TERRECABLATE - CONDIZIONI DI NOLEGGIO 29. CESSAZIONE DEL CONTRATTO – OBBLIGHI RESTITUTORI DEL CLIENTE; 38. LIMITAZIONE DI RESPONSABILITÀ - MANLEVA") );

$pdf->Ln(2);
$col = array();
$col[] = array('text' =>decodeUTF8('Data '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>decodeUTF8('Firma '), 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => '4', 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


// ***********	PAGINA 5 Bonfico ***************
if($cnt['metodo_pagamento'] == 'sdd'):
	$pdf->AddPage();
	$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
	$pdf->Image($fileFooterPath, 0, 278, 210,16);

	$pdf->SetY(35);

	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','',14);
	$pdf->MultiCell(0,$lineHeight, 'MOD. A - AUTORIZZAZIONE PERMANENTE DI ADDEBITO IN CONTO');
	$pdf->Ln(1);
	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','',6);
	$pdf->MultiCell(0,$lineHeight, decodeUTF8("Al fine di poter accettare la richiesta, è necessario che tutti i campi contrassegnati con * siano compilati, che il modulo sia sottoscritto dal titolare del conto corrente sul quale viene richiesto l'addebito del Conto Terrecablate Retie Servizi o da soggetto delegato ad operare sul conto corrente. E necessario inoltre allegare al modulo copia del Documento d'identità valido e del tesserino del Codice Fiscale del sottoscrittore della richiesta di domiciliazione."));

	$pdf->Ln(3);
	$pdf->SetFont('FFDin','',10);
	$pdf->MultiCell(0,$lineHeight, decodeUTF8("AUTORIZZAZIONE PER L'ADDEBITO IN CONTO CORRENTE DELLE DISPOSIZIONI SEPA CORE DIRECT DEBIT (1)") );

	$pdf->SetTextColor(0, 0, 0);
	$pdf->Ln(4);
	

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
	$temp = @$cnt['sdd_intestatario_cognome_nome'] ? strtoupper( decodeUTF8($cnt['sdd_intestatario_cognome_nome']) ) : "";
	$col[] = array('text' =>'Cognome e Nome *:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	$columns[] = $col;

	$col = array();
	$temp = @$cnt['sdd_intestatario_codfisc_piva'] ? strtoupper( decodeUTF8($cnt['sdd_intestatario_codfisc_piva']) ) : "";
	$col[] = array('text' =>'Codice Fiscale *:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	$columns[] = $col;

	$col = array();
	$temp = @$cnt['sdd_iban'] ? strtoupper( decodeUTF8($cnt['sdd_iban']) ) : "";
	$col[] = array('text' =>'Codice IBAN del conto corrente:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	$columns[] = $col;

	$pdf->WriteTable($columns);
	$columns = null;

	$pdf->Ln(1);
	$pdf->SetFont('FFDin','',6);
	$pdf->MultiCell(0,$lineHeight, decodeUTF8( "Il Sottoscritto Debitore autorizza il Creditore a disporre sul conto corrente sopra indicato addebiti in via continuativa ed il Prestatore di Servizi di Pagamento (di seguito “PSP”) ad eseguire l'addebito secondo le disposizioni impartite dal Creditore. Il rapporto con il PSP è regolato dal contratto stipulato dal Debitore con il PSP stesso. Il Debitore ha facoltà di richiedere al PSP il rimborso di quanto addebitato, secondo quanto stabilito nel suddetto contratto; eventuali richieste di rimborso devono essere presentate entro e non oltre 8 settimane a decorrere dalla data di addebito. (2)" ) );

	$pdf->Ln(2);
	$pdf->SetFont('FFDin','',10);

	$col = array();
	$col[] = array('text' =>'DATI IDENTIFICATIVI DEL SOTTOSCRITTORE', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$temp = @$cnt['sdd_sottoscrittore_cognome_nome'] ? strtoupper( decodeUTF8($cnt['sdd_sottoscrittore_cognome_nome']) ) : "";
	$col[] = array('text' =>'Cognome e Nome:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
	$columns[] = $col;

	$col = array();
	$temp = @$cnt['sdd_sottoscrittore_codfisc'] ? strtoupper( decodeUTF8($cnt['sdd_sottoscrittore_codfisc']) ) : "";
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

	// visibilità condizionale
	if($cnt['sdd_titolare_linea']):
		$pdf->Ln(2);

		$col = array();
		$col[] = array('text' =>'TITOLARE DEL CONTRATTO/LINEA TELEFONICA (da compilare solo se il sottoscrittore non coincide con il titolare del contratto)', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
		$columns[] = $col;

		$col = array();
		$temp = @$cnt['sdd_titolare_linea'] ? strtoupper( decodeUTF8($cnt['sdd_titolare_linea']) ) : "";
		$col[] = array('text' =>'Linea Telefonica / Contratto:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		$columns[] = $col;

		$col = array();
		$temp = @$cnt['sdd_titolare_cognome_nome'] ? strtoupper( decodeUTF8($cnt['sdd_titolare_cognome_nome']) ) : "";
		$col[] = array('text' =>'Cognome e Nome/Ragione Sociale:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		$columns[] = $col;

		$col = array();
		$temp = @$cnt['sdd_titolare_codfisc_piva'] ? strtoupper( decodeUTF8($cnt['sdd_titolare_codfisc_piva']) ) : "";
		$col[] = array('text' =>'Codice Fiscale /P.IVA:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		$columns[] = $col;

		$col = array();
		$temp = @$cnt['sdd_titolare_recapito'] ? strtoupper( decodeUTF8($cnt['sdd_titolare_recapito']) ) : "";
		$col[] = array('text' =>'Recapito Telefonico:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		$columns[] = $col;

		$pdf->WriteTable($columns);
		$columns = null;
	endif;

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
	$pdf->MultiCell(0,$lineHeight, decodeUTF8( "Note\n1) La presente autorizzazione permanente di addebito in conto corrente è subordinata all'accettazione da parte del Prestatore di Servizi di Pagamento (PSP) del Debitore.\n2) A titolo esemplificativo, possono essere PSP le banche, gli istituti di moneta elettronica e gli istituti di pagamento autorizzati.\n3) Nel caso di c/c intestato a persona giuridica il sottoscrittore coincide con il soggetto delegato ad operare sul conto. Nel caso di c/c intestato a persona fisica il sottoscrittore coincide con il titolare medesimo ovvero con il soggetto delegato ad operare sullo stesso" ) );

endif;


// ***********	NUOVA PAGINA - Elenchi: premessa ***************

$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, 'Richiesta pubblicazione dati nei nuovi elenchi telefonici');
$pdf->Ln(1);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('FFDin','',10);

$pdf->MultiCell(0,$lineHeight, decodeUTF8("Gentile cliente,") );
$pdf->Ln(4);

$pdf->MultiCell(0,$lineHeight, decodeUTF8("Lei può decidere, rispondendo alle domande di seguito riportate, se ed in quale modo far inserire il Suo nome e altri Suoi dati personali negli elenchi telefonici. Se Lei è un nuovo abbonato e risponde 'NO' i Suoi dati non saranno inseriti. La scelta che sta per fare potrà in futuro essere liberamente cambiata.") );
$pdf->Ln(4);

$pdf->MultiCell(0,$lineHeight, decodeUTF8("I Suoi dati potranno essere utilizzati per le normali comunicazioni tra persone e, in base a recenti modifiche legislative, anche per chiamate pubblicitarie, a meno che Lei non decida di iscriversi al “Registro pubblico delle opposizioni” per dire no alle telefonate promozionali.") );
$pdf->Ln(4);

$pdf->MultiCell(0,$lineHeight, decodeUTF8("Cinque sono i modi per iscriversi a questo Registro: \n- Per raccomandata, scrivendo a:\n   GESTORE DEL REGISTRO PUBBLICO DELLE OPPOSIZIONI - ABBONATI UFFICIO ROMA NOMENTANO\n   CASELLA POSTALE 7211 - 00162 ROMA (RM) \n- via fax: 06.5422 4822 \n- per e-mail: abbonati.rpo@fub.it \n- Tramite il numero verde: 800.265.265 \n- Compilando il modulo elettronico disponibile nella apposita 'area abbonato' sul sito:http://www.registrodelleopposizioni.it") );
$pdf->Ln(4);

$pdf->MultiCell(0,$lineHeight, decodeUTF8("Presso i seguenti recapiti Lei potrà: avere una ulteriore copia di questo modulo; modificare liberamente, e senza alcun onere,
tutte le scelte da Lei effettuate; esercitare i Suoi diritti riconosciuti dal Codice in materia di protezione dei dati personali.") );
$pdf->Ln(4);

$pdf->MultiCell(0,$lineHeight, decodeUTF8("Sito web: www.terrecablate.it\nIndirizzo Postale: Terrecablate Reti e Servizi S.r.l. – Viale Toselli 9/A – 53100 Siena\nPer altre informazioni: Servizio Clienti 800078100") );
$pdf->Ln(4);

$pdf->MultiCell(0,$lineHeight, decodeUTF8("Per l'esercizio dei diritti di cui agli articoli 15.22 del Regolamento UE 679/2016 Lei potrà rivolgersi ai recapiti indicati nell'informativa in allegato.") );
$pdf->Ln(20);

$pdf->SetFont('FFDin','B',10);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("Dal 1 novembre 2021") );

$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("gli abbonati alla telefonia fissa o mobile che abbiano cambiato operatore telefonico richiedendo la conservazione del numero (c.d. Number Portability) e non rispondano alle domande del questionario e non lo riconsegnino, mantengono le scelte fatte con il precedente operatore relativamente alla presenza in elenco dei dati e delle informazioni già fornite. I dati saranno utilizzati solo con modalità strettamente funzionali per prestare i servizi richiesti dal Cliente, o per quali ha manifestato il consenso.") );

	

// ***************** PAGINA SCELTE ELENCHI ******************
$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);

// -- intestazione complessa 
$col = array();
$col[] = array('text' =>'RICHIESTA INSERIMENTO/MODIFICA/REVOCA DATI NEI NUOVI ELENCHI TELEFONICI ', 'width' => '115', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '14', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;
$pdf->WriteTable($columns);
$columns = null;


$col = array();
$col[] = array('text' =>'ATTENZIONE', 'width' => '115', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '10', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => '');

$columns[] = $col;
$pdf->WriteTable($columns);
$columns = null;

$col = array();
$col[] = array('text' =>'Le ricordiamo che il presente modulo deve essere sempre munito di data e firma', 'width' => '115', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '8', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => '');

$columns[] = $col;
$pdf->WriteTable($columns);
$columns = null;

$pdf->SetY(35); // reset -> parte destra dell'intestazione
$pdf->SetX(125);

$col = array();
$col[] = array('text' =>'Numero Oggetto della Richiesta:', 'width' => '80', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '9', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.1', 'linearea' => 'TLBR');

$columns[] = $col;
$pdf->WriteTable($columns);
$columns = null;

$pdf->SetX(125);

$col = array();
$col[] = array('text' =>'ID Cliente:', 'width' => '80', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '9', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.1', 'linearea' => 'TLBR');

$columns[] = $col;
$pdf->WriteTable($columns);
$columns = null;

$pdf->SetX(125);

$col = array();
$col[] = array('text' =>'ID Contratto:', 'width' => '80', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '9', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.1', 'linearea' => 'TLBR');

$columns[] = $col;
$pdf->WriteTable($columns);
$columns = null;

$pdf->SetX(0);
$pdf->SetY(60);

$col = array();
$col[] = array('text' =>'1. Vuole che il suo nome sia presente nei nuovi elenchi telefonici?', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->SetTextColor(0,0,0);
$temp = $ele['elenchi_consenso'] ? "\n[X] SI     [ ] NO" : "[ ] SI     [X] NO";
$temp .= $ele['elenchi_servabbonati'] ? "\nDESIDERO " : "\nNON DESIDERO ";
$temp .= "che i dati da me indicati possano essere foniti a chi ne faccia richiesta ad un Servizio di informazione abbonati)\n";
$pdf->MultiCell(0,$lineHeight, $temp, 1,'C');

$pdf->Ln(1);
$col = array();
$col[] = array('text' =>'2. Con quali dati vuol essere inserito negli elenchi?', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' =>"Di seguito indichi i dati con i quali vuole essere inserito all'interno dei nuovi elenchi. Può decidere di comparire senza la Via e il Numero Civico, o solamente senza quest'ultimo, non compilando i relativi campi. Devono essere indicati i dati dell'intestatario.", 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Cognome/Ragione sociale: '. strtoupper($ele['elenchi_cognome']) ), 'width' => '80', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Nome: '. strtoupper($ele['elenchi_nome']) ), 'width' => '80', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$iniz = $ele['elenchi_soloiniziale'] ? "[X] solo inziale" : "[ ] solo iniziale";
$col[] = array('text' => $iniz, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Numero telefonico: '. strtoupper($ele['elenchi_numero']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Indirizzo: Via/Piazza '. strtoupper($ele['elenchi_indirizzo']) ), 'width' => '140', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('N.Civico: '. strtoupper($ele['elenchi_civico']) ), 'width' => '60', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Comune '. strtoupper($ele['elenchi_citta']) ), 'width' => '120', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('CAP: '. strtoupper($ele['elenchi_cap']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($ele['elenchi_provincia']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;
	
$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(1);
$col = array();
$col[] = array('text' =>'3. Vuole che negli elenchi figurino altri suoi dat?', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' =>decodeUTF8("Può chiedere che negli elenchi siano inseriti anche altri suoi dati. Li indichi qui sotto."), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Titolo di studio o di specializzazione '. strtoupper($ele['elenchi_titolo']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => decodeUTF8('Professione o Attività: '. strtoupper($ele['elenchi_professione']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$pdf->Ln(1);
$col = array();
$col[] = array('text' =>'4. Desidera che una persona che conosce il suo numero di telefono possa risalire al suo nome?', 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' =>decodeUTF8("Una persona che non conosce o che non ricorda il suo nome, potrebbe risalire ad esso sulla base del suo numero telefonico o di un altro suo dato. È d'accordo?"), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$temp = $ele['elenchi_nomedanumero'] ? "[X] SI     [ ] NO" : "[ ] SI     [X] NO";
$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(1);
$col = array();
$col[] = array('text' => decodeUTF8('5. Vuole ricevere pubblicità per posta?'), 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' =>decodeUTF8("Lei ha il diritto di dire SI o NO all'invio di pubblicità, promozioni, offerte commerciali, ecc. tramite posta cartacea al Suo indirizzo indicato negli elenchi.\nSONO D'ACCORDO CON L'USO DEL MIO INDIRIZZO PER L'INVIO DI POSTA CARTACEA PUBBLICITARIA:"), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$temp = decodeUTF8("Se SI, iI simbolo della bustina indicherà questa Sua scelta.      ");
$temp .= $ele['elenchi_posta'] ? "[X] SI     [ ] NO" : "[ ] SI     [X] NO";
$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


$pdf->Ln(1);

$col = array();
$col[] = array('text' => decodeUTF8('DATA E FIRMA'), 'width' => '200', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' =>decodeUTF8("Le ricordiamo che per esprimere il suo consenso relativamente all'inserimento dei suoi dati nei nuovi elenchi è necessario firmare il presente modulo ed inviare, inoltre, copia di un suo documento di identità. Nel caso in cui sia presente la Ragione Sociale, è necessario che la firma e la fotocopia del documento siano quelli del Rappresentante Legale. La documentazione completa dovrà essere inviata per posta al seguente indirizzo: Terrecablate Reti e Servizi S.r.l. Viale Toselli, 9/A 53100 Siena, oppure tramite fax al n° 0577047497."), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>decodeUTF8('Data '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>decodeUTF8('Firma '), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$columns[] = $col;

$col = array();
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' =>'', 'width' => '40', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => '');
$col[] = array('text' =>' ', 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;


// *************** GDPR **************************************
$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(33);

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, 'INFORMATIVA AI SENSI DELL\'ART. 13 DEL REGOLAMENTO UE 679/2016 RELATIVA AL TRATTAMENTO DEI DATI PERSONALI');

$pdf->Ln(2);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('FFDin','',9);


$pdf->MultiCellHTML(0, $lineHeight, "Ai sensi dell'art. 13 del Regolamento UE 679/2016 (di seguito \"GDPR\" o \"Regolamento\"), con la presente informativa Terrecablate Reti e Servizi S.r.l. (di seguito, \"<b>Terrecablate</b>\"), con sede legale Viale Toselli, 9/A - 53100 Siena, e-mail privacy@terrecablate.it in qualità di Titolare del trattamento dei Suoi dati personali (di seguito anche \"Titolare\"), intende informarLa sulla tipologia di dati raccolti e sulle modalità di trattamento adottate nel corso del rapporto contrattuale con il Titolare.<br>Il Responsabile per la protezione dei dati personali (di seguito, \"<b>DPO</b>\") ex art. 37 e ss. del Regolamento raggiungibile all'indirizzo e-mail dpo@terrecablate.it e tramite posta ordinaria all'indirizzo Terrecablate Reti e Servizi S.r.l., in Viale Toselli, 9/A, CAP 53100, Siena, c.a. del <b>Data Protection Officer.</b>") ;

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight,"<b>Categorie di dati oggetto del trattamento</b><br>Il Titolare tratterà i Suoi dati personali rientranti nella definizione di cui all'art. 4(1) del GDPR, raccolti nell'ambito del contratto e/o della conclusione dello stesso, tra cui rientrano, a titolo esemplificativo e non esaustivo nome, cognome, numero di telefono mobile, indirizzo e-mail ed in generale i suoi dati di contatto (in qualità di titolare del contratto ovvero quale referente/rappresentante legale della società titolare del contratto). Al fine di usufruire delle agevolazioni previste dalla DELIBERA n. 46/17/CONS AGCOM, l'Autorità stabilisce le modalità di attuazione delle disposizioni relative alle misure destinate agli utenti disabili di cui agli artt. 57 e 73 bis del decreto legislativo 1 agosto 2003, n. 259 “Codice delle comunicazioni elettroniche”; potranno essere trattati dati appartenenti a particolari categorie ai sensi dell'art. 9 del GDPR, ed in particolare dati relativi al tuo stato di salute, qualora necessari per l'attivazione di particolari servizi.");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight,"<b>Finalità, base giuridica e facoltatività del trattamento</b><br>Il trattamento dei Suoi dati è effettuato per le seguenti finalità:<br>a. erogazione del Servizio ed esecuzione di ogni eventuale relativo obbligo contrattuale assunto da Terrecablate nei Suoi confronti (a titolo esemplificativo l'installazione o la consegna di apparati necessari per la fruizione del Servizio, invio di informazioni o comunicazioni di servizio, la gestione di reclami e contenziosi, chiamate al nostro servizio clienti (compreso eventuale recupero del credito direttamente o attraverso soggetti terzi quali Società di recupero del credito; cessione del credito a Società autorizzate);<br>b. adempimenti di legge, regolamenti o normative nazionali e comunitarie, adempimenti a disposizioni delle Autorità di vigilanza del settore o ad ordini emanati da Autorità giudiziarie e/o amministrative in tra cui, gli obblighi derivanti dalla DELIBERA n. 46/17/CONS AGCOM; nonché quelli connessi alle finalità di accertamento e repressione dei reati, di ordine pubblico e di protezione civile; <br>c. I Suoi dati personali, ivi inclusi quelli relativi al traffico telematico, potranno essere anche trattati da Terrecablate per far valere o difendere un proprio diritto in sede giudiziaria (compreso eventuale recupero del credito);");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight,"La base giuridica del trattamento per la finalità a) è l'art. 6.1.b) del GDPR, per la finalità b) sono gli artt. 6.1.c) e 9.2.b) del GDPR e per la finalità c) sono gli artt. 9.2.f) e il 6.1.f) del GDPR.");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight,"Il conferimento dei Suoi dati personali per le finalità a) e b) e c) sopra indicate è facoltativo, ma in difetto non sarà possibile per Terrecablate erogare il Servizio ed adempiere agli ulteriori obblighi assunti nei Suoi confronti");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight,"I Suoi dati personali saranno trattati, inoltre, solo previo Suo specifico consenso ex art. 6.1.a) del Regolamento, per le seguenti finalità:<br>d. inviarLe comunicazioni promozionali e di marketing, incluso l'invio di newsletter e ricerche di mercato, attraverso strumenti automatizzati (email, sms, mms, notifiche push, fax, whatsapp) e non (posta cartacea e telefono con operatore); si precisa che il Titolare raccoglie un unico consenso per le finalità di marketing qui descritte, ai sensi del Provvedimento Generale del Garante per la Protezione dei Dati Personali \"Linee guida in materia di attività promozionale e contrasto allo spam\" del 4 luglio 2013; qualora, in ogni caso, Lei desiderasse opporsi al trattamento dei Suoi dati per le finalità di marketing eseguito con i mezzi qui indicati, nonché revocare il consenso prestato, potrà in qualunque momento farlo contattando il Titolare o il DPO ai recapiti indicati in questa informativa, senza pregiudicare la liceità del trattamento basata sul consenso prestato prima della revoca;");
$pdf->MultiCellHTML(0, $lineHeight,"e. per l'analisi delle sue scelte d'acquisto e delle sue preferenze comportamentali nei nostri Punti Amici e sui nostri siti web, al fine di meglio strutturare comunicazioni e proposte commerciali personalizzate, per effettuare analisi generali per fini di orientamento strategico e di intelligence commerciale e, in genere, per attività di profilazione;<br>f. per essere inseriti negli elenchi telefonici (cartacei ed altri tipi di elenchi, via Internet, riprodotti su supporti elettronici, su carta), eventualmente distinti per categorie o per zone geografiche o per tipo di telefonia fissa e/o mobile, con il Suo consenso, salvo possibili aggiustamenti di eventuali errori formali e miglioramenti redazionali già tenuti presenti per gli elenchi in distribuzione.");



$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(33);

$pdf->MultiCellHTML(0, $lineHeight-1,"La base giuridica del trattamento per le finalità d), e) e f) è l'art. 6.1.a) del Regolamento.<br>Il conferimento dei Suoi Dati Personali per le finalità di cui alla lettera d), e), f) e g) sopra indicate è facoltativo; non è prevista alcuna conseguenza in caso di un Suo rifiuto.");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight-1,"<b>Modalità di trattamento dei dati</b><br>Il trattamento dei Dati Personali avverrà tramite supporti e/o strumenti informatici, manuali e/o telematici, con logiche strettamente correlate alle finalità del trattamento e comunque garantendo la riservatezza e sicurezza dei dati stessi e nel rispetto del Regolamento e dei Provvedimenti del Garante per la protezione dei Dati Personali applicabili. Al fine di fornirLe un servizio di assistenza telefonica più efficiente, i Suoi dati potranno essere trattati con procedure informatizzate idonee a permettere all'operatore di identificare, all'atto della chiamata, la tipologia di contratto in essere.");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight-1,"<b>Trasferimento dei dati extra UE</b><br>I Suoi Dati Personali potranno essere trasferiti al di fuori dello Spazio Economico Europeo. La Società rende noto che il trattamento avverrà secondo una delle modalità consentite dalla legge vigente, quali ad esempio il consenso dell'interessato, l'adozione di Clausole Standard approvate dalla Commissione Europea, la selezione di soggetti aderenti a programmi internazionali per la libera circolazione dei dati od operanti in Paesi considerati sicuri dalla Commissione Europea.<br>
È possibile avere maggiori informazioni, su richiesta, presso il Titolare o il DPO ai contatti sopraindicati.");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight-1,"<b>Destinatari e trasferimento dei dati personali</b><br>- soggetti che agiscono tipicamente in qualità di responsabili del trattamento ai sensi dell'art. 28 del Regolamento;<br>- personale incaricato del trattamento ai sensi dell'articolo 29 del Regolamento;<br>- soggetti, enti o autorità, autonomi titolari del trattamento, a cui sia obbligatorio comunicare i suoi dati personali in forza di disposizioni di legge o di ordini delle autorità;<br>- soggetti che svolgono attività di trasmissione, imbustamento, trasporto e smistamento delle comunicazioni dell'interessato;<br>L'elenco aggiornato e completo dei responsabili è disponibile presso Terrecablate e comunque può essere richiesto al Titolare ai recapiti sopra indicati.");


$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight-1,"<b>Conservazione dei dati personali</b><br>I tuoi dati saranno trattati solo per il tempo necessario per le finalità sopra menzionate e saranno conservati per i periodi di seguito indicati:<br>a. i dati trattati per l'esecuzione del contratto saranno conservati per tutta la durata del contratto e per un periodo di 10 anni successivo alla conclusione del contratto, salvo sorga l'esigenza di una ulteriore conservazione, per consentire a Terrecablate la difesa dei propri diritti;<br>b. i dati trattati per l'adempimento di obblighi di legge saranno conservati da Terrecablate nei limiti previsti dalla legge e finché persista la necessità del trattamento per adempiere a detti obblighi di legge;<br>c. i dati saranno trattati per finalità di marketing per un periodo di 24 mesi e fino alla eventuale revoca del consenso da te prestato;<br>d. i dati saranno trattati per finalità di profilazione per un periodo di 12 mesi e fino alla eventuale revoca del consenso da te prestato all'utilizzo degli stessi per tale scopo;");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight-1,"In riferimento alla conservazione dei dati di traffico, questa è soggetta alla seguenti prescrizioni normative:<br>- Art. 123 del DLgs 196/2003 (come modificato dal D.Lgs. 101/2018): i dati relativi al traffico telefonico e/o telematico saranno conservati per un periodo massimo di sei mesi per finalità di fatturazione ovvero di pagamenti in caso di interconnessione, salva l'ulteriore specifica conservazione necessaria per effetto di una contestazione anche in sede giudiziale;\n- Art.132 del DLgs 196/2003 (come modificato dal D.Lgs. 101/2018) i dati relativi al traffico telefonico e telematico in entrata ( e/o in uscita) esclusi comunque i contenuti delle comunicazioni, saranno conservati per finalità di accertamento e repressione dei reati per un periodo massimo di 24 mesi per il traffico telefonico; di 12 mesi per il traffico telematico; di 30 giorni per le chiamate senza risposta - termini derogati dall’art 24 delle Legge Europea n.167/2017 per finalità di accertamento e repressione dei soli reati di cui agli artt. 51, comma 3 quater e 407, comma 2, lett.a) c.p.p. Nei soli casi di reato, in cui è consentita la deroga del termine di conservazione, il dato di traffico telefonico (compreso le chiamate senza risposta) e telematico è conservato per 72 mesi.");




$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(33);


$pdf->MultiCellHTML(0, $lineHeight-1,"<b>I Suoi diritti privacy ex artt. 15 e ss. del Regolamento</b><br>Lei ha diritto di chiedere al Titolare, in qualunque momento, l'accesso ai Suoi Dati, la rettifica o la cancellazione degli stessi o di richiedere la limitazione del trattamento, o di ottenere in un formato strutturato, di uso comune e leggibile da dispositivo automatico i dati che La riguardano nei casi previsti dall'art. 20 del Regolamento. In qualsiasi momento potrà revocare ex art. 7 del Regolamento, il consenso già prestato, senza che ciò pregiudichi la liceità del trattamento effettuato anteriormente alla revoca del consenso.");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight-1,"La informiamo, inoltre, che ha diritto di opporsi ex art. 21 del Regolamento, per motivi legittimi, al trattamento dei dati, per esempio potrà opporsi in ogni momento all'invio di marketing diretto con strumenti automatizzati (sms, mms, email, notifiche push, fax) e non (posta cartacea, telefono con operatore); inoltre, resta salva la possibilità di esercitare tale diritto in parte, ossia, in tal caso, opponendosi, ad esempio, al solo invio di comunicazioni promozionali effettuato tramite strumenti automatizzati.");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight-1,"Le richieste vanno rivolte per iscritto al Titolare ovvero al DPO ai recapiti sopra indicati.");

$pdf->Ln(3);

$pdf->MultiCellHTML(0, $lineHeight,"In ogni caso Lei ha sempre diritto di proporre reclamo all'autorità di controllo competente (Garante per la Protezione dei Dati Personali), ai sensi dell'art. 77 del Regolamento, qualora ritenga che il trattamento dei Suoi dati sia contrario alla normativa in vigore.");


// ---- OUTPUT ----
$pdfName = 'contratto-'. $cnt['codice'] ."_". date("His") . '.pdf';
$pdf_file_path = TC_ADDONS_CONTRATTI_DIR . $pdfName;
$pdf_file_url = TC_ADDONS_CONTRATTI_URL . $pdfName;

$pdf->Output('F',$pdf_file_path); 
