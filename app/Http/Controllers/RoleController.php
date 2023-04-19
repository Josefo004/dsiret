<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\RoleRequest;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Auth\Access\Gate;
use Toastr;

use Spatie\Permission\Traits\HasRoles;

use App\Models\User;
use Auth;

class RoleController extends Controller
{

    public function __construct(){
        //$this->middleware('auth');
    }
    public function apiRoles()
    {
        $roles = Role::select('id','longname','name','guard_name','description')->get();
        return Datatables::of($roles)
                    ->addIndexColumn()
                    ->addColumn('permisos', function($role){
                        if($role->id==1){
                            return '<button type="button" class="btn btn-success btn-sm">Acceso total</button>';
                        }else{
                            return '<button type="button" class="btn btn-primary btn-sm">Permisos <span class="badge badge-light">'.$role->permissions->count().'</span></button>';
                        }
                        
                    })
                    ->addColumn('usuarios', function($role){
                        return '<i class="fa fa-users"></i>: <strong>'.$role->users()->count().'</strong>';
                    })
                    ->editColumn('longname', function($role){
                        return '<b>'.$role->longname.'</b>';
                    })
                    ->editColumn('name', function($role){
                        return '<button type="button" class="btn btn-primary btn-sm">'.$role->name.'</button>';
                    })
                    ->addColumn('action','roles.partials.acciones')                    
                    ->rawColumns(['action','longname','name','permisos', 'usuarios']) 
                    ->toJson();                    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //obtiene grupo de permisos
        $grupos = Permission::select('group')
        ->groupBy('group')
        ->get();        
        $permisos = collect();
        //recorre cada grupo y agrega permisos pertenecientes a dicho grupo
        foreach($grupos as $grupo){            
            $g = $array = [
                "nombre" => $grupo->group,
                "permisos" => Permission::where('group','=', $grupo->group)->get(),
            ];            
            $permisos->push($g);
        }        
        return view('roles.create',compact('permisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {        
        $role = Role::create($request->all());
        $role->syncPermissions($request->get('permissions'));
        Toastr::success('Rol creado con exito','Correcto!');        
        return redirect()->route('roles.index');
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
        $role = Role::find($id);
        //obtiene grupo de permisos 
        $grupos = Permission::select('group')
            ->groupBy('group')
            ->get();        
        $permisos = collect();
        //recorre cada grupo y agrega permisos pertenecientes a dicho grupo
        foreach($grupos as $grupo){            
            $g = $array = [
                    "nombre" => $grupo->group,
                    "permisos" => Permission::where('group','=', $grupo->group)->get(),
                    ];            
            $permisos->push($g);
        }        
        return view('roles.edit',compact('role','permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->fill($request->all());
        $role->save();
        //Si array de permisos no esta vacio -> registra permisos, sino revoca todos los permisos
        $request->permissions!=[] ? $role->syncPermissions($request->permissions) : $role->syncPermissions();

        Toastr::info('Rol actualizado con exito','Actualizado!');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $role = Role::find($id);
            $role->syncPermissions();
            $role->delete();
            return response()->json([
                'status' => 'exito',
                'title' => 'Atención!',
                'message' => 'El rol "' . $role->longname . '" ha sido eliminado y todos sus permisos revocados.'
            ]);   
        }
    }
}
