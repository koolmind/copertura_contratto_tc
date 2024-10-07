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


function generate_contratto_pdf($cuid) { 
    $blu = '#004F6F';
    $chiaro = "#dae9ef";

    // get contract data
    global $wpdb;
    $table_name = $wpdb->prefix . 'contratti';
    $cnt = $wpdb->get_row($wpdb->prepare( "SELECT * FROM {$table_name} WHERE codice = %s", $cuid ), OBJECT );


    function money($val){
        if(floatval($val)==0) return "GRATIS";

        return number_format( floatval($val), 2, ",", ".") . " €";
    }
    
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
    $pdf->setCellMargins(1, 1, 1, 1);


    $pdf->AddPage();
    // Calcola le larghezze delle colonne
    $colGap = 6;    
    $pageWidth = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
    $leftColumnWidth = ($pageWidth - $colGap) * 0.6;
    $rightColumnWidth = ($pageWidth - $colGap) * 0.4;


    $pdf->SetFont('helvetica', '', 9);

    $canone = money($cnt->canone);
    $attivazione = money($cnt->attivazione);

    $arrOpzioni = maybe_unserialize($cnt->opzioni);
    $strOpzioni = "";
    if(count($arrOpzioni) > 0){
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

    

    $boxLeft = "
    <div>
    Proposta di contratto del " . $cnt->data_proposta_contratto . "<br>
    Cliente: " . $cnt->rag_sociale . "<br>
    Offerta: " . $cnt->nomeofferta . "
    </div>";

    $boxLeft .= "
    <div style='padding:10px;'>
    DATI ANAGRAFICI AZIENDA <br>Ragione Sociale: <strong>" . $cnt->rag_sociale . "</strong><br>
    Sede: <strong>" . $cnt->azienda_indirizzo . "," . $cnt->azienda_civico . " - " . $cnt->azienda_cap . " " . $cnt->azienda_citta . " (". $cnt->azienda_provincia .")</strong><br>
    P.IVA / C.F.: <strong>" . $cnt->azienda_piva_cf ."</strong><br>
    Cod. Destinatario: <strong>" . $cnt->azienda_cod_destinatario ."</strong>
    </div>";


    
    // Scrivi il contenuto della colonna sinistra
    $pdf->writeHTMLCell($leftColumnWidth, '', PDF_MARGIN_LEFT, '', $boxLeft, 1, 0, false, true, 'L', false);    

    // Scrivi il contenuto della colonna destra
    $rightColumnX = PDF_MARGIN_LEFT + $leftColumnWidth + $colGap;
    $pdf->writeHTMLCell($rightColumnWidth, '', $rightColumnX , '', $boxRight, 0, 1, false, true, 'L', false);
        


    // $pdf->writeHTML($tbl, true, false, false, false, '');


    // set file name
    $pdfName = "/" . $cuid . "_" . time() . ".pdf";
    
    $file_path = TC_ADDONS_CONTRATTI_DIR . $pdfName;
    $file_url = TC_ADDONS_CONTRATTI_URL . $pdfName;

    $pdf->Output($file_path, 'F');
        
    return $file_url;
}
?>