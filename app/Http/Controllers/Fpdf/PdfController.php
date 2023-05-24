<?php

namespace App\Http\Controllers\Fpdf;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\Lista;
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
    private $usuario;
    private $fecha_hora;

    function inicio(object $emp, object $req, string $fh, string $usua){
        $this->empresa = $emp;
        $this->requerimiento = $req;
        $this->usuario = $usua;
        $this->fecha_hora = $fh;
        //ucwords(strtolower($texto3));
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
        $this->SetFont('Arial','',7);
        $this->Cell($w2,5,$t2,1,0,'L');
    }

    function cabecera($w1,$txt1){
        $t1=utf8_decode ($txt1);
        $this->SetFillColor(230,230,230);
        $this->SetTextColor(0);
        $this->SetDrawColor(10,10,10);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',7);
        $this->Cell($w1,5,$t1,1,0,'L',true);
    }

    // Cabecera de página
    function Header()
    {
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
        $this->SetX((280-$w)/2);
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
        $this->celda(25,30,'MUNICIPIO',$this->empresa->municipio->mun_descripcion);
        $this->celda(25,107,'EMPRESA',$this->empresa->razon_social.', '.$this->empresa->emp_direccion.', ');
        $this->celda(10,25,'NIT',$this->empresa->NIT);
        $this->celda(18,20,'TELEFONO',$this->empresa->emp_telefono);
        $this->Ln();
        $this->celda(40,70,'REPRESENTANTE LEGAL',$this->empresa->person->paterno.' '.$this->empresa->person->materno.' '.$this->empresa->person->nombres.' ('.$this->empresa->person->nro_celular.')');
        $this->celda(30,65,'REQUERIMIENTO',$this->requerimiento->profession->pro_descripcion );
        $this->celda(17,13,'CANTIDAD ',$this->requerimiento->cantidad );
        $this->celda(15,10,'ID REQ.',$this->requerimiento->id );
        $this->Ln();
        $this->Ln(1);
        $this->cabecera(10,'ID FRM.');
        $this->cabecera(20,'CARNET');
        $this->cabecera(50,'NOMBRE COMPLETO');
        $this->cabecera(17,'SEXO');
        $this->cabecera(18,'FECH. NAC.');
        $this->cabecera(10,'EDAD');
        $this->cabecera(20,'CELULAR');
        $this->cabecera(30,'NIV. ACADÉMICO');
        $this->cabecera(30,'IDIOMAS');
        $this->cabecera(37,'PROFESIONES');
        $this->cabecera(18,'FECH. REG.');
        $this->Ln();
    }

    // Pie de página
    function Footer()
    {

        // Posición: a 1 cm del final
        $this->SetY(-10);
        // Arial italic 8
        $this->SetFont('Arial','',6);
        // Número de página
        //$hoy = time() - (6 * 60 * 60);
        // $hoy = time();
        // $f = date('d-m-Y H:i:s',$hoy);

        //$f = " 20-01-2019 11:53:32";
        $this->Cell(72,4,'Usuario: '.$this->usuario,0,0,'L');
        $this->Cell(116,4,'Fecha Impresion: '.$this->fecha_hora,0,0,'C');
        $this->Cell(72,4,'Pag. '.$this->PageNo().' de {nb}',0,0,'R');
    }
}

class PDF2 extends PDF_MC_Table // para imprimir los datos del formulario
{
    private $usuario;
    private $fecha_hora;

    function inicio( string $fh, string $usua){
        $this->usuario = $usua;
        $this->fecha_hora = $fh;
    }

    function mcelda($w1,$w2,$txt1,$txt2){
        $t1=utf8_decode ($txt1);
        $t2 = utf8_decode($txt2);
        $this->SetFillColor(230,230,230);
        $this->SetTextColor(0);
        $this->SetDrawColor(10,10,10);
        $this->SetLineWidth(.1);
        $this->SetFont('Arial','B',12);
        $this->Cell($w1,10,$t1,0,0,'L',false);
        $this->SetFont('Arial','',12);
        $this->MultiCell($w2,10,$t2.'kjhfd salsa dfh aslkdfj ñlsjdf ñlksjdf ñlkjF ÑLAKSDF LKad f',0,'L');
    }

