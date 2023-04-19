<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password','estado','ci','telefono','direccion','imagen'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
	 * Convertir el atributo nombre a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = mb_strtoupper($value);
    }

    /**
	 * Convertir el atributo a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setTipoAttribute($value)
    {
        $this->attributes['tipo'] = mb_strtoupper($value);
    }

    /**
	 * Convertir el atributo a mayusculas cuando se guarda o se edita.
	 *
	 * @var value
	 */
    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] = mb_strtoupper($value);
    }

    /**
     * Darle nombre al estado dependiendo de la letra
     *
     * A: ACTIVO
     * D: INACTIVO
     *
     */
    public function getFullEstadoAttribute()
    {
        return $this->estado=='A' ? 'ACTIVO' : 'INACTIVO';
    }

    /**
     * Metodo para Encriptar el password de un usuario 
     * 
     * @var value
     */
    public function setPasswordAttribute($value)
    {
        if(!empty($value))
            $this->attributes['password'] = \Hash::make($value);
    }

    public function adminlte_image()
    {        
        return 'images/users/'.(($this->imagen!=null)?$this->imagen:'user.png');
    }

    public function adminlte_desc()
    {
        
        return 'lorem ipsum';
    }

    public function adminlte_getroles()
    {        
        $roles_usuario = Role::orderBy('name','ASC')
        ->join('model_has_roles','model_has_roles.role_id','=','roles.id')
        ->where('model_has_roles.model_id','=',$this->id)
        ->pluck('longname');
        $html='';
        foreach ($roles_usuario as $role) {
            $html .= '<div>'.$role . '</div>';
        }  
        return $html;
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

}
