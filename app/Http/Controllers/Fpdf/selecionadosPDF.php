<?php

namespace App\Http\Controllers\Fpdf;

use Codedge\Fpdf\Fpdf\Fpdf;

class selecionadosPDF extends Fpdf
{
    function celdam($w1,$w2,$txt1,$txt2){
        $t1=utf8_decode ($txt1); $t2 = utf8_decode($txt2);
        $this->SetFillColor(10,10,10);
        $this->SetTextColor(255);
        $this->SetDrawColor(10,10,10);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',8);
        $this->Cell($w1,6,$t1,1,1,'L',true);
        $this->SetTextColor(0);
        $this->SetFont('Arial','',8);
        $this->MultiCell($w2,5,$t2,1,'J');
        $this->Ln(3);
    }
    function titulo($txt){
        $t1=utf8_decode($txt);
        $this->SetFillColor(10,10,10);
        $this->SetTextColor(255);
        $this->SetDrawColor(10,10,10);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',8);
        $this->Cell(196,6,$t1,1,1,'L',true);
    }

    function celda($w1,$w2,$txt1,$txt2){
        $t1=utf8_decode ($txt1);
        $t2 = utf8_decode($txt2);
        $this->SetFillColor(230,230,230);
        $this->SetTextColor(0);
        $this->SetDrawColor(10,10,10);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',9);
        $this->Cell($w1,6,$t1,1,0,'L',true);
        $this->SetFont('Arial','',7);
        $this->Cell($w2,6,$t2,1,0,'L');
    }

    function cabecera($ca){
        $this->celda(30,100,'Tipo Formulario',$ca['tipo']);
        $this->celda(30,36,'Fecha de Registro',$ca['fecha_re']);
        $this->Ln(8);
    }

    // Cabecera de página
    function Header()
    {
        // global $cas;
        // Logo
        $this->Image('images/logo1_1.png',10,5,25);
        // Arial bold 15
        $this->SetFont('Arial','',6);
        // Movernos a la derecha
        $this->Cell(25);
        $this->Cell(100,4, utf8_decode ('DIRECCIÓN DE REACTIVACIÓN ECONÓMICA'),0,1,'L');
        $this->Cell(25);
        $this->Cell(100,4,'GOBIERNO AUTONOMO DEPARTAMENTAL DE CHUQUISACA',0,1,'L');

        // Salto de línea
        $title = "SELECCIONADOS ";
        $this->SetFont('Arial','B',14);
        // Calculamos ancho y posición del título.
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((216-$w)/2);
        // Colores de los bordes, fondo y texto
        $this->SetDrawColor(255,255,255);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(0,0,0);
        // Ancho del borde (1 mm)
        //$this->SetLineWidth(0);
        // Título
        $this->Cell($w,9,$title,1,1,'C',true);
        $this->Ln(3);
        //$this->cabecera($cas);
        // Salto de línea
    }

    // Pie de página
    function Footer()
    {
        global $usuario;
        // Posición: a 1 cm del final
        $this->SetY(-10);
        // Arial italic 8
        $this->SetFont('Arial','',6);
        // Número de página
        //$hoy = time() - (6 * 60 * 60);
        $hoy = time();
        $f = date('d-m-Y   H:i:s',$hoy);
        //$f = getAhoraBolivia();
        //$f = " 20-01-2019 11:53:32";
        $this->Cell(40,4,'Usuario: '.$usuario,0,0,'L');
        $this->Cell(116,4,'Fecha Impresion: '.$f,0,0,'C');
        $this->Cell(40,4,'Pag. '.$this->PageNo().' de {nb}',0,0,'R');
    }
}
