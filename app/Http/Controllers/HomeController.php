<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Auth;
use Toastr;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        if(Auth::user()->estado=='D'){            
            return view('desactivado');
        }
        return view('home');
    }

    /**
     * Funcion de prueba 
    */
    public function crearpdf(){
        $pdf = \PDF::loadView('welcome');        
        return $pdf->stream('demo pdf');
    }

    /**
     * Funcion temporal
    */
    public function formatofechas(){
        \Date::setLocale('es');
        $date = Date::now()->format('l j F Y H:i:s');        
        return $date;
    }

    /**
     * Funcion de prueba 
    */
    public function exportarexcel(){        
        return Excel::download(new UsersExport, 'usuarios.xlsx');
    }

    /**
     * Funcion de prueba 
    */
    public function registrar_actividad(){

        $user = Auth::user();

        activity('gadch')        
        ->causedBy($user)        
        ->event('Saludo')
        ->withProperties([
            'key' => $user->id,
            'valor antiguo' => 'Hola',
            'valor nuevo' => 'Adios',
        ])
        ->log('Hola, usuario '.$user->name.' registro algo');
        Toastr::success('Usuario '.$user->name.' acaba de registrar algo','Correcto!');
        return redirect()->route('home');
    }

}
