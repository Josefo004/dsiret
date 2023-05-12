<?php

namespace App\Http\Controllers\Fpdf;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Requerimiento;
use App\Models\Sempresa;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PDF_MC_Table extends Fpdf
{
    protected $widths;
    protected $aligns;

    function SetWidths($w)
    {
        // Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        // Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data)
    {
        // Calculate the height of the row
        $nb = 0;
        for($i=0;$i<count($data);$i++)
            $nb = max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h = 4*$nb;
        // Issue a page break first if needed
        $this->CheckPageBreak($h);
        // Draw the cells of the row
        for($i=0;$i<count($data);$i++)
        {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            // Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            // Draw the border
            $this->Rect($x,$y,$w,$h);
            // Print the text
            $this->MultiCell($w,3,utf8_decode($data[$i]),0,$a);
            // Put the position to the right of the cell
            $this->SetXY($x+$w,$y);
        }
        // Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        // If the height h would cause an overflow, add a new page immediately
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        // Compute the number of lines a MultiCell of width w will take
        if(!isset($this->CurrentFont))
            $this->Error('No font has been set');
        $cw = $this->CurrentFont['cw'];
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
        $s = str_replace("\r",'',(string)$txt);
        $nb = strlen($s);
        if($nb>0 && $s[$nb-1]=="\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while($i<$nb)
        {
            $c = $s[$i];
            if($c=="\n")
            {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep = $i;
            $l += $cw[$c];
            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i = $sep+1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}

class PDF extends PDF_MC_Table
{
    private $empresa;
    private $requerimiento;

    function inicio(object $emp, object $req){
        $this->empresa = $emp;
        $this->requerimiento = $req;
    }

    function celda($w1,$w2,$txt1,$txt2){
        $t1=utf8_decode ($txt1);
        $t2 = utf8_decode($txt2);
        $this->SetFillColor(230,230,230);
        $this->SetTextColor(0);
        $this->SetDrawColor(10,10,10);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',7);
        $this->Cell($w1,5,$t1,1,0,'L',true);
        $this->SetFont('Arial','',6);
        $this->Cell($w2,5,$t2,1,0,'L');
    }

    function cabecera($w1,$txt1){
        $t1=utf8_decode ($txt1);
        $this->SetFillColor(230,230,230);
        $this->SetTextColor(0);
        $this->SetDrawColor(10,10,10);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',5);
        $this->Cell($w1,5,$t1,1,0,'L',true);
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
        $this->celda(25,90,'EMPRESA',$this->empresa->municipio->mun_descripcion.', '.$this->empresa->emp_direccion.', '.$this->empresa->razon_social);
        $this->celda(30,50,'ID REQUERIMIENTO ',$this->requerimiento->id);
        $this->Ln();
        $this->celda(25,90,'NIT / TELEFONO',$this->empresa->NIT.', '.$this->empresa->emp_telefono);
        $this->celda(30,50,'REQUERIMIENTO ',$this->requerimiento->profession->pro_descripcion );
        $this->Ln();
        $this->celda(25,90,'RESPONSABLE',$this->empresa->person->paterno.' '.$this->empresa->person->materno.' '.$this->empresa->person->nombres.' ('.$this->empresa->person->nro_celular.')');
        $this->celda(30,50,'CANTIDAD ',$this->requerimiento->cantidad );
        $this->Ln();
        $this->Ln(1);
        $this->cabecera(8,'ID FM.');
        $this->cabecera(15,'CARNET');
        $this->cabecera(37,'NOMBRE COMPLETO');
        $this->cabecera(15,'SEXO');
        $this->cabecera(13,'FECH. NAC.');
        $this->cabecera(7,'EDAD');
        $this->cabecera(15,'CELULAR');
        $this->cabecera(20,'NIV. ACADÉMICO');
        $this->cabecera(25,'IDIOMAS');
        $this->cabecera(25,'PROFESIONES');
        $this->cabecera(15,'FECH. REG.');
        $this->Ln();
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
        $this->Cell(40,4,$this->empresa->razon_social,0,0,'L');
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
        $this->fpdf->Output();

        exit;
    }

    public function seleccionados(Request $request){

        //@dump($request->seleccionados);

        //dd($request);
        $requerimiento = Requerimiento::where('id', $request->requerimiento_id)
            ->with('profession')
            ->first();

        $sempresa = Sempresa::where('id', $requerimiento->sempresa_id)
            ->with('municipio')
            ->with('regime')
            ->with('eactividade')
            ->first();

        $candidatos = Person::whereRelation('forms.professions', 'profession_id', '=', $requerimiento->profession_id)
            ->with('department')
            ->with('gender')
            ->with('forms')
            ->with('forms.record')
            ->with('forms.languages')
            ->with('forms.professions')
            ->get();

        //return view( 'sempresas.resultadoSeaarch', compact('requerimiento','sempresa','candidatos') );

        $this->fpdf = new PDF('P','mm','Letter');
        $this->fpdf->inicio($sempresa, $requerimiento);
        $this->fpdf->SetMargins(10,7,10);
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial','',6);
        $this->fpdf->SetWidths(array(8,15,37,15,13,7,15,20,25,25,15));
        foreach ($candidatos as $candidato) {
            if (in_array($candidato->forms->id, $request->seleccionados)) {
                $idfm = $candidato->forms->id;
                $ci = $candidato->nro_documento.' '.$candidato->department->dep_codigo;
                $noc = $candidato->paterno.' '.$candidato->materno.' '.$candidato->nombres;
                $sex = $candidato->gender->gen_descripcion;
                $fen = date('d-m-Y', strtotime($candidato->fecha_nac));
                $eda = Carbon::parse($candidato->fecha_nac)->age;
                $cel = $candidato->nro_celular;
                $nac = $candidato->forms->record->for_descripcion;
                $idi = '';
                foreach ($candidato->forms->languages as $idioma) {$idi.=$idioma->descripcion."\n";}
                $prf = '';
                foreach ($candidato->forms->professions as $profesion) {$prf.=$profesion->pro_descripcion."\n";}
                $frg = date('d-m-Y H:i', strtotime($candidato->forms->created_at));
                $this->fpdf->Row(array($idfm,$ci,$noc,$sex,$fen,$eda,$cel,$nac,$idi,$prf,$frg));
            }
        }
        $this->fpdf->Output();

        exit;

    }
}
