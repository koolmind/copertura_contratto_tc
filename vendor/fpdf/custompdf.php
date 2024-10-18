<?php 

class CUSTOMPDF extends FPDF { 

   protected $B = 0;
   protected $I = 0;
   protected $U = 0;
   protected $HREF = '';

   function decode_utf8($text) {
      // Usa mb_convert_encoding se disponibile
      if (function_exists('mb_convert_encoding')) {
          return mb_convert_encoding($text, 'ISO-8859-1', 'UTF-8');
      }
      // Altrimenti, usa iconv come fallback
      else if (function_exists('iconv')) {
          return iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $text);
      }
      // Se nessuna delle due è disponibile, restituisci il testo originale
      // (potrebbe causare problemi con caratteri non-ASCII)
      return $text;
  }

   function WriteTable($tcolums) {
      // go through all colums
      for ($i = 0; $i < sizeof($tcolums); $i++)
      {
         $current_col = $tcolums[$i];
         $height = 0;
         
         // get max height of current col
         $nb=0;

         
         for($b = 0; $b < sizeof($current_col); $b++)
         {
            $fontName = $current_col[$b]['font_name'] != '' ? $current_col[$b]['font_name'] : 'FFDin';
            $fontStyle = $current_col[$b]['font_style'] != '' ? $current_col[$b]['font_style'] : '';
            $fontSize = $current_col[$b]['font_size'] != '' ? $current_col[$b]['font_size'] : '10';
            // set style
            $this->SetFont($fontName, $fontStyle, $fontSize);
            $color = explode(",", $current_col[$b]['fillcolor']);
            $this->SetFillColor($color[0], $color[1], $color[2]);
            $color = explode(",", $current_col[$b]['textcolor']);
            $this->SetTextColor($color[0], $color[1], $color[2]);            
            $color = explode(",", $current_col[$b]['drawcolor']);            
            $this->SetDrawColor($color[0], $color[1], $color[2]);
            $this->SetLineWidth($current_col[$b]['linewidth']);
                        
            $nb = max($nb, $this->NbLines($current_col[$b]['width'], $current_col[$b]['text']));            
            $height = $current_col[$b]['height'];
         }  
         $h=$height*$nb;
         
         
         // Issue a page break first if needed
         $this->CheckPageBreak($h);
         
         // Draw the cells of the row
         for($b = 0; $b < sizeof($current_col); $b++)
         {
            $w = $current_col[$b]['width'];
            $a = $current_col[$b]['align'];
            
            // Save the current position
            $x=$this->GetX();
            $y=$this->GetY();
            
            // set style
            $this->SetFont($fontName, $fontStyle, $fontSize);
            $color = explode(",", $current_col[$b]['fillcolor']);
            $this->SetFillColor($color[0], $color[1], $color[2]);
            $color = explode(",", $current_col[$b]['textcolor']);
            $this->SetTextColor($color[0], $color[1], $color[2]);            
            $color = explode(",", $current_col[$b]['drawcolor']);            
            $this->SetDrawColor($color[0], $color[1], $color[2]);
            $this->SetLineWidth($current_col[$b]['linewidth']);
            
            $color = explode(",", $current_col[$b]['fillcolor']);            
            $this->SetDrawColor($color[0], $color[1], $color[2]);
            
            
            // Draw Cell Background
            $this->Rect($x, $y, $w, $h, 'FD');
            
            $color = explode(",", $current_col[$b]['drawcolor']);            
            $this->SetDrawColor($color[0], $color[1], $color[2]);
            
            // Draw Cell Border
            if (substr_count($current_col[$b]['linearea'], "T") > 0)
            {
               $this->Line($x, $y, $x+$w, $y);
            }            
            
            if (substr_count($current_col[$b]['linearea'], "B") > 0)
            {
               $this->Line($x, $y+$h, $x+$w, $y+$h);
            }            
            
            if (substr_count($current_col[$b]['linearea'], "L") > 0)
            {
               $this->Line($x, $y, $x, $y+$h);
            }
                        
            if (substr_count($current_col[$b]['linearea'], "R") > 0)
            {
               $this->Line($x+$w, $y, $x+$w, $y+$h);
            }
            
            
            // Print the text
            $this->MultiCell($w, $current_col[$b]['height'], $current_col[$b]['text'], 0, $a, 0);
            
            // Put the position to the right of the cell
            $this->SetXY($x+$w, $y);         
         }
         
         // Go to the next line
         $this->Ln($h);          
      }                  
   }

   function CheckPageBreak($h=0, $y = null, $addpage = true) {
      if($this->GetY()+$h>$this->PageBreakTrigger)
         $this->AddPage($this->CurOrientation);
   }

   // Computes the number of lines a MultiCell of width w will take
   function NbLines($w, $txt) {
      $cw=&$this->CurrentFont['cw'];
      if($w==0)
         $w=$this->w-$this->rMargin-$this->x; 
      $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
      $s=str_replace("\r", '', $txt);
      $nb=strlen($s);
      if($nb>0 and $s[$nb-1]=="\n")
         $nb--;
      $sep=-1;
      $i=0;
      $j=0;
      $l=0;
      $nl=1;
      while($i<$nb)
      {
         $c=$s[$i];
         if($c=="\n")
         {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
         }
         if($c==' ')
            $sep=$i;
         $l+=$cw[$c];
         if($l>$wmax)
         {
            if($sep==-1)
            {
               if($i==$j)
                  $i++;
            }
            else
               $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
         }
         else
            $i++;
      }
      return $nl;
   }
   
   // -- Gestione dell'output HTML
   function WriteHTML($html) {
      // Parser HTML
      $html = $this->decode_utf8($html);
      $html = str_replace("\n",' ',$html);
      $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
      foreach($a as $i=>$e)
      {
         if($i%2==0) 
         {
               // Text
               if($this->HREF)
                  $this->PutLink($this->HREF,$e);
               else
                  $this->Write(5,$e);
         }
         else
         {
               // Tag
               if($e[0]=='/')
                  $this->CloseTag(strtoupper(substr($e,1)));
               else
               {
                  // Extract attributes
                  $a2 = explode(' ',$e);
                  $tag = strtoupper(array_shift($a2));
                  $attr = array();
                  foreach($a2 as $v)
                  {
                     if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                           $attr[strtoupper($a3[1])] = $a3[2];
                  }
                  $this->OpenTag($tag,$attr);
               }
         }
      }
   }

   function OpenTag($tag, $attr)
    {
        // Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

   function SetStyle($tag, $enable) {
      // Modify style and select corresponding font
      $this->$tag += ($enable ? 1 : -1);
      $style = '';
      foreach(array('B', 'I', 'U') as $s)
      {
         if($this->$s > 0)
               $style .= $s;
      }
      $this->SetFont('',$style);
   }

   function PutLink($URL, $txt) {
      // Put a hyperlink
      $this->SetTextColor(0,0,255);
      $this->SetStyle('U',true);
      $this->Write(5,$txt,$URL);
      $this->SetStyle('U',false);
      $this->SetTextColor(0);
   }

   function MultiCellHTML($w, $h, $html, $border=0, $align='J', $fill=false) {
      $this->Ln($h); // Add extra line height
      $x = $this->GetX();
      $y = $this->GetY();
      $this->SetXY($x, $y - $h); // Reset position
      $this->WriteHTML($html);
      $this->SetXY($x, $this->GetY() + $h); // Reset position
   }


}

