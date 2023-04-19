<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Support\Str;
use App\Models\Empresa;
use Toastr;
use Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = Empresa::find(1);        
		return view('empresas.index',compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = Empresa::find(1);
		$empresa->fill($request->all());
		$empresa->save();

		Toastr::info('Datos de la empresa fueron actualizados correctamente','Actualizar!');
		return back();
    }
   
	public function upload(Request $request, Empresa $empresa)
	{
		$file = $request->file('file');
		$carpeta = 'empresa';
        $tipo = $file->guessExtension();        
        $nombre = Str::slug($empresa->nombre);        
		Storage::disk('imagen')->put($carpeta.'/'.$nombre.'.'.$tipo,\File::get($file));
        $empresa->logo = $nombre.'.'.$tipo;        
		$empresa->save();
		Toastr::info('El logo de la empresa fue actualizado correctamente','Logo!');
		return response()->json();
    }
    
}
