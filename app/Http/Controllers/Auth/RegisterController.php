<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use App\Models\Perfil;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     * 
     */
    protected $redirectTo = RouteServiceProvider::USERS;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'celular' => ['required', 'string',  'regex:/^[0-9]{10}$/', 'unique:users'],
            'puesto' => ['required', 'string']
        ];
        if(Gate::allows('admin')){
            $rules['perfil'] = ['required', 'numeric'];
        }
        
        return Validator::make($data, $rules);
        // dd($data);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     * 
     */
    protected function create(array $data)
    {
        // dd($data);

        
        $user = User::create([
            'name' => $data['name'],
            'surname'=> $data['surname'],
            'email' => $data['email'],
            'celular' => $data['celular'],
            'puesto' => $data['puesto'],
            'password' => Hash::make($data['password']),
        ]);

        if (Gate::allows('admin') && isset($data['perfil'])){
            $user->perfiles()->attach($data['perfil']);
        }     
        else{
            $user->perfiles()->attach('4');
        }   
        return $user;
    }
}
