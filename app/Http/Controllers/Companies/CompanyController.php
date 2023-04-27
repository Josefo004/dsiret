<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function apiCompanies()
    {
        $query = Company::query();
        $query->with('actividadEco');
        @dump($query);
        // $query = Person::query();
        // $query->with('department');
        // $query->with('gender');
        // //$query->select('*');
        // $query->orderBy('paterno', 'ASC');
        // $query->orderBy('materno', 'ASC');
        // return datatables()
        //     ->eloquent($query)
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
        //     ->editColumn('ver', function($person){
        //         return "<a href='". route("formularioMostrar", $person->id)."' target='_blank'><i class='fa fa-eye'></i></a>";
        //     })
        //     ->rawColumns(['ver'])
        //     ->toJson();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cc = Company::where('municipality_id', 1 )
            ->with('actividadEco')
            ->get();
        dd($cc);
        //return view('companies.index');
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
