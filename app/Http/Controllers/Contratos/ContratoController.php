<?php

namespace App\Http\Controllers\Contratos;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Form;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

            // ->addColumn('cedula', function($person){
            //     return $person->nro_documento.' '.$person->department->dep_codigo;
            // })
            // ->addColumn('sexo', function($person){
            //     return $person->gender->gen_descripcion;
            // })
            // ->editColumn('birth', function($person){
            //     return Carbon::parse($person->fecha_nac)->format('d-m-Y');
            // })
            // ->editColumn('edad', function($person){
            //     return Carbon::parse($person->fecha_nac)->age;
            // })
            // ->editColumn('regis', function($person){
            //     return Carbon::parse($person->created_at)->format('d-m-Y H:m');
            // })
            // ->addColumn('action', function($person){
            //     $person_id = $person->id;
            //     return Blade::render('formularios.partials.acciones',compact('person_id'));
            // })
            // ->editColumn('ver', function($person){
            //     return "<a href='". route("formularioMostrar", $person->id)."'><i class='fa fa-eye'></i></a> | <a href='". route("formularioEditar", $person->id)."'><i class='fa fa-pen'></i></a>";
            // })
            //->rawColumns(['action'])
            ->toJson();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $f = Contrato::where('id','1')
        //     ->with('formulario')
        //     ->with('formulario.person')
        //     ->with('requerimiento')
        //     ->with('requerimiento.sempresa')
        //     ->first();
        //     //->get();
        // @dump($f);

        // $formulario1 = Form::where('id', $f->form_id)->get();
        // @dump($formulario1);

        return view('contratos.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
