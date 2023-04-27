<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
 use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Auth;

class AuthController extends Controller
{
    
    protected $connection = 'mongodb' ;
    protected $collection = 'user';

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'apilogout']);
    }

   

    public function apilogin (Request $request){
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$request->input('email'))) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                if(Auth::user()->status != 1){
                    return response()->json([
                        "error"=>"El usuario no se encuentra activo",
                    ], 401);
                }

                if(Auth::user()->api_token != ""){
                    if(time() >= strtotime(Auth::user()->time_login) && time() <= strtotime(Auth::user()->time_logout)) {
                        return 
                            response()->json([
                                'nombre'        => Auth::user()->name,
                                'email'         => Auth::user()->email,
                                'api_token' => Auth::user()->api_token,
                            ], 200);
                    }
                }
                
                $login_time = date('Y-m-d H:i:s');
                $logout_time = date('Y-m-d H:i:s', strtotime ( '+1 hour' , strtotime ($login_time) )); 
                $updated_at =  date('Y-m-d H:i:s');
                $token = Str::random(23);
                $request->user()->forceFill([
                    'api_token' => hash('sha256', $token),
                    'time_login'=> $login_time,
                    'time_logout' => $logout_time,
                    'updated_at' => $updated_at
                ])->save();
                return response()->json([
                    'nombre'        => Auth::user()->name,
                    'email'         => Auth::user()->email,
                    'api_token' => Auth::user()->api_token,
                ],200);

            } else {
                return response()->json([
                    "error"=>"Correo electrónico o contraseña inválidos",
                    ], 404);
                }
        } else {
            return response()->json([
                "error"=>"Correo electrónico inválido",
            ], 403);
        }
    }
    public function apilogout(Request $request)
    {
        $updated_at =  date('Y-m-d H:i:s');
        $request->user()->api_token = null;
        $request->user()->time_login = null;
        $request->user()->time_logout = null;
        $request->user()->updated_at = $updated_at;
        $request->user()->save();
        return response()->json([
            'nombre'        => Auth::user()->name,
            'email'         => Auth::user()->email,
            'api_token' => Auth::user()->api_token,
            'msg' => 'Usuario desconectado'
        ],200);        
    }

}
