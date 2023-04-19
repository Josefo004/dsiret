<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;

use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public $maxAttempts = 3; //Numero maximo de intentos

    public $decayMinutes = 10; //Tiempo de bloqueo en minutos

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $date = Carbon::now();
        $from = $date->subDay(7);
        $to = Carbon::now();
        $last_users = User::select('username', 'name', 'imagen', 'last_admission')
            ->whereBetween('last_admission', [$from . ' 00:00:00', $to . ' 23:59:59']) // usuarios que ingresaron en la ultima semana (7 dias)
            ->where('ip', '=', request()->ip()) //solo usuarios que se conectan de la misma direccion IP
            ->take(4)
            ->orderBy('last_admission', 'DESC')
            ->get();
        //dd( empty($last_users) );
        return view('auth.login', ['last_users' => $last_users]);
    }

    /**
     * Login de Laravel modificado
     * 
     * Se agrega el registro de la fecha de ingreso "last_admission"
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($request->ajax()) {

            if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                $seconds = $this->limiter()->availableIn(
                    $this->throttleKey($request)
                );
                $tiempo = dameTiempo($seconds);

                return response()->json([
                    'status' => 'Error',
                    'title' => 'Atención!',
                    'message' => 'Demasiados intentos de inicio de sesión. Vuelva a intentarlo en ' . $tiempo . ''
                ]);
            }

            if ($this->attemptLogin($request)) {
                //usuario autenticado
                $user = User::find($this->guard()->user()->id);
                /*
                * guarda fecha de ingreso
                */
                $user->last_admission = date('Y-m-d H:i:s');
                $user->ip = request()->ip();
                $user->save();
                /*
                 * Registra evento
                */
                $arrInfo = clientInfo();
                activity('gadch')
                    ->causedBy($user)
                    ->event('login')
                    ->withProperties([
                        'username' => $user->username,
                        'ip' => dameIP(),
                        'browser' => $arrInfo['browser'],
                        'version' => $arrInfo['version'],
                        'os' => $arrInfo['os'],
                    ])
                    ->log('Usuario [' . $user->name . '] ingreso al sistema');
                return response()->json([
                    'status' => 'exito',
                    'title' => 'Atención!',
                    'message' => 'Acceso otorgado'
                ]);
            }

            $this->incrementLoginAttempts($request);

            return response()->json([
                'status' => 'Error',
                'title' => 'Atención!',
                'message' => 'Su contraseña es incorrecta'
            ]);
        } else {
            if (
                method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)
            ) {
                $this->fireLockoutEvent($request);
                return $this->sendLockoutResponse($request);
            }

            if ($this->attemptLogin($request)) {
                //usuario autenticado
                $user = User::find($this->guard()->user()->id);
                //guarda fecha de ingreso
                $user->last_admission = date('Y-m-d H:i:s');
                $user->ip = request()->ip();
                $user->save();
                /*
                 * Registra evento
                */
                $arrInfo = clientInfo();
                activity('gadch')
                    ->causedBy($user)
                    ->event('login')
                    ->withProperties([
                        'username' => $user->username,
                        'ip' => dameIP(),
                        'browser' => $arrInfo['browser'],
                        'version' => $arrInfo['version'],
                        'os' => $arrInfo['os'],
                    ])
                    ->log('Usuario [' . $user->name . '] ingreso al sistema');
                return $this->sendLoginResponse($request);
            }

            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
        }
    }

    public function username()
    {
        return 'username';
    }


    /**
     * Cierre de sesion
     */
    public function logout(Request $request)
    {
        //$id_user = auth()->user()->id;
        $user = auth()->user();
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($response = $this->loggedOut($request)) {
            return $response;
        }
        /*
        * Registra evento
        */                
        activity('gadch')        
            ->causedBy($user)
            ->event('logout')
            ->withProperties([
                'username' => $user->username,
                'ip' => dameIP(),                
            ])
            ->log('Usuario [ ' . $user->name . ' ] salió del sistema correctamente');

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }
}
