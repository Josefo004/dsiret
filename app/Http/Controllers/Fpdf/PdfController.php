<?php

namespace App\Http\Controllers\Fpdf;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Requerimiento;
use App\Models\Sempresa;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class PDF extends Fpdf
{
    private $empresa;

    function inicio(object $emp){
        $this->empresa = $emp;
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

    // Cabecera de página
    function Header()
    {
        global $cas;
        // Logo
        $this->Image('images/escudo.png',10,5,20);
        // Arial bold 15
        $this->SetFont('Arial','',6);
        // Movernos a la derecha
        $this->Cell(17);
        $this->Cell(100,4, utf8_decode ('DIRECCION DE REACTIVACIÓN ECONÓMICA'),0,1,'L');
        $this->Cell(17);
        $this->Cell(100,4, utf8_decode ('GOBIERNO AUTÓNOMO DEPARTAMENTAL DE CHUQUISACA'),0,1,'L');

        // Salto de línea
        $title = "POSIBLES CANDIDATOS";
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
        // $this->cabecera($cas);
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
        $f = date('d-m-Y H:i:s',$hoy);

        //$f = " 20-01-2019 11:53:32";
        $this->Cell(40,4,'Usuario: '.$usuario,0,0,'L');
        $this->Cell(116,4,'Fecha Impresion: '.$f,0,0,'C');
        $this->Cell(40,4,'Pag. '.$this->PageNo().' de {nb}',0,0,'R');
    }
}

class PdfController extends Controller
{

    protected $fpdf;

    public function __construct()
    {
        // $this->jmvpdf = new selecionadosPDF('P','mm','Letter');
        // $this->jmvpdf->SetMargins(10,10,10);
        // $this->jmvpdf->AliasNbPages();
    }

    public function index()
    {
        $this->fpdf = new PDF('P','mm','Letter');
        $this->fpdf->SetMargins(10,7,10);
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->celda(40,60,'JOSE','MENDZA');
        $this->fpdf->Output();

        exit;
    }

    public function seleccionados(Request $request){

        // $this->jmvpdf->SetFont('Arial', 'B', 15);
        // $this->jmvpdf->AddPage("P", "letter");
        // // $this->fpdf->Text(10, 10, "Hello World!");

        // $this->jmvpdf->Output();

        // exit;

        //$permas = DB::table('persons')->select('id')->where('gender_id', 1)->get();
        @dump($request->seleccionados);

        //dd($request);
        $requerimiento = Requerimiento::where('id', $request->requerimiento_id)
            ->with('profession')
            ->first();
        @dump($requerimiento);

        $sempresa = Sempresa::where('id', $requerimiento->sempresa_id)
            ->with('municipio')
            ->with('regime')
            ->with('eactividade')
            ->first();
        @dump($sempresa);

        $candidatos = Person::whereRelation('forms.professions', 'profession_id', '=', $requerimiento->profession_id)
            ->with('department')
            ->with('gender')
            ->with('forms')
            ->with('forms.record')
            ->with('forms.languages')
            ->with('forms.professions')
            ->get();
        dd($candidatos);
        //$candidatos->edad=Carbon::parse($candidatos->fecha_nac)->age;

        return view( 'sempresas.resultadoSeaarch', compact('requerimiento','sempresa','candidatos') );


    }
}
