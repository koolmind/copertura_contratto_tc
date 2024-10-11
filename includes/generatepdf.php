<?php
require_once(TC_ADDONS_ROOT . 'vendor/tcpdf/tcpdf.php');

class MYPDF extends TCPDF {

    protected $headerContent;
    protected $footerContent;

    public function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $headerContent='', $footerContent) {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache);
        $this->headerContent = $headerContent;
        $this->footerContent = $footerContent;
    }


    //Page header
    public function Header() {
        $this->Image($this->headerContent, 10, 10, 190, 25 , '', '', 'T', false, 300, '', false, false, 0,false, false, false);
    }

    public function Footer() {
        $this->Image($this->footerContent, 10, 270, 190, 25 , '', '', 'T', true, 300, '', false, false, 0,false, false, false);
    }
}


function getSesso($sex){
    return $sex==1 ? "F" : "M";
} 

function showDate($date) {
    return implode("/", array_reverse(explode("-",$date)));
}

function money($val){
    if(floatval($val)==0) return "GRATIS";

    return number_format( floatval($val), 2, ",", ".") . " €";
}

function testo($doc, $col) {
    list($R,$G,$B) = explode(',', $col);
    $doc->SetTextColor( intval($R),intval($G),intval($B) );
}

function sfondo($doc, $col) {
    list($R,$G,$B) = explode(',', $col);
    $doc->SetFillColor( intval($R),intval($G),intval($B) );
}

function linea($doc, $col) {
    list($R,$G,$B) = explode(',', $col);
    $doc->SetDrawColor( intval($R),intval($G),intval($B) );
}

