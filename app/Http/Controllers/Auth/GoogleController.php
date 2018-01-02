<?php

namespace App\Http\Controllers\Auth;

use DB;
use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoogleController extends Controller
{
    protected $redirectPath = '/';

    /**
     * Redirect the user to the google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('auth/google');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $googleUser
     * @return User
     */
    private function findOrCreateUser($googleUser)
    {
        $authUser = User::where('sosmed', $googleUser->id)->first();
        $slug     = DB::table('users')->select('slug')->where('slug', str_slug($googleUser->name))->get();

        if ($authUser){
            return $authUser;
        }

        if ($googleUser->email == null) {
            $googleUser->email = $googleUser->id.'@google.com';
        }

        if(count($slug) > 0 ){
            $slug = str_slug($googleUser->name).'-'.str_slug(str_random(5));
        }else {
            $slug  = str_slug($googleUser->name);//OK Fix
        }
        if ($googleUser->avatar_original == null) {
            $img = 'https://s5.postimg.org/qb4j49k4n/kampusmobil.jpg';
        }else{
            $img = $googleUser->avatar_original;
        }
        //'handle' => $googleUser->nickname,
        return User::create([
            'name'        => $googleUser->name,
            'email'       => $googleUser->email,
            'sosmed'      => $googleUser->id,
            'img'         => $img,
            'status'      => 1,
            'token'       => str_random(20),
            'password'    => bcrypt(str_random(20)),
            'slug'        => $slug,
        ]);
    }
    
}

    