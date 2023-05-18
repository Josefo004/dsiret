<?php

namespace App\Http\Controllers\Sempresas;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequerimientoStoreRequest;
use App\Http\Requests\SempresaStoreRequest;
use App\Models\Department;
use App\Models\Eactividade;
use App\Models\Gender;
use App\Models\Municipio;
use App\Models\Person;
use App\Models\Profession;
use App\Models\Regime;
use App\Models\Requerimiento;
use App\Models\Sempresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class SempresaController extends Controller
{
    public function apiEmpresas()
    {
        $query = Sempresa::query();
        $query->with('municipio');
        $query->with('regime');
        $query->with('eactividade');
        $query->with('person');
        //$query->select('*');
        $query->orderBy('id', 'DESC');
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
            ->addColumn('action', function($sempresa){
                $empresa_id = $sempresa->id;
                return Blade::render('sempresas.partials.acciones',compact('empresa_id'));
            })
            // ->editColumn('ver', function($sempresa){
            //     return "<a href='". route("sempresasMostrar", $sempresa->id)."'><i class='fa fa-eye'></i> </a> | <a href='". route("sempresasRequerimiento", $sempresa->id)."'><i class='fa fa-briefcase'></i></a> | <a href='". route("sempresasEditar", $sempresa->id)."'><i class='fa fa-pen'></i></a>";
            // })
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
        //return "jose"
        $municipios = Municipio::all()->pluck('mun_descripcion','id');
        $regimenes = Regime::all()->pluck('reg_descripcion','id');
        $eactividades = Eactividade::all()->pluck('act_descripcion','id');
        $departments = Department::get()->pluck('dep_descripcion', 'id');
        $genders = Gender::get()->pluck('gen_descripcion', 'id');
        $municipios->prepend('','0');
        $regimenes->prepend('','0');
        $eactividades->prepend('','0');
        $departments->prepend('','0');
        $genders->prepend('','0');
        //@dump($municipios);

        return view('sempresas.create', compact('municipios','regimenes','eactividades','departments', 'genders'));

        // return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SempresaStoreRequest $request)
    {
        //@dump($request);
        //dd($request);
        $responsable = new Person();
        $responsable->nro_documento = strtoupper($request->nro_documento);
        $responsable->department_id = $request->department_id;
        $responsable->gender_id = $request->gender_id;
        $responsable->nro_celular = $request->nro_celular;
        $responsable->nombres = strtoupper($request->nombres);
        $responsable->paterno = strtoupper($request->paterno);
        $responsable->materno = strtoupper($request->materno);
        $responsable->save();

        $empresa = new Sempresa();
        $empresa->municipio_id = $request->municipio_id;
        $empresa->eactividade_id = $request->eactividade_id;
        $empresa->regime_id = $request->regime_id;
        $empresa->person_id = $responsable->id;
        $empresa->razon_social = strtoupper($request->razon_social);
        $empresa->NIT = $request->NIT;
        //$empresa->nro_roe = $request->nro_roe;
        $empresa->emp_direccion = strtoupper($request->emp_direccion);
        $empresa->emp_telefono = $request->emp_telefono;
        $empresa->save();

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
        $empresa = Sempresa::where('id', $id)
            ->with('municipio')
            ->with('regime')
            ->with('eactividade')
            ->with('person')
            ->with('person.department')
            ->with('person.gender')
            ->first();
        return view( 'sempresas.info', compact('empresa') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function requ($id)
    {
        $empresa = Sempresa::where('id', $id)
            ->with('municipio')
            ->with('regime')
            ->with('eactividade')
            ->with('person')
            ->first();

        $requerimientos = Requerimiento::where('sempresa_id', $empresa->id )
            ->with('profession')
            ->with('listas')
            ->get();
        //dd($requerimientos);

        $profesions = Profession::get()->pluck('pro_descripcion','id');
        $profesions->prepend('','0');
        return view( 'sempresas.requerimiento', compact('empresa','requerimientos','profesions') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function requStore(RequerimientoStoreRequest $request)
    {
        //dd($request);
        $requerimiento = Requerimiento::create($request->all());

        return redirect()->route('sempresasRequerimiento', ['id' => $requerimiento->sempresa_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function requDelete($id)
    {
        //dd($request);
        $requerimiento = Requerimiento::where('id', $id)->first();
        $sempresa_id = $requerimiento->sempresa_id;
        $requerimiento = Requerimiento::where('id', $id)->delete();
        //dd($sempresa_id);

        return redirect()->route('sempresasRequerimiento', ['id' => $sempresa_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function requSearch($id)
    {
        //dd($request);
        $requerimiento = Requerimiento::where('id', $id)
            ->with('profession')
            ->first();

        $sempresa = Sempresa::where('id', $requerimiento->sempresa_id)
            ->with('municipio')
            ->with('regime')
            ->with('eactividade')
            ->first();

        $candidatos = Person::whereRelation('forms.professions', 'profession_id', '=', $requerimiento->profession_id)
            ->with('department')
            ->with('gender')
            ->with('forms')
            ->with('forms.record')
            ->with('forms.languages')
            ->with('forms.professions')
            ->get();
        //$candidatos->edad=Carbon::parse($candidatos->fecha_nac)->age;

        return view( 'sempresas.resultadoSeaarch', compact('requerimiento','sempresa','candidatos') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipios = Municipio::all()->pluck('mun_descripcion','id');
        $regimenes = Regime::all()->pluck('reg_descripcion','id');
        $eactividades = Eactividade::all()->pluck('act_descripcion','id');
        $departments = Department::get()->pluck('dep_descripcion', 'id');
        $genders = Gender::get()->pluck('gen_descripcion', 'id');

        $empresa = Sempresa::where('id', $id)
            ->with('municipio')
            ->with('regime')
            ->with('eactividade')
            ->with('person')
            ->with('person.department')
            ->with('person.gender')
            ->first();

        return view('sempresas.edit', compact('empresa', 'municipios', 'regimenes', 'eactividades', 'departments', 'genders'));

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
        //dd($request);
        $persona = Person::find($request->person_id);

        $persona->department_id = $request->department_id;
        $persona->gender_id = $request->department_id;
        $persona->nro_celular = $request->nro_celular;
        $persona->nombres = strtoupper($request->nombres);
        $persona->paterno = strtoupper($request->paterno);
        $persona->materno = strtoupper($request->materno);
        $persona->save();

        $empresa = Sempresa::find($request->id);
        $empresa->municipio_id = $request->municipio_id;
        $empresa->eactividade_id = $request->eactividade_id;
        $empresa->regime_id = $request->regime_id;
        $empresa->razon_social = strtoupper($request->razon_social);
        $empresa->emp_direccion = strtoupper($request->emp_direccion);
        $empresa->emp_telefono = strtoupper($request->emp_telefono);
        $empresa->save();

        return redirect()->route('sempresasMostrar', ['id' => $request->id]);

    }
}
