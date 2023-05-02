<?php

namespace App\Http\Controllers\Formularios;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Form;
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
        $query->with('department');
        $query->with('gender');
        $query->orderBy('paterno', 'ASC');
        $query->orderBy('materno', 'ASC');
        return datatables()
            ->eloquent($query)
            ->addColumn('nombre_completo', function($person){
                return $person->paterno.' '.$person->materno.' '.$person->nombres;
            })
            ->addColumn('cedula', function($person){
                return $person->nro_documento.' '.$person->department->dep_codigo;
            })
            ->addColumn('sexo', function($person){
                return $person->gender->gen_descripcion;
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
                return "<a href='". route("formularioMostrar", $person->id)."'><i class='fa fa-eye'></i></a>";
            })
            ->rawColumns(['ver'])
            ->toJson();
    }

    public function apiTrabajos()
    {
        $query = Person::query()
            ->with('department')
            ->with('gender')
            ->with('forms')
            ->with('forms.record')
            ->with('forms.languages')
            ->with('forms.professions');
        //$query->select('*');
        $query->orderBy('paterno', 'ASC');
        $query->orderBy('materno', 'ASC');
        return datatables()
            ->eloquent($query)
            ->addColumn('nombre_completo', function($person){
                return $person->paterno.' '.$person->materno.' '.$person->nombres;
            })
            ->addColumn('cedula', function($person){
                return $person->nro_documento.' '.$person->department->dep_codigo;
            })
            ->addColumn('sexo', function($person){
                return $person->gender->gen_descripcion;
            })
            ->addColumn('birth', function($person){
                return Carbon::parse($person->fecha_nac)->format('d-m-Y');
            })
            ->addColumn('edad', function($person){
                return Carbon::parse($person->fecha_nac)->age;
            })
            ->addColumn('formacion', function($person){
                return $person->forms->record->for_descripcion;
            })
            ->addColumn('idiomas',function($person){
                $re='';
                foreach($person->forms->languages as $lan){
                    $re.=$lan->descripcion.'<br>';
                }
                return $re;
            })
            ->addColumn('profesion', function($person){
                $re = '';
                foreach($person->forms->professions as $pro){
                    $re.=$pro->pro_descripcion.'<br>';
                }
                return $re;
            })
            ->addColumn('ver', function($person){
                return "<a href='". route("formularioMostrar", $person->id)."'><i class='fa fa-eye'></i></a>";
            })
            ->rawColumns(['ver','idiomas','profesion'])
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

    public function trabajos()
    {
        return view('formularios.trabajos');
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

            $f = Form::where('person_id', $person->id )->with('record')
            ->with('languages')
            ->with('professions')->first();

            return view( 'formularios.infoperson', compact('person', 'f') );
        }else{
            return "no se registro";
        }
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
