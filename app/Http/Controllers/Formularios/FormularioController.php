<?php

namespace App\Http\Controllers\Formularios;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Gender;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormularioController extends Controller
{
    public function apiFormularios()
    {
        $query = Person::query();
        //$query = DB::table('persons')->get();
        //$query->select(['id','nro_documento', 'department_id', 'paterno','materno','nombres']);
        $query->select('*', DB::raw("CONCAT_WS('',paterno,' ',materno,' ',nombres) AS nombre_completo"));
        $query->orderBy('paterno');
        return datatables()
            ->eloquent($query)
            ->editColumn('exp', function($person){
                $dd = Department::find($person->department_id);
                return $dd->dep_codigo;
            })
            ->editColumn('sexo', function($person){
                $dg = Gender::find($person->gender_id);
                return $dg->gen_descripcion;
            })
            ->editColumn('birth', function($person){
                return Carbon::parse($person->fecha_nac)->format('d-m-Y');
            })
            ->editColumn('edad', function($person){
                return Carbon::parse($person->fecha_nac)->age;
            })
            ->editColumn('regis', function($person){
                return Carbon::parse($person->created_at)->format('d-m-Y H:m');
            })
            ->editColumn('ver', function($person){
                return '<i class="fa-solid fa-eye">{{ $person->id }}</i>';
            })
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('formularios.index');
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
