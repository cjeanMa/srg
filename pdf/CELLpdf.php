<?php
require('fpdf.php');

class CellPDF extends FPDF
{
function cabecera($posicion = 0)
    {
        $this->ln($posicion);
        $this->SetLineWidth(1);
        $this->SetFont('Arial','B',11);
        $this->image('img/logo.png', 20, $posicion + 4, 20, 20);
        $this->image('img/minedu.jpg', 175,$posicion + 8,20, 14);
        $this->Cell(190,4,utf8_decode("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO"),0,0,'C');
        $this->Ln(4);
        $this->Cell(190,4,"ILAVE ",0,0,'C');
        $this->ln(4);
        
        $this->SetFont('Arial','B',7);
        $this->Cell(190,4,"OFICINA DE SECRETARIA ACADEMICA",0,0,'C');
        $this->SetFont('Arial','B',6);
        $this->ln(2);
        $this->Cell(190,4,utf8_decode("Panamericana Sur 4.5 km. Chillacollo - Ilave"),0,0,'C');
        $this->ln(4);
        $this->Cell(190,1,"","B",0,"C");
        $this->Ln(4);
        $this->SetLineWidth(0.1);
    }
    function cabecera_medio($posicion = 0)
    {
        $this->ln($posicion);
        $this->SetLineWidth(1);
        $this->SetFont('Arial','B',11);
        $this->image('img/logo.png', 20, $posicion + 139, 20, 20);
        $this->image('img/minedu.jpg', 175,$posicion + 143,20, 14);
        $this->setXY(20,155);
        $this->Cell(170,4,utf8_decode("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO"),0,0,'C');
        $this->Ln(4);
        $this->Cell(170,4,"ILAVE ",0,0,'C');
        $this->ln(4);
        
        $this->SetFont('Arial','B',7);
        $this->Cell(170,4,"OFICINA DE SECRETARIA ACADEMICA",0,0,'C');
        $this->SetFont('Arial','B',6);
        $this->ln(2);
        $this->Cell(170,4,utf8_decode("Panamericana Sur 4.5 km. Chillacollo - Ilave"),0,0,'C');
        $this->ln(4);
        $this->Cell(170,1,"","B",0,"C");
        $this->Ln(4);
        $this->SetLineWidth(0.2);
    }

    function cabecera_horizontal($posicionX = 0, $posicionY = 0)
    {
        $this->SetLineWidth(0.5);
        $this->SetFont('Arial','B',9);
        $this->setXY($posicionX,$posicionY);
        $this->image('img/logo.png', $posicionX - 3, $posicionY-4, 15, 15);
        $this->image('img/minedu.jpg', $posicionX + 112, $posicionY+1, 13, 9);
        $this->setXY($posicionX,$posicionY);
        $this->Cell(125,3,utf8_decode("INSTITUTO DE EDUCACIÓN SUPERIOR TECNOLÓGICO PÚBLICO"),0,1,'C');
        $this->setXY($posicionX,$posicionY+=3);
        $this->Cell(125,3,"ILAVE",0,0,'C');
        $this->SetFont('Arial','B',6);
        $this->setXY($posicionX,$posicionY+=3);
        $this->Cell(125,3,"OFICINA DE SECRETARIA ACADEMICA",0,0,'C');
        $this->SetFont('Arial','B',5);
        $this->setXY($posicionX,$posicionY+=2);
        $this->Cell(125,3,utf8_decode("Panamericana Sur 4.5 km. Chillacollo - Ilave"),0,0,'C');
        $this->setXY($posicionX,$posicionY+=2);
        $this->Cell(125,1,"","B",0,"C");
        $this->SetLineWidth(0.2);
    }

    // funcion para dibujar un rectangulo con las esquinas boredadas
    function RoundedRect($x, $y, $w, $h, $r, $corners = '1234', $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));

        $xc = $x+$w-$r;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));
        if (strpos($corners, '2')===false)
            $this->_out(sprintf('%.2F %.2F l', ($x+$w)*$k,($hp-$y)*$k ));
        else
            $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);

        $xc = $x+$w-$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        if (strpos($corners, '3')===false)
            $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-($y+$h))*$k));
        else
            $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);

        $xc = $x+$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        if (strpos($corners, '4')===false)
            $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-($y+$h))*$k));
        else
            $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);

        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        if (strpos($corners, '1')===false)
        {
            $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$y)*$k ));
            $this->_out(sprintf('%.2F %.2F l',($x+$r)*$k,($hp-$y)*$k ));
        }
        else
            $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }

    // FUNCIONES PROPIAS DEL FPDF
