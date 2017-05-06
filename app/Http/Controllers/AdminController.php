<?php

namespace App\Http\Controllers;

use Auth;
use Purifier;
use App\User;
use App\Kritik;
use Illuminate\Http\Request;
use App\Mail\Saran;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['createKritik','storeKritik']]);
    }

    public function index(){
    	return view('admin.dashboard');
    }

    public function createKritik(){
    	return view('kritik.create');
    }

    public function storeKritik(Request $request){
    	$this->validate($request, [
                'title' => 'required|min:3|max:255',
                'email' => 'required',
                'body' => 'required|min:3|max:500',
                'g-recaptcha-response' => 'required|captcha',
            ]);
        $kritik = Kritik::create([
	    		'title' => $request->title,
	    		'email' => $request->email,
	    		'body' => Purifier::clean($request->body),
	    	]);
        Mail::to('heryfidiawan07@gmail.com')->send(new Saran($kritik));
	    $request->session()->flash('status', 'Terimakasih, Masukan anda telah di kirim');
        return back();
    }
    
    public function indexKritik(){
    	$kritiks = Kritik::latest()->paginate(4);
    	return view('kritik.index', compact('kritiks'));
    }
    
    public function showKritik($title, $id){
    	$kritik = Kritik::whereId($id)->first();
    	return view('kritik.show', compact('kritik'));
    }

    public function deleteKritik($id){
    	$kritik = Kritik::find($id);
    	$kritik->delete();
    	return redirect('/admin/kritik-dan-saran');
    }

    public function users(){
        $members = User::paginate(6);
        return view('admin.users', compact('members'));
    }

    public function usersDelete($id){
        $user = User::find($id);
        $user->delete();
        return back();
    }
    
}
