<?php

namespace App\Http\Controllers\Contratos;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ContratoController extends Controller
{

    public function apiContratos()
    {
        $query = Contrato::query()
            ->with('requerimiento')
            ->with('requerimiento.sempresa')
            ->with('formulario')
            ->with('formulario.person')
            ->with('formulario.person.department');
        $query->orderBy('id', 'DESC');
        return datatables()
            ->eloquent($query)
            ->addColumn('beneficiario', function($contrato){
                return $contrato->formulario->person->paterno.' '.$contrato->formulario->person->materno.' '.$contrato->formulario->person->nombres;
            })
            ->addColumn('ci', function($contrato){
                return $contrato->formulario->person->nro_documento.' '.$contrato->formulario->person->department->dep_codigo;
            })
            ->addColumn('empresa', function($contrato){
                return $contrato->requerimiento->sempresa->razon_social.' ('.$contrato->requerimiento->sempresa->emp_telefono.')';
            })
            ->addColumn('nit', function($contrato){
                return $contrato->requerimiento->sempresa->NIT;
            })
            ->addColumn('fech_i', function($contrato){
                return Carbon::parse($contrato->fecha_inicio)->format('d-m-Y');
            })
            ->addColumn('fech_f', function($contrato){
                return Carbon::parse($contrato->fecha_fin)->format('d-m-Y');
            })
            ->addColumn('action', function($contrato){
                $contrato_id = $contrato->id;
                return Blade::render('contratos.partials.acciones',compact('contrato_id'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('contratos.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contratos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            "form_id" => "required|unique:contratos",
            "fecha_inicio" => "required|date",
            "fecha_fin" =>"required|date"
        ]);

        $contrato = Contrato::create($request->all());

        return view('contratos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($request);
        $contrato = Contrato::where('id', $id)->delete();

        return view('contratos.index');
    }
}
