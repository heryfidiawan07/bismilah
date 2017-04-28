<?php

namespace App\Http\Controllers\Auth;

use DB;
use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TwitterController extends Controller
{
    protected $redirectPath = '/';

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('sosmed', $twitterUser->id)->first();
        $slug     = DB::table('users')->select('slug')->where('slug', str_slug($twitterUser->name))->get();

        if ($authUser){
            return $authUser;
        }

        if ($twitterUser->email == null) {
            $twitterUser->email = str_random(10).'_twitter';
        }

        if(count($slug) > 0 ){
            $slug = str_slug($twitterUser->name).'-'.str_slug(str_random(5));
        }else {
            $slug  = str_slug($twitterUser->name);//OK Fix
        }
        //'handle' => $twitterUser->nickname,
        return User::create([
            'name'        => $twitterUser->name,
            'email'       => $twitterUser->email,
            'sosmed'      => $twitterUser->id,
            'img'         => $twitterUser->avatar_original,
            'status'      => 1,
            'token'       => str_random(20),
            'password'    => bcrypt(str_random(20)),
            'slug'        => $slug,
        ]);
    }
    
}

    