function VCell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false)
{
    //Output a cell
    $k=$this->k;
    if($this->y+$h>$this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak())
    {
        //Automatic page break
        $x=$this->x;
        $ws=$this->ws;
        if($ws>0)
        {
            $this->ws=0;
            $this->_out('0 Tw');
        }
        $this->AddPage($this->CurOrientation,$this->CurPageSize);
        $this->x=$x;
        if($ws>0)
        {
            $this->ws=$ws;
            $this->_out(sprintf('%.3F Tw',$ws*$k));
        }
    }
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $s='';
// begin change Cell function 
    if($fill || $border>0)
    {
        if($fill)
            $op=($border>0) ? 'B' : 'f';
        else
            $op='S';
        if ($border>1) {
            $s=sprintf('q %.2F w %.2F %.2F %.2F %.2F re %s Q ',$border,
                        $this->x*$k,($this->h-$this->y)*$k,$w*$k,-$h*$k,$op);
        }
        else
            $s=sprintf('%.2F %.2F %.2F %.2F re %s ',$this->x*$k,($this->h-$this->y)*$k,$w*$k,-$h*$k,$op);
    }
    if(is_string($border))
    {
        $x=$this->x;
        $y=$this->y;
        if(is_int(strpos($border,'L')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,$x*$k,($this->h-($y+$h))*$k);
        else if(is_int(strpos($border,'l')))
            $s.=sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ',$x*$k,($this->h-$y)*$k,$x*$k,($this->h-($y+$h))*$k);
            
        if(is_int(strpos($border,'T')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-$y)*$k);
        else if(is_int(strpos($border,'t')))
            $s.=sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ',$x*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-$y)*$k);
        
        if(is_int(strpos($border,'R')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',($x+$w)*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        else if(is_int(strpos($border,'r')))
            $s.=sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ',($x+$w)*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        
        if(is_int(strpos($border,'B')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-($y+$h))*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        else if(is_int(strpos($border,'b')))
            $s.=sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ',$x*$k,($this->h-($y+$h))*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
    }
    if(trim($txt)!='')
    {
        $cr=substr_count($txt,"\n");
        if ($cr>0) { // Multi line
            $txts = explode("\n", $txt);
            $lines = count($txts);
            for($l=0;$l<$lines;$l++) {
                $txt=$txts[$l];
                $w_txt=$this->GetStringWidth($txt);
                if ($align=='U')
                    $dy=$this->cMargin+$w_txt;
                elseif($align=='D')
                    $dy=$h-$this->cMargin;
                else
                    $dy=($h+$w_txt)/2;
                $txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));
                if($this->ColorFlag)
                    $s.='q '.$this->TextColor.' ';
                $s.=sprintf('BT 0 1 -1 0 %.2F %.2F Tm (%s) Tj ET ',
                    ($this->x+.5*$w+(.7+$l-$lines/2)*$this->FontSize)*$k,
                    ($this->h-($this->y+$dy))*$k,$txt);
                if($this->ColorFlag)
                    $s.=' Q ';
            }
        }
        else { // Single line
            $w_txt=$this->GetStringWidth($txt);
            $Tz=100;
            if ($w_txt>$h-2*$this->cMargin) {
                $Tz=($h-2*$this->cMargin)/$w_txt*100;
                $w_txt=$h-2*$this->cMargin;
            }
            if ($align=='U')
                $dy=$this->cMargin+$w_txt;
            elseif($align=='D')
                $dy=$h-$this->cMargin;
            else
                $dy=($h+$w_txt)/2;
            $txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));
            if($this->ColorFlag)
                $s.='q '.$this->TextColor.' ';
            $s.=sprintf('q BT 0 1 -1 0 %.2F %.2F Tm %.2F Tz (%s) Tj ET Q ',
                        ($this->x+.5*$w+.3*$this->FontSize)*$k,
                        ($this->h-($this->y+$dy))*$k,$Tz,$txt);
            if($this->ColorFlag)
                $s.=' Q ';
        }
    }
// end change Cell function 
    if($s)
        $this->_out($s);
    $this->lasth=$h;
    if($ln>0)
    {
        //Go to next line
        $this->y+=$h;
        if($ln==1)
            $this->x=$this->lMargin;
    }
    else
        $this->x+=$w;
}

