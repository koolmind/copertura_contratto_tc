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
$pdf->SetTextColor(235, 110, 43);
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
$pdf->SetTextColor(235, 110, 43);
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


// ----	PAGINA 2 ----

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

$pdf->SetTextColor(235, 110, 43);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '3. Prodotti e Servizi richiesti');

$pdf->Ln(3);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','B',11);
$pdf->MultiCell(0,$lineHeight, 'SERVIZI INTERNET E TELEFONO TERRECABLATE');
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,$lineHeight, "Sarà attivata l'offerta {$nomeCompletoOfferta}"); 

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


$pdf->Ln(4);
/*
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','B',11);
$pdf->MultiCell(0,$lineHeight, 'INDIRIZZO INVIO MODEM');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','',8);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("Nel caso in cui il cliente ometta l'indicazione l'apparato verrà inviato all'indirizzo di attivazione.") ); 

$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('FFDin','',10);



if(@$cnt['indirizzo_dispositivo']) :

	$col = array();
	$col[] = array('text' => decodeUTF8('Presso: '. strtoupper($cnt['presso_dispositivo']) ), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Indirizzo Via/Piazza: '. strtoupper($cnt['indirizzo_dispositivo']) ), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('N°: '. strtoupper($cnt['numero_civico_dispositivo']) ), 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$col = array();
	$col[] = array('text' => decodeUTF8('Città: '. strtoupper($cnt['citta_dispositivo']) ), 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('Provincia: '. strtoupper($cnt['provincia_dispositivo']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$col[] = array('text' => decodeUTF8('CAP: '. strtoupper($cnt['cap_dispositivo']) ), 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$pdf->WriteTable($columns);
	$columns = null;

else:
	$pdf->MultiCell(0,$lineHeight, decodeUTF8('COME SOPRA ( si veda punto 2 )') );
endif;

if ($cnt['offerta_selezionata'] != 'myofficefax'):
	$pdf->Ln(4);

	$pdf->SetTextColor(0, 86, 122);
	$pdf->SetFont('FFDin','B',11);
	$pdf->MultiCell(0,$lineHeight, 'OPZIONI TRAFFICO');

	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('FFDin','',11);

	$col = array();
	$col[] = array('text' => decodeUTF8('Chiamate verso cellulari nazionali'), 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$temp = @$cnt['opzione_cellulari_nazionali'] ? $contratti_strings[$cnt['opzione_cellulari_nazionali']] : "nessuna";
	$col[] = array('text' => $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;

	$pdf->WriteTable($columns);
	$columns = null;
endif;

$pdf->Ln(4);

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','B',11);
$pdf->MultiCell(0,$lineHeight, 'SERVIZI SUPPLEMENTARI');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('FFDin','',11);

$servizi=0;
if (@$cnt['servizio_configurazione_bridge']):
	$servizi++;

	$col = array();
	$col[] = array('text' => decodeUTF8("Configurazione Modem BRIDGE: la CPE Terrecablate funzionerà da Bridge per la rete dati. Tutti i servizi dati (VPN, Wi-Fi, Firewall, ecc) saranno confgurati e gestiti dal cliente su un proprio apparato di frontiera sul quale verrà rilasciato l'IP. L'apparato del cliente dovrà supportare il protocollo PPPoE"), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_isdn']):
	$servizi++;
	$col = array();
	$col[] = array('text' => decodeUTF8("Opzione ISDN: I due o quattro canali voce, dei servizi Office, saranno rilasciati su interfaccia ISDN."), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_trasferimento_chiamata_voip']):
	$servizi++;
	$temp = "Trasferimento di chiamata automatico (solo per servizi Voip).";
	if (@$cnt['servizio_trasferimento_chiamata_voip_src']) $temp .="\nNumero da deviare: ".$cnt['servizio_trasferimento_chiamata_voip_src'];
	if (@$cnt['servizio_trasferimento_chiamata_voip_dst']) $temp .=" >> Numero su cui deviare: ".$cnt['servizio_trasferimento_chiamata_voip_dst'];
	
	$col = array();
	$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_avviso_di_chiamata']):
	$servizi++;
	$temp = "Avviso di chiamata (ove non compreso).";
	if (@$cnt['servizio_avviso_di_chiamata_num']) $temp .="\nSul/i numero/i: ".$cnt['servizio_avviso_di_chiamata_num'];
	$col = array();
	$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_trasferimento_chiamata']):
	$servizi++;
	$temp = "Trasferimento di chiamata.";
	if (@$cnt['servizio_trasferimento_chiamata_num']) $temp .="\nSul/i numero/i: ".$cnt['servizio_trasferimento_chiamata_num'];
	$col = array();
	$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_identificazione_chiamante']):
	$servizi++;
	$temp = "Identificazione del chiamante (ove non compreso).";
	if (@$cnt['servizio_identificazione_chiamante_num']) $temp .="\nSul/i numero/i: ".$cnt['servizio_identificazione_chiamante_num'];
	$col = array();
	$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_disabilitazione_identificazione']):
	$servizi++;
	$temp = "Disabilitazione identificazione al chiamato.";
	if (@$cnt['servizio_disabilitazione_identificazione_num']) $temp .="\nSul/i numero/i: ".$cnt['servizio_disabilitazione_identificazione_num'];
	$col = array();
	$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_installazione_apparato']):
	$servizi++;
	$col = array();
	$col[] = array('text' => decodeUTF8("Intervento di installazione e configurazione apparati Terrecablate su prima presa."), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_dettaglio_chiamate']):
	$servizi++;
	$col = array();
	$col[] = array('text' => decodeUTF8("Dettaglio chiamate."), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_linea_analogica_aggiuntiva']):
	$servizi++;
	$temp = "Linea analogica aggiuntiva ";
	if (@$cnt['servizio_linea_analogica_aggiuntiva_num']) $temp .="( sul numero: ".$cnt['servizio_linea_analogica_aggiuntiva_num']." )";
	$col = array();
	$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_numeri_aggiuntivi']):
	$servizi++;
	$temp = "Numeri aggiuntivi ";
	if (@$cnt['servizio_numeri_aggiuntivi_qta']) $temp .="( ". decodeUTF8(" quantità: ".$cnt['servizio_numeri_aggiuntivi_qta'])." )";
	$col = array();
	$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_trunk_sip']):
	$servizi++;
	$col = array();
	$col[] = array('text' => decodeUTF8("Opzione TrunkSip: I due o quattro canali voce, dei servizi MyOffce, saranno rilasciati su interfaccia TrunkSip."), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;

if (@$cnt['servizio_ribaltamento_impianto']):
	$servizi++;
	$col = array();
	$col[] = array('text' => decodeUTF8("Ribaltamento impianto."), 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
	$columns[] = $col;
endif;


if($servizi>0):
	$pdf->WriteTable($columns);
	$columns = null;
else:
	$pdf->MultiCell(0,$lineHeight, 'nessun servizio aggiuntivo.');
endif;
*/

