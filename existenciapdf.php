<?php

require('pdf/fpdf.php');
require 'database.php';
include_once('dbconect.php');

class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

//==========================================================================                Configuracion de tablas
function Row($data,$alinea)
{
    //Calculate the height of the row
    $nb=0;
    for($i=1;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=6*$nb;//alto de la fila
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    $fill = true;
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        if($i<=0)// verifico menor que 5 para alinear las columnas
         $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        else // verifico si es encabezado para alinearlo a la izquierda
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border

        $this->Rect($x,$y,$w,$h);
        $this->MultiCell($w,6,$data[$i],8,$a,'true'); //aqui modifique ante 5,1
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);

    }
    //Go to the next line
    $this->Ln($h);
}

//==========================================================================                Configuracion de tablas

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
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

//==========================================================================             Encabezados

function Header()
{

$this->Image('img/logo.jpg',9,2,30,30);
//$mysqli -> set_charset("utf8");

    $this->SetFont('Arial','B',10);
    $this->Cell(0,6,utf8_decode("MATERIALES DE CONSTRUCCIÓN DE IXTACOMITÁN CHIAPAS"),0,1,'C');
    $this->SetFont('Arial','',10);
    $this->Cell(0,6,utf8_decode("CALLE SIEMPRE VIVA ESQUINA LAS FLORES"),0,1,'C');
    $this->Ln(-1);
    $this->Cell(0,6,utf8_decode("IXTACOMITÁN, CHIAPAS."),0,1,'C');
    $this->Ln(-1);
    $this->SetFont('Arial','B',10);
    $this->Cell(0,6,utf8_decode("Reporte General de la Existencia de Productos"),0,1,'C');

}

//==========================================================================             Pie de la pagina

function Footer()
{



}
//==========================================================================      Cuerpo del programas
}


    $pdf=new PDF('P','mm','Letter'); //P es verical y L horizontal
    $pdf->Open();
    $pdf->AddPage();
    $pdf->SetMargins(10,10,10);
	$pdf->AliasNbPages();

            $database = new Connection();
            $db = $database->open();

    $sql = 'SELECT * FROM products INNER JOIN depa on depa.id = products.iddepa WHERE cantidad > 0';

	//$result=mysqli_query($conexion,$sql);

     $pdf->Ln(5);

     $pdf->SetWidths(array(18,30,55,20,20,55));
     $pdf->SetFont('Arial','B',10,'L');
     $pdf->SetFillColor(1,113,185);//color blanco rgb
     $pdf->SetTextColor(255);
     $pdf->SetLineWidth(.3);
    for($i=0;$i<1;$i++)
            {
                $pdf->Row(array('Codido','Departamento',utf8_decode('Nombre'),'Existencia',utf8_decode('Precio'),'Detalle'),'L');
            }
    //***************-------------------------encabezados de las tablas
     $pdf->SetWidths(array(18,30,55,20,20,55));
    $pdf->SetFont('Arial','',10,'L');
    $pdf->SetFillColor(255,255,255);//color blanco rgb
    $pdf->SetTextColor(0);

    $pdf->SetFont('Arial','',11);

   foreach ($db->query($sql) as $row) {
    $pdf->Row(array(utf8_decode($row['codigo']),utf8_decode($row['nombre']),$row['name'],$row['cantidad'],$row['precio'],$row['detalles']),'L');
        }
 
  //$pdf->Ln(10);

 // $pdf->SetXY(80,240);
 // $pdf->Cell(80,10,'____________________________',0,0,'L');
 // $pdf->SetXY(100,250);
 // $pdf->Cell(187,10,'Administrador',0,0,'L');

      $pdf->Ln(-15);

$pdf->Output();
?>