function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
{
    //Output a cell
    $k=$this->k;
    if($this->y+$h>$this->PageBreakTrigger && !$this->InHeader && !$this->InFooter && $this->AcceptPageBreak())
    {
        //Automatic page break
        $x=$this->x;
        $ws=$this->ws;
        if($ws>0)
        {
            $this->ws=0;
            $this->_out('0 Tw');
        }
        $this->AddPage($this->CurOrientation,$this->CurPageSize);
        $this->x=$x;
        if($ws>0)
        {
            $this->ws=$ws;
            $this->_out(sprintf('%.3F Tw',$ws*$k));
        }
    }
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $s='';
// begin change Cell function
    if($fill || $border>0)
    {
        if($fill)
            $op=($border>0) ? 'B' : 'f';
        else
            $op='S';
        if ($border>1) {
            $s=sprintf('q %.2F w %.2F %.2F %.2F %.2F re %s Q ',$border,
                $this->x*$k,($this->h-$this->y)*$k,$w*$k,-$h*$k,$op);
        }
        else
            $s=sprintf('%.2F %.2F %.2F %.2F re %s ',$this->x*$k,($this->h-$this->y)*$k,$w*$k,-$h*$k,$op);
    }
    if(is_string($border))
    {
        $x=$this->x;
        $y=$this->y;
        if(is_int(strpos($border,'L')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,$x*$k,($this->h-($y+$h))*$k);
        else if(is_int(strpos($border,'l')))
            $s.=sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ',$x*$k,($this->h-$y)*$k,$x*$k,($this->h-($y+$h))*$k);
            
        if(is_int(strpos($border,'T')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-$y)*$k);
        else if(is_int(strpos($border,'t')))
            $s.=sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ',$x*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-$y)*$k);
        
        if(is_int(strpos($border,'R')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',($x+$w)*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        else if(is_int(strpos($border,'r')))
            $s.=sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ',($x+$w)*$k,($this->h-$y)*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        
        if(is_int(strpos($border,'B')))
            $s.=sprintf('%.2F %.2F m %.2F %.2F l S ',$x*$k,($this->h-($y+$h))*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
        else if(is_int(strpos($border,'b')))
            $s.=sprintf('q 2 w %.2F %.2F m %.2F %.2F l S Q ',$x*$k,($this->h-($y+$h))*$k,($x+$w)*$k,($this->h-($y+$h))*$k);
    }
    if (trim($txt)!='') {
        $cr=substr_count($txt,"\n");
        if ($cr>0) { // Multi line
            $txts = explode("\n", $txt);
            $lines = count($txts);
            for($l=0;$l<$lines;$l++) {
                $txt=$txts[$l];
                $w_txt=$this->GetStringWidth($txt);
                if($align=='R')
                    $dx=$w-$w_txt-$this->cMargin;
                elseif($align=='C')
                    $dx=($w-$w_txt)/2;
                else
                    $dx=$this->cMargin;

                $txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));
                if($this->ColorFlag)
                    $s.='q '.$this->TextColor.' ';
                $s.=sprintf('BT %.2F %.2F Td (%s) Tj ET ',
                    ($this->x+$dx)*$k,
                    ($this->h-($this->y+.5*$h+(.7+$l-$lines/2)*$this->FontSize))*$k,
                    $txt);
                if($this->underline)
                    $s.=' '.$this->_dounderline($this->x+$dx,$this->y+.5*$h+.3*$this->FontSize,$txt);
                if($this->ColorFlag)
                    $s.=' Q ';
                if($link)
                    $this->Link($this->x+$dx,$this->y+.5*$h-.5*$this->FontSize,$w_txt,$this->FontSize,$link);
            }
        }
        else { // Single line
            $w_txt=$this->GetStringWidth($txt);
            $Tz=100;
            if ($w_txt>$w-2*$this->cMargin) { // Need compression
                $Tz=($w-2*$this->cMargin)/$w_txt*100;
                $w_txt=$w-2*$this->cMargin;
            }
            if($align=='R')
                $dx=$w-$w_txt-$this->cMargin;
            elseif($align=='C')
                $dx=($w-$w_txt)/2;
            else
                $dx=$this->cMargin;
            $txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));
            if($this->ColorFlag)
                $s.='q '.$this->TextColor.' ';
            $s.=sprintf('q BT %.2F %.2F Td %.2F Tz (%s) Tj ET Q ',
                        ($this->x+$dx)*$k,
                        ($this->h-($this->y+.5*$h+.3*$this->FontSize))*$k,
                        $Tz,$txt);
            if($this->underline)
                $s.=' '.$this->_dounderline($this->x+$dx,$this->y+.5*$h+.3*$this->FontSize,$txt);
            if($this->ColorFlag)
                $s.=' Q ';
            if($link)
                $this->Link($this->x+$dx,$this->y+.5*$h-.5*$this->FontSize,$w_txt,$this->FontSize,$link);
        }
    }
// end change Cell function
    if($s)
        $this->_out($s);
    $this->lasth=$h;
    if($ln>0)
    {
        //Go to next line
        $this->y+=$h;
        if($ln==1)
            $this->x=$this->lMargin;
    }
    else
        $this->x+=$w;
}
}
?>