function generate_contratto_pdf($cuid) { 
    $blu = "0,79,111";
    $chiaro = "218,233,239";
    $nero = "0,0,0";
    $bianco = "255,255,255";
    $grigio = "128,128,128";


    // get contract data
    global $wpdb;
    $table_name = $wpdb->prefix . 'contratti';
    $cnt = $wpdb->get_row($wpdb->prepare( "SELECT * FROM {$table_name} WHERE codice = %s", $cuid ), OBJECT );

   
    // carico header e footer in base al target
    $fileHeaderId = get_option("contratto_header_".$cnt->target."_image", TC_ADDONS_PLACEHOLDER_ID);
    $fileHeaderPath = get_attached_file( $fileHeaderId );
    
    $fileFooterId = get_option("contratto_footer_".$cnt->target."_image", TC_ADDONS_PLACEHOLDER_ID);
    $fileFooterPath = get_attached_file( $fileFooterId );
        
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, $fileHeaderPath, $fileFooterPath);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Terrecablate Reti e Servizi');
    $pdf->SetTitle('Proposta di contratto n.'.$cnt->id);

    // Header e footer
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
    $pdf->SetMargins(10, 40, 10);

    $pdf->setPrintFooter(false);
    
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set cell padding
    $pdf->setCellPaddings(1, 1, 1, 1);

    // set cell margins
    $pdf->setCellMargins(1,1,1,1);

    $pdf->SetFont('helvetica', '', 9);


    $pdf->AddPage();
    // Calcola le larghezze delle colonne
    $colGap = 4;    
    $pageWidth = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
    $leftColumnWidth = ($pageWidth - $colGap) * 0.6;
    $rightColumnWidth = ($pageWidth - $colGap) * 0.4;
    $rightColumnX = PDF_MARGIN_LEFT + $leftColumnWidth + $colGap;


    $canone = money($cnt->canone);
    $attivazione = money($cnt->attivazione);

    $arrOpzioni = maybe_unserialize($cnt->opzioni);
    $strOpzioni = "";
    if(is_array($arrOpzioni) && count($arrOpzioni) > 0){
        $strOpzioni .= '<tr><td colspan="2" style="margin-top:5mm;font-weight:bold; vertical-align:middle;">OPZIONI</td></tr>';

        foreach($arrOpzioni as $idx => $opt) {
            $qty = intval($opt['qty'] > 1) ? '(x' . $opt['qty'] . ')' : '';
            $strOpzioni .= '<tr><td style="background-color:'. ($idx % 2 == 0 ? $chiaro : '#ffffff') .'">' . $opt['name'];
            
            if(intval($opt['qty'] > 1) ){
                $strOpzioni .= sprintf('(x%s)',$opt['qty']);
            } 
            
            $strOpzioni .= '</td><td align="right" style="background-color:'. ($idx % 2 == 0 ? $chiaro : '#ffffff') .'">' . money($opt['cost']) .'</td></tr>';
        }
    }

    $boxRight = '
        <table border="0" cellpadding="5">
        <tr>
            <td colspan="2" style="background-color:'.$blu.';color:white;">LA TUA OFFERTA</td>
        </tr>
        <tr>
            <td width="70%">Canone mensile base</td>
            <td align="right" width="30%">'.$canone.'</td>
        </tr>
        <tr>
            <td style="background-color:'.$chiaro.'">Attivazione</td>
            <td align="right" style="background-color:'.$chiaro.'">'.$attivazione."</td>
        </tr>";

        if($strOpzioni){
            $boxRight .= $strOpzioni;
        }

    $boxRight .= "</table>";


    // MultiCell( $w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false)
    
    testo($pdf, $blu);
    sfondo($pdf, $chiaro);
    linea($pdf, $blu);

    $pdf->MultiCell($rightColumnWidth, 5, $boxRight, 0, 'L', 0, 0, $rightColumnX, '', true,0,true);


    $txt = "Proposta di contratto del {$cnt->data_proposta_contratto}<br>Cliente: {$cnt->rag_sociale}<br>Offerta: {$cnt->nomeofferta}";
    $pdf->MultiCell($leftColumnWidth, 5, $txt, 1, 'L', 1, 1, 8, '', true,0,true);

    testo($pdf, $blu);
    sfondo($pdf, $bianco);
    linea($pdf, $blu);

    $txt = "<strong>DATI ANAGRAFICI AZIENDA</strong>";
    $pdf->MultiCell($leftColumnWidth, '3', $txt, 'B', 'L', 0, 2, 8, '', true,0,true);

    testo($pdf, $nero);
    linea($pdf, $grigio);

    $txt= "Ragione Sociale: <strong>{$cnt->rag_sociale}</strong><br>Sede: <strong>{$cnt->azienda_indirizzo }, {$cnt->azienda_civico}<br>{$cnt->azienda_cap} {$cnt->azienda_citta} ( {$cnt->azienda_provincia} )</strong><br>";
    $txt.= "P.IVA / C.F.: <strong>{$cnt->azienda_piva_cf}</strong>  -  Cod. Dest.: <strong>{$cnt->azienda_cod_destinatario}</strong>";
    $pdf->MultiCell($leftColumnWidth, 5, $txt, 0, 'L', 1, 2, 8, '', true,0,true);

    testo($pdf, $blu);
    linea($pdf, $blu);

    $txt = "<strong>DATI DI CONTATTO</strong>";
    $pdf->MultiCell($leftColumnWidth, '3', $txt, 'B', 'L', 0, 2, 8, '', true,0,true);

    testo($pdf, $nero);
    linea($pdf, $grigio);

    $txt = "Email: <strong>{$cnt->cliente_email}</strong><br>Pec: <strong>{$cnt->cliente_pec}</strong> <br>";
    $txt.= "Telefono: <strong>{$cnt->cliente_telefono}</strong>  -  Mobile: <strong>{$cnt->cliente_cellulare}</strong>";
    if($cnt->azienda_fax) { $txt.= "<br>Fax: <strong>{$cnt->azienda_fax}</strong>"; }
    $pdf->MultiCell($leftColumnWidth, 5, $txt, 0, 'L', 1, 2, 8, '', true, 0, true);

    testo($pdf, $blu);
    linea($pdf, $blu);

    $ruolo = strtoupper($cnt->cliente_ruolo);
    $txt = "<strong>DATI DEL {$ruolo}</strong>";
    $pdf->MultiCell($leftColumnWidth, '3', $txt, 'B', 'L', 0, 2, 8, '', true,0,true);

    testo($pdf, $nero);
    linea($pdf, $grigio);

    $sesso = getSesso($cnt->cliente_sesso);
    $ddn = showDate($cnt->cliente_data_nascita);

    $txt = "Cognome: <strong>{$cnt->cliente_cognome}</strong>  Nome: <strong>{$cnt->cliente_nome}</strong>  Sesso: <strong>{$sesso}</strong> <br>";
    $txt.= "Nato/a a <strong>{$cnt->cliente_luogo_nascita} ({$cnt->cliente_provincia_nascita})</strong>  il <strong>{$ddn}</strong>";
    $pdf->MultiCell($leftColumnWidth, 5, $txt, 0, 'L', 1, 2, 8, '', true, 0, true);

    // set file name
    $pdfName = "/" . $cuid . "_" . time() . ".pdf";
    
    $file_path = TC_ADDONS_CONTRATTI_DIR . $pdfName;
    $file_url = TC_ADDONS_CONTRATTI_URL . $pdfName;

    $pdf->Output($file_path, 'F');
        
    return $file_url;
}
?>