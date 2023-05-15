<?php

namespace App\Http\Controllers\Formularios;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormulariosEditRequest;
use App\Models\Department;
use App\Models\Form;
use App\Models\Gender;
use App\Models\Language;
use App\Models\Person;
use App\Models\Profession;
use App\Models\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function apiFormularios()
    {
        $query = Person::query();
        $query->with('department');
        $query->with('gender');
        $query->with('forms');
        $query->orderBy('paterno', 'ASC');
        $query->orderBy('materno', 'ASC');
        return datatables()
            ->eloquent($query)
            ->addColumn('idf', function($person){
                return $person->forms->id;
            })
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
                return "<a href='". route("formularioMostrar", $person->id)."'><i class='fa fa-eye'></i></a> | <a href='". route("formularioEditar", $person->id)."'><i class='fa fa-pen'></i></a>";
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
            ->addColumn('idf', function($person){
                return $person->forms->id;
            })
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
        // return "ID ".$id;
        $records = Record::get()->pluck('for_descripcion','id');
        $languages = Language::get()->pluck('descripcion','id');
        $profesions = Profession::get()->pluck('pro_descripcion','id');
        $departments = Department::get()->pluck('dep_descripcion', 'id');
        $genders = Gender::get()->pluck('gen_descripcion', 'id');

        $person = Person::where('id', $id)
            ->with('department')->with('gender')
            ->with('forms')
            ->with('forms.record')
            ->with('forms.languages')
            ->with('forms.professions')
            ->first();
        $selectlanguages = $person->forms->languages->pluck('id');
        $selectprofessions = $person->forms->professions->pluck('id');
        // @dump($ff);
        // @dump($f);

        return view( 'formularios.editar', compact('person','selectlanguages','selectprofessions','records','languages','profesions','departments','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(FormulariosEditRequest $request)
    {
        $id = $request->id;
        //@dump($request);
        $persona = Person::find($id);
        //dd($persona);
        $persona->department_id = $request->department_id;
        $persona->gender_id = $request->gender_id;
        $persona->nombres = strtoupper($request->nombres);
        $persona->paterno = strtoupper($request->paterno);
        $persona->materno = strtoupper($request->materno);
        $persona->fecha_nac = $request->fecha_nac;
        $persona->nro_celular = $request->nro_celular;
        $persona->direccion = strtoupper($request->direccion);
        $persona->email = $request->email;
        $persona->save();

        $form = Form::where('person_id', $id)->first();
        $form->record_id = $request->record_id;
        $form->save();

        $form->languages()->sync($request->language_id);
        $form->professions()->sync($request->profesion_id);

        return redirect()->route('formularioMostrar', ['id' => $id]);

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
