<?php

namespace App\Http\Controllers\Sempresas;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Eactividade;
use App\Models\Gender;
use App\Models\Municipio;
use App\Models\Regime;
use App\Models\Sempresa;
use Illuminate\Http\Request;

class SempresaController extends Controller
{
    public function apieEmpresas()
    {
        $query = Sempresa::query();
        $query->with('municipio');
        $query->with('regime');
        $query->with('eactividade');
        $query->with('person');
        //$query->select('*');
        $query->orderBy('razon_social', 'ASC');
        return datatables()
            ->eloquent($query)
            ->addColumn('municipio', function($sempresa){
                return $sempresa->municipio->mun_descripcion;
            })
            ->addColumn('regimen', function($sempresa){
                return $sempresa->regime->reg_descripcion;
            })
            ->addColumn('eactividad', function($sempresa){
                return $sempresa->eactividade->act_descripcion;
            })
            ->addColumn('representante', function($sempresa){
                return $sempresa->person->nombres.' '.$sempresa->person->paterno.' '.$sempresa->person->materno.' ('.$sempresa->person->nro_celular.')';
            })
            ->editColumn('ver', function($sempresa){
                return "<a href='". route("formularioMostrar", $sempresa->id)."' target='_blank'><i class='fa fa-eye'></i></a>";
            })
            ->rawColumns(['ver'])
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $d = Sempresa::with('municipio')
        //     ->with('regime')
        //     ->with('eactividade')
        //     ->with('person')
        //     ->get();
        // @dump($d);
        return view('sempresas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "jose";
        $municipios = Municipio::all()->pluck('mun_descripcion','id');
        $regimenes = Regime::all()->pluck('reg_descripcion','id');
        $eactividades = Eactividade::all()->pluck('act_descripcion','id');
        $departments = Department::get()->pluck('dep_descripcion', 'id');
        $genders = Gender::get()->pluck('gen_descripcion', 'id');

        return view('sempresas.create', compact('municipios','regimenes','eactividades','departments','departments', 'genders'));

        // return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $empresa = Sempresa::create($request->all());
        return view('sempresas.index');
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