    // Cabecera de página
    function Header()
    {

        $this->Image('images/escudo.png',10,5,20);
        $this->SetFont('Arial','',6);
        $this->Cell(17);
        $this->Cell(100,4, utf8_decode ('DIRECCION DE REACTIVACIÓN ECONÓMICA'),0,1,'L');
        $this->Cell(17);
        $this->Cell(100,4, utf8_decode ('GOBIERNO AUTÓNOMO DEPARTAMENTAL DE CHUQUISACA'),0,1,'L');
        $title = "FORMULARIO REGISTRADO";
        $this->SetFont('Arial','B',16);
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((216-$w)/2);
        $this->SetDrawColor(255,255,255);
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(0,0,0);
        $this->Cell($w,9,$title,1,1,'C',true);
    }

    // Pie de página
    function Footer()
    {

        $this->SetY(-10);
        $this->SetFont('Arial','',6);
        $this->Cell(40,4,'Usuario: '.$this->usuario,0,0,'L');
        $this->Cell(116,4,'Fecha Impresion: '.$this->fecha_hora,0,0,'C');
        $this->Cell(40,4,'Pag. '.$this->PageNo().' de {nb}',0,0,'R');
    }
}

class PdfController extends Controller
{
    protected $fpdf;
    protected $fpdf2;
    public function seleccionados(Request $request)
    {
        //dd($request->seleccionados);
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

        $hoy = time();
        $f = date('d-m-Y H:i:s',$hoy);

        $usr = ucwords(strtolower( auth()->user()->name ));

        // Imprimimos la lista
        $this->fpdf = new PDF('L','mm','Letter');
        $this->fpdf->inicio($sempresa, $requerimiento, $f, $usr);
        $this->fpdf->SetMargins(10,7,10);
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial','',7);
        $this->fpdf->SetWidths(array(10,20,50,17,18,10,20,30,30,37,18));
        if (!is_null($request->seleccionados)) {
            // Guardamos la lista

            $lista = new Lista();
            $lista->requerimiento_id = $request->requerimiento_id;
            $lista->usuario = $usr;
            $lista->fecha_hora = $f;
            $lista->ids_form = json_encode($request->seleccionados);
            $lista->save();

            //Imprimimos los seleccionados
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
        }
        else{
            $this->fpdf->SetFont('Arial', 'B', 20);
            $this->fpdf->Cell(195,20,"DEBE SELECCIONAR UN CANDIDATO",0,0,"C");
        }

        $this->fpdf->Output();

        exit;

    }

    public function lista($id)
    {
        $lista = Lista::find($id);

        $requerimiento = Requerimiento::where('id', $lista->requerimiento_id)
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

        $f = $lista->fecha_hora;
        $usr = $lista->usuario;
        $seleccionados = json_decode($lista->ids_form);

        $this->fpdf = new PDF('L','mm','Letter');
        $this->fpdf->inicio($sempresa, $requerimiento, $f, $usr);
        $this->fpdf->SetMargins(10,7,10);
        $this->fpdf->AliasNbPages();
        $this->fpdf->AddPage();
        $this->fpdf->SetFont('Arial','',7);
        $this->fpdf->SetWidths(array(10,20,50,17,18,10,20,30,30,37,18));

        foreach ($candidatos as $candidato) {
            if (in_array($candidato->forms->id, $seleccionados)) {
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

    public function printFormulario($id)
    {
        // return "ID ".$id;
        $person = Person::where('id', $id)
            ->with('department')->with('gender')
            ->with('forms')
            ->with('forms.record')
            ->with('forms.languages')
            ->with('forms.professions')
            ->first();
        //dd($person);
        if(!is_null($person)){
            $person->edad=Carbon::parse($person->fecha_nac)->age;
            // $f = Form::where('person_id', $person->id )->with('record')
            // ->with('languages')
            // ->with('professions')->first();

            //return view( 'personas.infoperson', compact('person', 'f') );
        }

        $hoy = time();
        $f = date('d-m-Y H:i:s',$hoy);
        $usr = ucwords(strtolower( auth()->user()->name ));

        $this->fpdf2 = new PDF2('P','mm','Letter');
        $this->fpdf2->inicio($f, $usr);
        $this->fpdf2->SetMargins(10,7,10);
        $this->fpdf2->AliasNbPages();
        $this->fpdf2->AddPage();
        $this->fpdf2->Ln();

        $nombrec = $person->paterno.' '.$person->materno.' '.$person->nombres;

        $this->fpdf2->mcelda(40,100,'NOMBRE',$nombrec);
        $this->fpdf2->mcelda(40,100,'NOMBRE',$nombrec);

        $this->fpdf2->Output();
        exit;
    }
}
