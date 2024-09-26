<?php
require_once(TC_ADDONS_ROOT . 'vendor/tcpdf/tcpdf.php');


class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $header_path = TC_ADDONS_ROOT ."img/logotcrs.png";

        $this->Image($header_path, 10, 10, 190, 25 , 'PNG', '', 'T', true, 300, '', false, false, 0,false, false, false);
    }
}


function generate_contratto_pdf($cuid) { 
    // get contract data
    global $wpdb;
    $table_name = $wpdb->prefix . 'contratti';
    $cnt = $wpdb->get_row($wpdb->prepare( "SELECT * FROM {$table_name} WHERE codice = %s", $cuid ), OBJECT );
    
    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Terrecablate Reti e Servizi');
    $pdf->SetTitle('Proposta di contratto');

    // Header e footer
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
    $pdf->SetMargins(10, 40, 10);

    $pdf->setPrintFooter(false);

    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 9);


/*-------------------

<div class="col-12 col-md-4 order-0 order-md-1 riepilogo-box b-offerta">
                <h4 class="titolo"><small>Hai scelto di acquistare</small><br/><?php echo $offerta['nomeofferta'];?></h4>
                <div class="row px-3 py-4">
                    <div class="col-9">Canone mensile</div>
                    <div class="col-3 text-end"><?php echo $offerta['canone'];?> €</div>
                </div>
                
                <?php if (count($offerta['opzioni'])): ?>
                    <div class="my-3 px-3" id="riepilogo-opzioni">
                        <strong>OPZIONI</strong>                    
                    <?php 
                        foreach ($offerta['opzioni'] as $opzione): 
                            $strName = $opzione['name'];
                            $strQty = intval($opzione['qty']) > 1 ? ' (x'.$opzione['qty'].')' : '' ;
                            $optCost = $opzione['cost'] * $opzione['qty'];
                            $strCost = number_format($optCost, 2,",",".");
                    ?>
                            <div class="row pl-1">
                                <div class="col-9"><?php echo $strName;?> <?php echo $strQty;?> </div>
                                <div class="col-3 text-end"><?php echo $strCost;?> €</div>
                            </div>
                <?php   endforeach; ?>
                        </div>
                <?php endif; ?>

                <div class="row px-3">
                    <div class="col-9">Attivazione</div>
                    <div class="col-3 text-end">
                        <?php echo floatval($offerta['attivazione']) == 0 ? 'GRATIS' : $offerta['attivazione'] ." €";?>
                    </div>
                </div>
            </div>

--------------------*/

    

    function money($val){
        if(floatval($val)==0) return "GRATIS";

        return number_format( floatval($val), 2, ",", ".") . "€";
    }
    
    $canone = money($cnt->canone);
    $attivazione = money($cnt->attivazione);

    $arrOpzioni = maybe_unserialize($cnt->opzioni);
    $strOpzioni ="<tr><td colspan='2'>Opzioni</td></tr>";

    foreach($arrOpzioni as $opt) {
        $strOpzioni .= "<tr><td>{$opt['name']}</td><td>{$opt['cost']}</td></tr>";
    }
    

    $tbl = <<<EOD
        <table border="1" cellpadding="1" cellspacing="1">
        <tr>
            <td width="466">Dati utente</td>
            <td width="200">
                <table border="0" cellpadding="1" cellspacing="1">
                <tr>
                    <td colspan"2">DETTAGLIO COSTI</td>
                </tr>
                <tr>
                    <td width="70%">Canone mensile</td>
                    <td width="30%" align="right">{$canone}</td>
                </tr>
                <tr>
                    <td width="70%">Attivazione</td>
                    <td width="30%" align="right">{$attivazione}</td>
                </tr>

                {$strOpzioni}
                </table>
            </td>
        </tr>    
        </table>
        EOD;
    
        


    $pdf->writeHTML($tbl, true, false, false, false, '');


    // set file name
    $pdfName = "/" . $cuid . "_" . time() . ".pdf";
    
    $file_path = TC_ADDONS_CONTRATTI_DIR . $pdfName;
    $file_url = TC_ADDONS_CONTRATTI_URL . $pdfName;

    $pdf->Output($file_path, 'F');
        
    return $file_url;
}
?>