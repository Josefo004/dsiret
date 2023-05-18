<?php

namespace App\Http\Controllers\Contratos;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Form;
use Illuminate\Http\Request;

class ContratoController extends Controller
{

    public function apiContratos()
    {
        $query = Contrato::query()
            ->get();
        dd($query);

        // $query->with('department');
        // $query->with('gender');
        // $query->with('forms');
        // $query->orderBy('paterno', 'ASC');
        // $query->orderBy('materno', 'ASC');
        // return datatables()
        //     ->eloquent($query)
        //     ->addColumn('idf', function($person){
        //         return $person->forms->id;
        //     })
        //     ->addColumn('nombre_completo', function($person){
        //         return $person->paterno.' '.$person->materno.' '.$person->nombres;
        //     })
        //     ->addColumn('cedula', function($person){
        //         return $person->nro_documento.' '.$person->department->dep_codigo;
        //     })
        //     ->addColumn('sexo', function($person){
        //         return $person->gender->gen_descripcion;
        //     })
        //     ->editColumn('birth', function($person){
        //         return Carbon::parse($person->fecha_nac)->format('d-m-Y');
        //     })
        //     ->editColumn('edad', function($person){
        //         return Carbon::parse($person->fecha_nac)->age;
        //     })
        //     ->editColumn('regis', function($person){
        //         return Carbon::parse($person->created_at)->format('d-m-Y H:m');
        //     })
        //     ->addColumn('action', function($person){
        //         $person_id = $person->id;
        //         return Blade::render('formularios.partials.acciones',compact('person_id'));
        //     })
        //     // ->editColumn('ver', function($person){
        //     //     return "<a href='". route("formularioMostrar", $person->id)."'><i class='fa fa-eye'></i></a> | <a href='". route("formularioEditar", $person->id)."'><i class='fa fa-pen'></i></a>";
        //     // })
        //     ->rawColumns(['action'])
        //     ->toJson();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $f = Contrato::where('id','1')
            ->with('formulario')
            ->with('requerimiento')
            ->with('requerimiento.sempresa')
            ->first();
            //->get();
        @dump($f);

        $formulario1 = Form::where('id', $f->form_id)->get();
        @dump($formulario1);

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
