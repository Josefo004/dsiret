<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioStoreRequest;
use App\Models\Department;
use App\Models\Person;
use App\Models\Record;
use App\Models\Form;
use App\Models\Gender;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Profession;
use PhpParser\Node\Stmt\TryCatch;
use Carbon\Carbon;
use \stdClass;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persons = Person::with('forms')
            ->with('forms.languages')
            ->with('forms.professions')
            ->get();
        $records = Record::get()->pluck('for_descripcion','id');
        $languages = Language::get()->pluck('descripcion','id');
        $profesions = Profession::get()->pluck('pro_descripcion','id');
        $departments = Department::get()->pluck('dep_descripcion', 'id');
        $genders = Gender::get()->pluck('gen_descripcion', 'id');

        return view('personas.index', compact('records','languages','profesions','departments','genders'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormularioStoreRequest $request)//FormularioStoreRequest
    {
        //dd($request);
        //$cliente = [];
        $cliente['ip'] = $request->getClientIp(true);
        $cliente['agente'] = $request->userAgent();
        $info = json_encode($cliente);

        // $navegador = get_browser($request->userAgent());
        // dd($navegador);
        //dd($info);

        try {
            $person = person::create($request->all());
            
            $form = new Form();
            $form->person_id = $person->id;
            $form->record_id = $request->record_id;
            $form->cliente = $info;
            $form->save();
            
            $form->languages()->attach($request->language_id);
            $form->professions()->attach($request->profession_id);
            //dd($form);
            $person = Person::where('nro_documento', $request->nro_documento)
                //->where('fecha_nac', $request->fecha_nac)
                ->with('department')->with('gender')
                ->with('forms')
                ->with('forms.record')
                ->with('forms.languages')
                ->with('forms.professions')
                ->first();
            //dd($person);
            if(!is_null($person)){         
                $person->edad=Carbon::parse($person->fecha_nac)->age;
                //$id = $person->id;
                //$persona = Person::where('')->first();
                ///$request->session()->put([$person]);
                // $request->session()->regenerate();
                              
                //return redirect()->route('formulario.infoperson',['id'=>$id]);                
                
                //$ocupaciones = $person->forms->professions;
                $f = Form::where('person_id', $person->id )->with('record')
                ->with('languages')
                ->with('professions')->first();                
                


                return view( 'personas.infoperson', compact('person', 'f') );
                //return "Se registro";
            }else{
                //return redirect('/index');
                //return "no se registro";
            }

            //return view('personas.view', compact('person'));
        } catch (\Exception $e) {
            return view('errors.404');
        }


    }

    public function LogIn(Request $request){
        // $vv = $this->validarLG($request);
        // if (is_object($vv)) {
        //     return response()->json([
        //         "error" => $vv
        //     ], Response::HTTP_OK);
        // }
        // $persona = Person::where('nro_documento', $request->nro_documento)
        //     ->where('fecha_nac', $request->fecha_nac)
        //     ->first();
        // if (!is_null($persona)) {
        //     $persona->departamento;
        //     $persona->genero;
        // } else {
        //     return response()->json([
        //         "Error" => "Persona no encontrada"
        //     ], Response::HTTP_OK);
        // }
        // return response()->json([
        //     "data" => $persona
        // ], Response::HTTP_OK);
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