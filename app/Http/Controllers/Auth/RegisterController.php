<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Mail\KampusMobilRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:25|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {   
        
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        return $this->registered($request, $user)
            ?: redirect('/login')->with('warning', 'Cek email untuk verifikasi akun');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {   
        $slug  = DB::table('users')->select('slug')->where('slug', str_slug($data['name']))->get();
        if(count($slug) > 0 ){
            $slug = str_slug($data['name']).'-'.str_slug(str_random(5));
        }else {
            $slug  = str_slug($data['name']);//ok fix
        }

        $user = User::create([
            'name' => $data['name'],
            'slug' => $slug,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token' => str_random(20),
            'img' => 'https://s5.postimg.org/qb4j49k4n/kampusmobil.jpg',
        ]);
        // mengirim email
        Mail::to($user->email)->send(new KampusMobilRegister($user));
    }

    // verifikasi regiter token user dengan email
    public function verify_register($token, $id){
        $user = User::find($id);
        if (!$user) {
            return redirect('/login')->with('warning', 'siapa anda ?');
        }
        if ($user->token != $token) {
            return redirect('/login')->with('warning', 'apa yang anda lakukan');
        }
        $user->status = 1;
        $user->save();

        $this->guard()->login($user);
        return redirect('/');
    }
}
