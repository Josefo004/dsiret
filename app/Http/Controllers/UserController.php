<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\PerfilRequest;
use Illuminate\Support\Str;
use Toastr;
use Storage;
use Spatie\Activitylog\Models\Activity;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class UserController extends Controller
{

    public function apiUsers()
    {
        $query = User::query();
        $query->select(['id','name','username','estado']);
        return datatables()                    
                    ->eloquent($query)                    
                    ->addIndexColumn() 
                    ->editColumn('estado', function($user){
                        return $user->estado == 'A'
                                    ? '<span class="badge badge-success"><b>'.$user->fullestado.'</b></span>'
                                    : '<span class="badge badge-danger">'.$user->fullestado.'</span>';
                    })
                    ->editColumn('rol', function($user){
                        $rol = '';
                        foreach($user->roles as $role){
                            $rol .= '<span class="badge badge-primary">' .$role->name.'</span>';
                        }
                        return $rol;
                    })
                    ->addColumn('action','users.partials.acciones')
                    ->rawColumns(['action','rol', 'estado'])
                    ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $roles =  Role::all()->pluck('name','id');
        unset($roles[1]);//elimina rol de Super Administrador con ID=1        
        return view('users.create', compact('roles'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {   
        $user = User::create($request->all());



        
        if($request->roles!=[])
        {
            $user->syncRoles($request->roles);
        }
        Toastr::success('Usuario registrado con exito','Correcto!');        
        return redirect()->route('users.edit',['id'=>$user->id]);
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
        $user = User::find($id);

        //todos ls roles del sistema
        //$roles = Role::orderBy('name','ASC')->pluck('name','id');        
        $roles =  Role::all()->pluck('name','id');
        unset($roles[1]);//elimina rol de Super Administrador con ID=1        
        //roles de usuario
        $roles_usuario = Role::orderBy('name','ASC')
        ->join('model_has_roles','model_has_roles.role_id','=','roles.id')
        ->where('model_has_roles.model_id','=',$user->id)
        ->pluck('id');
        //->pluck('name','id');
        
        return view('users.edit',compact('user','roles','roles_usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {        
        $user->fill($request->all());
        if($request->password){//actualiza password
            $user->fill([
                'password'=>$request->password
            ])->save();
        }
        $user->save();//guarda cambios
        
        //actualiza roles        
        $request->roles!=[] ? $user->syncRoles($request->roles) : $user->syncRoles([]);
        //$request->permissions!=[] ? $role->syncPermissions($request->permissions) : $role->syncPermissions();
        Toastr::info('Usuario actualizado con exito','Actualizado!');
        return redirect()->route('users.index');
    }

    /**
     * Actualizacion de password 
    */
    public function updatepassword(Request $request, User $user)//UserPasswordRequest
    {        
        if($request->password==$request->password_confirmation){
            $user->password=$request->password;
            $user->save();        
            Toastr::info('Su contraseña fue cambiado satisfactoriamente','Password!');
        }
        else{
            Toastr::info('Las contraseñas deben ser iguales. no se puede actualizar','Password!');
        }                
        //roles de usuario
        $roles_usuario = Role::orderBy('name','ASC')
        ->join('model_has_roles','model_has_roles.role_id','=','roles.id')
        ->where('model_has_roles.model_id','=',$user->id)
        ->pluck('id');

        return view('users.perfil',compact('user','roles_usuario'));
    }

    /**
     * Actualiza datos personales del perfil de un usuario
    */
    public function updateperfil(PerfilRequest $request, User $user){
        $user->fill($request->all());
        $user->save();//guarda cambios
        Toastr::info('Datos personales actualizados con exito','Actualizado!');
        return redirect()->route('users.perfil');
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
            $user = User::find($id);            
            $user->delete();
            return response()->json([
                'status' => 'exito',
                'title' => 'Atención!',
                'message' => 'El usuario "' . $user->name . '" ha sido eliminado.'
            ]);   
        }
    }


    /**
     * Perfil de usuario
    */
    public function perfil()
    {
        $user = auth()->user();        
        //$roles = $user->getRoleNames();   
        $roles_usuario = Role::orderBy('name','ASC')
        ->join('model_has_roles','model_has_roles.role_id','=','roles.id')
        ->where('model_has_roles.model_id','=',$user->id)
        ->pluck('longname');        
        return view('users.perfil',compact('user','roles_usuario'));
    }

    public function upload(Request $request, User $user)
	{
		$file = $request->file('file');
		$carpeta = 'users';
        $tipo = $file->guessExtension();        
        $nombre = Str::slug($user->name);        
		Storage::disk('imagen')->put($carpeta.'/'.$nombre.'.'.$tipo,\File::get($file));
        $user->imagen = $nombre.'.'.$tipo;        
		$user->save();
		Toastr::info('Su fotografia de perfil ha sido actuaizado con exito','Foto de Perfil!');
		return response()->json();
    }

    public function uploadphoto(Request $request, $id)
	{
        $folderPath = public_path('images/users/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $user = User::find($id);
        $nombre = Str::slug($user->name);        

        $file = $folderPath . $nombre . '.png';
        file_put_contents($file, $image_base64);
        $user->imagen = $nombre.'.png';
		$user->save();
		return response()->json([
            'status' => 'exito',
            'title' => 'Atención!',
            'message' => $user->imagen .'?'. rand(1, 1000)
        ]);   
    }

    public function uploadcharacter(Request $request, $id){
        $user = User::find($id);
        $user->imagen = $request->image.'.png';
        $user->save();        
        return response()->json([
            'status' => 'exito',
            'title' => 'Atención!',
            'message' => ''
        ]);  
    }


    /**
     * Actividad
    */
    public function apiActivity(){
        $query = Activity::query();  
        $query->orderBy('id','DESC');
        return datatables()                    
                    ->eloquent($query)                    
                    ->addIndexColumn()                                         
                    ->editColumn('created_at', function($q){
                        $fecha = Date::parse($q->created_at)->format('Y-m-d');
                        $hora = Date::parse($q->created_at)->format('h:i:s');
                        $html = '<div><span class="badge bg-info text-dark">'.$fecha.'</span></div>';
                        $html .= '<div><span class="badge bg-info text-dark">'.$hora.'</span></div>';                        
                        return $html;                        
                    })    
                    ->editColumn('event', function($q){                        
                        $html='';
                        switch ($q->event) {
                            case 'login':
                                $html = '<div><span class="badge bg-success">'.$q->event.'</span></div>';
                                break;
                            case 'logout':
                                $html = '<div><span class="badge bg-danger">'.$q->event.'</span></div>';
                                break;
                            default: 
                                $html = '<div><span class="badge bg-light text-dark">'.$q->event.'</span></div>';
                                break;
                        }
                        return $html;
                    })               
                    ->editColumn('properties', function($q){                        
                        return pretty_json( json_encode( $q->properties ), '<br/>','&ensp;&ensp;' );                        
                    })                                        
                    ->rawColumns(['properties','created_at','event'])
                    ->toJson();
    }

    /**
     * Actividad de usuarios
    */
    public function indexActivity(){
        return view('users.indexactivity');
    }
   

}