$pdf->Ln(10);
$pdf->SetTextColor(235, 110, 43);
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


/*
 // 	PAGINA 3

$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(33);

$pdf->SetTextColor(235, 110, 43);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '5. Richiesta attivazione nuove linee');

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','',10);
$temp = ($cnt['stato_attuale_linee'] == 'stato_attuale_nuovalinea') ? strtoupper(decodeUTF8($cnt['indirizzo_nuova_linea'])) : "-";
$pdf->MultiCell(0,$lineHeight, 'Indirizzo nuova linea: '. $temp );
*/

$pdf->Ln(10);

$pdf->SetTextColor(235, 110, 43);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '5. Tipologia linea e Mantenimento del numero (Number Portability)');
// $pdf->Ln(4);
// $pdf->SetFont('FFDin','',10);
// $pdf->SetTextColor(0, 86, 122);
// $pdf->MultiCell(0,$lineHeight, decodeUTF8("Da compilare solo da parte dei titolari di linee telefoniche attualmente attive") );

$col = array();

if($cnt['linea_numero_1']) {
    $col[] = array('text' => decodeUTF8('NUMERO #1'), 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
}
---------TABELLA MIGRAZIONE ------

$pdf->Ln(1);
$col = array();
$col[] = array('text' => decodeUTF8('TIPOLOGIA'), 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' => decodeUTF8('PBX'), 'width' => '20', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' => decodeUTF8('Numero / Capofila'), 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' => decodeUTF8('Portabilità dei numeri telefonici'), 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' => decodeUTF8('Sottonumeri (solo ISDN)'), 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' => decodeUTF8('Codice di migrazione + carattere di controllo *'), 'width' => '60', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;



$pdf->WriteTable($columns);
$columns = null;

$pdf->setTextColor('0,0,0');
for($i=0; $i<4; $i++):
	//if(@$cnt['tipolinea_az_tipologia'.($i+1)]): 

		$col = array();
		$temp = @$cnt['tipolinea_az_tipologia'.($i+1)]  or "";
		$col[] = array('text' => decodeUTF8(""), 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		
		$temp = (@$cnt['tipolinea_az_pbx'.($i+1)]) ? 'X' : '';
		$col[] = array('text' => $temp, 'width' => '20', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');

		$temp = (@$cnt['tipolinea_az_tel'.(2*$i+1)] ) ? $cnt['tipolinea_az_tel'.(2*$i+1)] : " ";
		$temp .=(@$cnt['tipolinea_az_tel'.(2*$i+2)] ) ? "\n" .$cnt['tipolinea_az_tel'.(2*$i+2)] : " ";

		$col[] = array('text' => $temp, 'width' => '30', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');

		$temp = (@$cnt['tipolinea_az_portabilita'.($i+1)]=='si') ? 'SI' : 'NO';
		$col[] = array('text' => $temp, 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');

		$temp = (@$cnt['tipolinea_az_multinumero'.($i+1)]=='si') ? 'SI' : 'NO';
		$col[] = array('text' => $temp, 'width' => '30', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');

		$temp = (@$cnt['tipolinea_az_codice_migrazione'.(2*$i+1)] ) ? $cnt['tipolinea_az_codice_migrazione'.(2*$i+1)] : " ";
		$temp .=(@$cnt['tipolinea_az_codice_migrazione'.(2*$i+2)] ) ? "\n" .$cnt['tipolinea_az_codice_migrazione'.(2*$i+2)] : " ";
		$col[] = array('text' => $temp, 'width' => '60', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
		$columns[] = $col;

	//endif;
endfor;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(2);

$col = array();
$col[] = array('text' => decodeUTF8('Linea solo internet'), 'width' => '50', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'LTRB');
$col[] = array('text' => decodeUTF8('Numero di identificazione'), 'width' => '70', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('cod. Migrazione + carattere di controllo'), 'width' => '80', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => ' ', 'width' => '50', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'BLR');

$col[] = array('text' => decodeUTF8( @$cnt['tipolinea_az_numero_identificazione'] ), 'width' => '70', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'BLR');

$col[] = array('text' => decodeUTF8( @$cnt['tipolinea_az_codice_migrazione9'] ), 'width' => '80', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'BLR');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;



$pdf->Ln(2); 
$col = array();
$col[] = array('text' => decodeUTF8('GNR'), 'width' => '50', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'LTRB');
$col[] = array('text' => decodeUTF8('inizio numerazione'), 'width' => '75', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'B');
$col[] = array('text' => decodeUTF8('fine numerazione'), 'width' => '75', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $blu, 'textcolor' => $bianco, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$col[] = array('text' => '', 'width' => '50', 'height' => $cellHeight, 'align' => 'C', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'BLR');

$col[] = array('text' => decodeUTF8( @$cnt['tipolinea_az_gnr_inizio'] ), 'width' => '70', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'BLR');

$col[] = array('text' => decodeUTF8( @$cnt['tipolinea_az_gnr_fine'] ), 'width' => '80', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'BLR');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',6);
$pdf->MultiCell(0,$lineHeight, decodeUTF8('* Codice di migrazione: da inserire solo in caso di altro operatore. Qualora non fosse presente in fattura va richiesto al proprio operatore assieme al carattere di controllo. Il carattere di controllo è composto da una sola lettera, va inserito come ultimo carattere.') );

$pdf->Ln(15);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',11);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("DATI ESATTI INTESTATARIO E UBICAZIONE ATTUALE LINEA TELEFONICA") );
$pdf->Ln(2);
$pdf->SetFont('FFDin','',9);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("riprendere dati dall'attuale bolletta ed allegarne possibilmente copia") );
$pdf->Ln(2);
$pdf->SetFont('FFDin','',11);
$pdf->SetTextColor(0,0,0);

$col = array();
$temp = @$cnt['tipolinea_cognome_intestatario'] ? strtoupper(decodeUTF8($cnt['tipolinea_cognome_intestatario'])) : "";
$col[] = array('text' => 'Denominazione/Ragione sociale o Cognome: '.$temp, 'width' => '130', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$cnt['tipolinea_nome_intestatario'] ? strtoupper(decodeUTF8($cnt['tipolinea_nome_intestatario'])) : "";
$col[] = array('text' => 'Nome: '.$temp, 'width' => '70', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$cnt['tipolinea_indirizzo_intestatario'] ? strtoupper(decodeUTF8($cnt['tipolinea_indirizzo_intestatario'])) : "";
$col[] = array('text' => 'Sede Via/Piazza: '.$temp, 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$cnt['tipolinea_civico_intestatario'] ? strtoupper(decodeUTF8($cnt['tipolinea_civico_intestatario'])) : "";
$col[] = array('text' => decodeUTF8('N°. '). $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$cnt['tipolinea_citta_intestatario'] ? strtoupper(decodeUTF8($cnt['tipolinea_citta_intestatario'])) : "";
$col[] = array('text' => decodeUTF8('Città: ').$temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$cnt['tipolinea_provincia_intestatario'] ? strtoupper(decodeUTF8($cnt['tipolinea_provincia_intestatario'])) : "";
$col[] = array('text' => decodeUTF8('Provincia: '). $temp, 'width' => '60', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$cnt['tipolinea_cap_intestatario'] ? strtoupper(decodeUTF8($cnt['tipolinea_cap_intestatario'])) : "";
$col[] = array('text' => decodeUTF8('CAP: '). $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$cnt['tipolinea_indirizzo_linea'] ? strtoupper(decodeUTF8($cnt['tipolinea_indirizzo_linea'])) : "";
$col[] = array('text' => 'Indirizzo ubicazione linea (se diverso da quello sopra indicato): '.$temp, 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$cnt['tipolinea_civico_linea'] ? strtoupper(decodeUTF8($cnt['tipolinea_civico_linea'])) : "";
$col[] = array('text' => decodeUTF8('N°. '). $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = @$cnt['tipolinea_citta_linea'] ? strtoupper(decodeUTF8($cnt['tipolinea_citta_linea'])) : "";
$col[] = array('text' => decodeUTF8('Città: ').$temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$cnt['tipolinea_provincia_linea'] ? strtoupper(decodeUTF8($cnt['tipolinea_provincia_linea'])) : "";
$col[] = array('text' => decodeUTF8('Provincia: '). $temp, 'width' => '60', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = @$cnt['tipolinea_cap_linea'] ? strtoupper(decodeUTF8($cnt['tipolinea_cap_linea'])) : "";
$col[] = array('text' => decodeUTF8('CAP: '). $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;



// PAG 4
$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(235, 110, 43);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '7. Servizi di migrazione e mantenimento del numero telefonico');

$pdf->SetFont('FFDin','',10);
$pdf->SetTextColor(0, 0, 0);

$col = array();
$temp = decodeUTF8('Denominazione/Ragione sociale o Cognome: '. strtoupper(@$cnt['migrazione_cognome_azienda']) );
$col[] = array('text' => $temp, 'width' => '130', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('Nome: '. strtoupper(@$cnt['migrazione_nome_azienda']) );
$col[] = array('text' => $temp, 'width' => '70', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Sede Via/Piazza: '. strtoupper(@$cnt['migrazione_indirizzo_azienda']) );
$col[] = array('text' => $temp, 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('N°: '. strtoupper(@$cnt['migrazione_numero_civico_azienda']) );
$col[] = array('text' => $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Città: '. strtoupper(@$cnt['migrazione_citta_azienda']) );
$col[] = array('text' => $temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('Provincia: '. strtoupper(@$cnt['migrazione_provincia_azienda']) );
$col[] = array('text' => $temp, 'width' => '60', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('CAP: '. strtoupper(@$cnt['migrazione_cap_azienda']) );
$col[] = array('text' => $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Partita IVA / Codice Fiscale: '. strtoupper(@$cnt['migrazione_codice_fiscale_azienda']) );
$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Ruolo: '. strtoupper(@$cnt['migrazione_ruolo_cliente']) );
$col[] = array('text' => $temp, 'width' => '200', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Cognome: '. strtoupper(@$cnt['migrazione_cognome']) );
$col[] = array('text' => $temp, 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('Nome: '. strtoupper(@$cnt['migrazione_nome']) );
$col[] = array('text' => $temp, 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
decodeUTF8('Nome: '. strtoupper(@$cnt['migrazione_sesso']) );
$col[] = array('text' => $temp, 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Data di nascita: '. strtoupper(@$cnt['migrazione_data_nascita']) );
$col[] = array('text' => $temp, 'width' => '58', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('Luogo di nascita: '. strtoupper(@$cnt['migrazione_luogo_nascita']) );
$col[] = array('text' => $temp, 'width' => '96', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('Prov.: '. strtoupper(@$cnt['migrazione_provincia_nascita']) );
$col[] = array('text' => $temp, 'width' => '46', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Codice Fiscale: '. strtoupper(@$cnt['migrazione_codice_fiscale']) );
$col[] = array('text' => $temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('Nazionalità: '. strtoupper(@$cnt['migrazione_nazionalita']) );
$col[] = array('text' => $temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Documento *: '. strtoupper($contratti_strings[@$cnt['migrazione_tipo_documento']]) );
$col[] = array('text' => $temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('N°: '. strtoupper(@$cnt['migrazione_numero_documento']) );
$col[] = array('text' => $temp, 'width' => '100', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Rilasciato da: '. strtoupper(@$cnt['migrazione_rilasciato_documento']) );
$col[] = array('text' => $temp, 'width' => '110', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('il: '. strtoupper(@$cnt['migrazione_data_documento']) );
$col[] = array('text' => $temp, 'width' => '45', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('Scadenza: '. strtoupper(@$cnt['migrazione_scadenza_documento']) );
$col[] = array('text' => $temp, 'width' => '45', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Residenza (o domicilio italiano): '. strtoupper(@$cnt['migrazione_indirizzo']) );
$col[] = array('text' => $temp, 'width' => '160', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('N°: '. strtoupper(@$cnt['migrazione_numero_civico']) ); 
$col[] = array('text' => $temp, 'width' => '40', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$col = array();
$temp = decodeUTF8('Città: '. strtoupper(@$cnt['migrazione_citta']) );
$col[] = array('text' => $temp, 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('Provincia: '. strtoupper(@$cnt['migrazione_provincia']) );
$col[] = array('text' => $temp, 'width' => '68', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$temp = decodeUTF8('CAP: '. strtoupper(@$cnt['migrazione_cap']) );
$col[] = array('text' => $temp, 'width' => '64', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $nero, 'drawcolor' => $blu, 'linewidth' => '0.3', 'linearea' => 'B');
$columns[] = $col;

$pdf->WriteTable($columns);
$columns = null;

$pdf->Ln(4);

$pdf->MultiCell(0,$lineHeight, decodeUTF8("In qualità di titolare delle linee telefoniche e/o di connessione alla rete internet indicate al punto 6 che precedono, con la presente dichiara di averne la piena e libera disponibilità e pertanto dichiara e manifesta, ad ogni effeto di legge, la propia volontà di voler usufruire su dette linee dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l.") );


if( @$cnt['migrazione_servizi'] &&  $cnt['migrazione_servizi']=='1' ):
$pdf->Ln(4);
$pdf->SetFont('FFDin','',12);
$pdf->SetTextColor(0, 86, 122);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("a) Richiesta di migrazione dei servizi telefonici ed internet") );

$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("Il cliente dichiara di voler recedere dal rapporto contrattuale con l'operatore richiamato al punto 6 della presente proposta , con riferimento alle linee telefoniche sopra indicate al fine di usufruire dei servizi di telecomunicazione offerti da Terrecablate Reti e Servizi S.r.l. in modalità ULL e/o WLR e/o Bitstream e/o Vula e/o Bitstream NGA. A tal fine dà mandato alla società Terrecablate Reti e Servizi S.r.l di inoltrare al suddetto operatore l'ordine di lavorazione e, se richiesto, la manifestazione della propria volontà di recesso oggetto della presente richiesta, secondo le forme di legge, ed a compiere ogni altra operazione necessaria per la fornitura dei succitati servizi.") );

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
endif;


if( @$cnt['migrazione_portability'] &&  $cnt['migrazione_portability']=='1' ):
$pdf->Ln(8);
$pdf->SetFont('FFDin','',12);
$pdf->SetTextColor(0, 86, 122);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("b) Richiesta di mantenimento del numero telefonico (Number Portability)*") );

$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("Il cliente dichiara di voler mantenere i numeri di cui al punto 6. nell'ambito dei servizi forniti da Terrecablate Reti e Servizi S.r.l.. Chiede pertanto che sia attivata la procedura per la prestazione del servizio di Number Portability con l'operatore indicato al precedente punto 6 relativamente ai numeri sopra specificati . A tal fine dà mandato a Terrecablate Reti e Servizi S.r.l . affinché essa provveda ad inoltrare ai suddetti operatori l'ordine di lavorazione e la manifestazione della volontà di recesso oggetto della presente richiesta , secondo le forme di legge, ed a compiere ogni altra operazione necessaria per la prestazione del servizio di Number Portability. Il cliente richiede che la gestione delle numerazioni sopra indicate venga delegata a Terrecablate Reti e Servizi S.r.l.. A tale scopo, autorizzo quest'ultima società ad attivare tutte le procedure necessarie con l'operatore che gestisce attualmente le numerazioni stesse . Il Titolare manleva Terrecablate Reti e Servizi S.r.l. da eventuali inconvenienti che possano portare all’ insuccesso della Number Portability. Qualora il titolare intendesse successivamente revocare il mandato conferito a Terrecablate Reti e Servizi S.r.l., sarà sua cura darne a quest’ultima comunicazione per iscritto.") );

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

$pdf->Ln(2);
$pdf->SetFont('FFDin','',6);
$pdf->SetTextColor(0, 86, 122);
$pdf->MultiCell(0,4, decodeUTF8("* Campo obbligatorio: il cliente deve dare precisa indicazione della volontà di mantenere il proprio numero di telefono sia firmando il punto b) che barrando la casella indicata nella sezione 6. Qualora venga omessa una delle due indicazioni Terrecablate NON potrà effettuare e quindi NON effettuerà la portabilità del numero telefonico che quindi verrà sostituito con un numero nuovo.") );
endif;

$pdf->Ln(12);
$pdf->SetFont('FFDin','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,$lineHeight, "NOTE: ");


// PAGINA 5 
$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(235, 110, 43);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, '8. Manifestazione di consenso al trattamento dei dati personali ( REG. EU 679/206)');

$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(0,4, decodeUTF8("Letta e compresa l'informativa privacy riportata nell'allegato al presente Documento di Accettazione \"INFORMATIVA Al SENSI DELL'ART. 13 DEL REGOLAMENTO UE 679/2016 RELATIVA AL TRATTAMENTO DEI DATI PERSONALI\" ") );

// Consenso trattamento dati: commerciale
$pdf->Ln(2);
$temp = $cnt['consenso_trattamento_commerciale'] ? "[X] PRESTO IL CONSENSO     [ ] NEGO IL CONSENSO" : "[ ] PRESTO IL CONSENSO     [X] NEGO IL CONSENSO";
$pdf->MultiCell(0,4, $temp, 0,'C');
$pdf->MultiCell(0,4, decodeUTF8("al trattamento dei dati personali da parte di Terrecablate per l'invio di comunicazioni promozionali e di marketing, incluso l'invio di newsletter e ricerche di mercato, attraverso strumenti automatizzati (sms, mms, email, notifiche push, fax) e non (posta cartacea, telefono con operatore). ") );

// Consenso trattamento dati: a terzi 
$pdf->Ln(2);
$temp = $cnt['consenso_terzi'] ? "[X] PRESTO IL CONSENSO     [ ] NEGO IL CONSENSO" : "[ ] PRESTO IL CONSENSO     [X] NEGO IL CONSENSO";
$pdf->MultiCell(0,4, $temp, 0,'C');
$pdf->MultiCell(0,4, decodeUTF8("alla comunicazione dei propri dati ad altre società per l'invio di loro comunicazioni promozionali e di marketing, incluso l'invio di newsletter e ricerche di mercato, attraverso strumenti automatizzati (sms, mms, email, notifiche push, fax) e non (posta cartacea, telefono con operatore). ") );

// Consenso trattamento dati: profilazione
$pdf->Ln(2);
$temp = $cnt['consenso_profilazione'] ? "[X] PRESTO IL CONSENSO     [ ] NEGO IL CONSENSO" : "[ ] PRESTO IL CONSENSO     [X] NEGO IL CONSENSO";
$pdf->MultiCell(0,4, $temp, 0,'C');
$pdf->MultiCell(0,4, decodeUTF8("al trattamento dei dati personali da parte di Terrecablate per l'analisi delle proprie scelte di acquisto, preferenze e caratteristiche anagrafiche, raccolte sia off line nei negozi sia sui siti web, al fine di meglio strutturare comunicazioni e proposte commerciali personalizzate, effettuare analisi generali per fini di orientamento strategico e di intelligence commerciale e, in genere, per attività di profilazione.  ") );

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


$pdf->Ln(6);
$pdf->SetTextColor(235, 110, 43);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, decodeUTF8('9. Scelta Modalità di pagamento')) ;

$pdf->Ln(2);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('FFDin','B',10);
$pdf->MultiCell(0,4, $contratti_strings[$cnt['modalita_pagamento']] );

if($cnt['modalita_pagamento'] == 'pagamento_cc'):
$pdf->Ln(2);
$pdf->SetFont('FFDin','',8);
$pdf->MultiCell(0,4, decodeUTF8("La informiamo che il metodo di pagamento con Carta di Credito verrà gestito ricorrendo all'apposito servizio messo a disposizione da CartaSi che rende disponibili unicamente i circuiti Visa e Mastercad e non potranno essere utilizzate Carte di Credito in modalità prepagata/ricaricabile. Terrecablate Reti e Servizi S.r.l. La informa che scegliendo la modalità di pagamento con Carta di Credito, Le verrà inviato tramite e-mail, il Codice Cliente ed il Codice Contratto mediante i quali dovrà registrarsi al portale clienti di Terrecablate (MyTerrecablate, rinvenibile all'indirizzo internet http://portale.terrecablate.it ) al fine di completare la procedura di addebito permanente sulla propria Carta di Credito e Le rammenta che la procedura di attivazione dei Servizi richiesti non potrà perfezionarsi senza che Lei vi abbia provveduto. A tale proposito Terrecablate Reti e Servizi S.r.l., inoltre, le rammenta che il termine per perfezionare la procedura di registrazione al Portale Cliente MyTerrecablate e di autorizzazione all'addebito permanente su Carta di Credito è di 10 giorni dalla data di accettazione del Contratto da parte di Terrecablate. Ove Lei abbia scelto la modalità di pagamento mediante addebito su Carta di Credito, Terrecablate Reti e Servizi S.r.l. la informa che i Suoi dati, occorrenti per tale attività, non saranno trattati e non risiederanno in alcun Database di Terrecablate Reti e Servizi S.r.l. ma saranno trattati in autonomia da Carta SI tramite i propri sistemi"));
endif;

$pdf->Ln(6);
$pdf->SetTextColor(235, 110, 43);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, decodeUTF8('10. Firma proposta di contratto')) ;

$pdf->Ln(2);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',10);
$pdf->MultiCell(0,$lineHeight, 'COMUNICAZIONE DI ACCETTAZIONE E CONFERMA DEL CONTRATTO');
$pdf->SetFont('FFDin','',8);
$pdf->SetTextColor(0,0,0);
$pdf->MultiCell(0,4, decodeUTF8("Il Cliente dichiara di voler ricevere la conferma del contratto concluso su un mezzo durevole mediante spedizione all'indirizzo e-mail indicato al punto 1 della Proposta") );

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
$pdf->MultiCell(0,4, decodeUTF8("Il Cliente, previa attenta e specifica lettura, dichiara di aver preso visione e conoscenza ed espressamente approva, ai sensi degli articoli 1341 e 1342, C.C., i seguenti articoli delle Condizioni Generali di Contratto: 3.DATI PERSONALI DEL CLIENTE; 5. ACCETTAZIONE DELLA PROPOSTA; 6. NON ACCETTAZIONE DELLA PROPOSTA - MANCATA CONCLUSIONE DEL CONTRATTO; 8. DURATA DEL CONTRATTO; 9. MODIFICHE DEL CONTRATTO DA PARTE DI TERRECABLATE; 11. CESSIONE DEL CONTRATTO; 12 CARATTERISTICHE DEI SERVIZI; 14. OPZIONE; 19. USO PERSONALE -  ABUSO DEL CONTRATTO E DEI SERVIZI – TRAFFICO ANOMALO; 21. LIMITAZIONE E FUNZIONAMENTO DEI SERVIZI; 25. OMESSO PAGAMENTO – LIMITAZIONE E SOSPENSIONE DEI SERVIZI; 28 RECESSO DI TERRECABLATE; 29. APPARATI FORNITI DA TERRECABLATE; 30. CESSAZIONE DEL CONTRATTO – OBBLIGHI RESTITUTORI DEL CLIENTE; 39. LIMITAZIONE DI RESPONSABILITÀ - MANLEVA") );

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


if($cnt['modalita_pagamento'] == 'pagamento_sdd'):
//	PAGINA 6 - SOLO PER BONIFICO
 
$pdf->AddPage();
$pdf->Image($fileHeaderPath, 0, 5, 210,25.7);
$pdf->Image($fileFooterPath, 0, 278, 210,16);

$pdf->SetY(35);

$pdf->SetTextColor(235, 110, 43);
$pdf->SetFont('FFDin','',14);
$pdf->MultiCell(0,$lineHeight, 'MOD. A - AUTORIZZAZIONE PERMANENTE DI ADDEBITO IN CONTO');
$pdf->Ln(1);
$pdf->SetTextColor(0, 86, 122);
$pdf->SetFont('FFDin','',6);
$pdf->MultiCell(0,$lineHeight, decodeUTF8("Al fine di poter accettare la richiesta, è necessario che tutti i campi contrassegnati con * siano compilati, che il modulo sia sottoscritto dal titolare del conto corrente sul quale viene richiesto l'addebito del Conto Terrecablate Retie Servizi o da soggetto delegato ad operare sul conto corrente. E necessario inoltre allegare al modulo copia del Documento d'identità valido e del tesserino del Codice Fiscale del sottoscrittore della richiesta di domiciliazione.
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
$temp = @$cnt['sdd_debitore_nome'] ? strtoupper( decodeUTF8($cnt['sdd_debitore_nome']) ) : "";
$col[] = array('text' =>'Cognome e Nome *:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$cnt['sdd_debitore_cf_piva'] ? strtoupper( decodeUTF8($cnt['sdd_debitore_cf_piva']) ) : "";
$col[] = array('text' =>'Codice Fiscale *:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$cnt['sdd_debitore_iban'] ? strtoupper( decodeUTF8($cnt['sdd_debitore_iban']) ) : "";
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
$temp = @$cnt['sdd_sottoscrittore_nome'] ? strtoupper( decodeUTF8($cnt['sdd_sottoscrittore_nome']) ) : "";
$col[] = array('text' =>'Cognome e Nome:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$cnt['sdd_sottoscrittore_cf'] ? strtoupper( decodeUTF8($cnt['sdd_debitore_cf_piva']) ) : "";
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
$temp = @$cnt['sdd_titolare_linea'] ? strtoupper( decodeUTF8($cnt['sdd_titolare_linea']) ) : "";
$col[] = array('text' =>'Linea Telefonica / Contratto:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$cnt['sdd_titolare_nome'] ? strtoupper( decodeUTF8($cnt['sdd_titolare_nome']) ) : "";
$col[] = array('text' =>'Cognome e Nome/Ragione Sociale:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$cnt['sdd_titolare_cf_piva'] ? strtoupper( decodeUTF8($cnt['sdd_titolare_cf_piva']) ) : "";
$col[] = array('text' =>'Codice Fiscale /P.IVA:', 'width' => '66', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$col[] = array('text' =>$temp, 'width' => '134', 'height' => $cellHeight, 'align' => 'L', 'font_name' => '', 'font_size' => '', 'font_style' => '', 'fillcolor' => $bianco, 'textcolor' => $blu, 'drawcolor' => $nero, 'linewidth' => '0.3', 'linearea' => 'TLBR');
$columns[] = $col;

$col = array();
$temp = @$cnt['sdd_titolare_telefono'] ? strtoupper( decodeUTF8($cnt['sdd_titolare_telefono']) ) : "";
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
$pdf->MultiCell(0,$lineHeight, decodeUTF8( "Note
	1) La presente autorizzazione permanente di addebito in conto corrente è subordinata all'accettazione da parte del Prestatore di Servizi di Pagamento (PSP) del Debitore.
	2) A titolo esemplificativo, possono essere PSP le banche, gli istituti di moneta elettronica e gli istituti di pagamento autorizzati.
	3) Nel caso di c/c intestato a persona giuridica il sottoscrittore coincide con il soggetto delegato ad operare sul conto. Nel caso di c/c intestato a persona fisica il sottoscrittore coincide con il titolare medesimo ovvero con il soggetto delegato ad operare sullo stesso" ) );

endif;

// add a page
$pdf->setSourceFile("Contratto_MyOffice.pdf");

$pdf->AddPage();
$tplIdx = $pdf->importPage(7);
$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->AddPage();
$tplIdx = $pdf->importPage(8);
$pdf->useTemplate($tplIdx, 0, 0, 210);
*/

$pdfName = 'contratto-'. $cnt['codice'] . date("His") . '.pdf';
$pdf_file_path = TC_ADDONS_CONTRATTI_DIR . $pdfName;
$pdf_file_url = TC_ADDONS_CONTRATTI_URL . $pdfName;

$pdf->Output('F',$pdf_file_path); 

//$pdf->Output();