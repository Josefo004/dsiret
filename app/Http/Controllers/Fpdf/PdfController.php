<?php

namespace App\Http\Controllers\Fpdf;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Requerimiento;
use App\Models\Sempresa;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new selecionadosPDF('P','mm','Letter');
        $this->fpdf->SetMargins(10,10,10);
        $this->fpdf->AliasNbPages();
    }

    public function index()
    {

        // $this->fpdf->Text(10, 10, "Hello World!");
        // $this->fpdf->celda(40,60,'text1','text2');

        $this->fpdf->Output();

        exit;
    }

    public function seleccionados(Request $request){

        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->AddPage("P", "letter");
        // $this->fpdf->Text(10, 10, "Hello World!");

        $this->fpdf->Output();

        exit;

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
