<?php

namespace App\Http\Controllers\Auth;

use DB;
use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacebookController extends Controller
{
    protected $redirectPath = '/';

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('/');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->to('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('sosmed', $facebookUser->id)->first();
        $slug     = DB::table('users')->select('slug')->where('slug', str_slug($facebookUser->name))->get();

        if ($authUser){
            return $authUser;
        }
        if ($facebookUser->email == null) {
            $facebookUser->email = str_random(10).'_facebook';
        }

        if(count($slug) > 0 ){
            $slug = str_slug($facebookUser->name).'-'.str_slug(str_random(5));
        }else {
            $slug  = str_slug($facebookUser->name);//ok Fix
        }

        return User::create([
            'name'        => $facebookUser->name,
            'email'       => $facebookUser->email,
            'sosmed'      => $facebookUser->id,
            'img'         => $facebookUser->avatar,
            'status'      => 1,
            'token'       => str_random(20),
            'password'    => bcrypt(str_random(20)),
            'slug'        => $slug,
        ]);
    }
    
}
