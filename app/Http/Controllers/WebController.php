<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Person;
use Carbon\Carbon;

class WebController extends Controller
{
    public function index()
    {
		return view('web.index');
    }

    public function store(Request $request)
    {
      //dd($request);
        $nro_documento = $request->nro_documento;
        $fecha_nac = $request->fecha_nac;
        $token = $request->token;
        $_token = $request->_token;
        $person = Person::where('nro_documento', $nro_documento )
            ->where('fecha_nac', $request->fecha_nac)
            ->with('department')->with('gender')
            ->with('forms')
            ->with('forms.record')
            ->with('forms.languages')
            ->with('forms.professions')
            ->first();
        //@dump($person->forms[0]->record->for_descripcion);
        //@dump($person);
          if(!is_null($person)){
            $person->edad=Carbon::parse($person->fecha_nac)->age;
            $f = Form::where('person_id', $person->id )
                ->with('record')
                ->with('languages')
                ->with('professions')->first();
            return view( 'personas.infoperson', compact('person', 'f') );
            }else{
              return redirect('/index');
            }
    }

    public function register(Request $request){
        $var = 'Dea registrado con exito'.' Correcto!';
        return response()->json([
          'status' => 'exito',
          'success' => true,
          'message' => $var
        ]);

      }

      public function informacion(){
        return "mostrar";
      }

      public function info(){
        return view('personas.info');
      }

      public function infoperson($id){

        $person = Person::where('id',$id)->first();
        return view('personas.infoperson', compact('person'));
      }

      public function cerrar(){

        Session::flush();
         return redirect()->route('index');

      }

}
