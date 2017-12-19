<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Image;
use Purifier;
use App\User;
use App\Forum;
use App\Profil;
use App\Marketing;
use App\Pembayaran;
use Illuminate\Http\Request;
use App\Mail\marketingKarir;
use App\Mail\MarketingCheckOut;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['member','profil','karir']]);
    }

    public function member(){
        $members = User::paginate(12);
        return view('users.member', compact('members'));
    }

    public function status(Request $request, $id){
        $this->validate($request, [
                'status' => 'required|max:500',
            ]);
        $user   = Auth::user();
        if ($user->id == $id) {
            $status = Profil::where('user_id',$user->id)->first();
            if (count($status)) {
                $status->update([
                    'status' => Purifier::clean($request->status),
                ]);
            }else{
                Profil::create([
                    'user_id'=> $user->id,
                    'status' => Purifier::clean($request->status),
                ]);
            }
            $request->session()->flash('status', 'Berhasil update');
            return back();
        }else{
            $request->session()->flash('status', 'Hey hey hey,,,,,');
            return back();
        }
    }

    public function nama(Request $request, $id){
        $this->validate($request, [
                'name' => 'required|min:3|max:20',
            ]);
        $user   = Auth::user();
        if ($user->id == $id) {
            $user->update([
                    'name' => $request->name,
                    'slug' => str_slug($request->name),
                ]);
            $request->session()->flash('status', 'Nama berhasil di ubah.');
            return redirect("/member/{$user->slug}");
        }else{
            $request->session()->flash('status', 'Hey hey hey,,,,,');
            return redirect("/member/{$user->slug}");
        }
    }
    
    
    public function foto(Request $request, $id){
        $this->validate($request, [
                'img' => 'required|mimes:jpeg,bmp,png',
            ]);
        $user   = Auth::user();
        $file = $request->file('img');
        if ($user->id == $id) {
            if (!empty($file)) {
                $ex       = $file->getClientOriginalExtension();
                $fileName = $user->slug.'.'.$ex;
                $path     = $file->getRealPath();
                $img      = Image::make($path)->resize(500, 400);
                    $cek   = public_path("member/".$user->img);
                    if ($user->img != null) {
                        File::delete($cek);
                    }
                $img->save(public_path("member/". $fileName));
            }
            $user->update([
                    'img'  => $fileName,
                ]);
            $request->session()->flash('status', 'Berhasil update');
            return redirect("/member/{$user->slug}");
        }else{
            $request->session()->flash('status', 'Hey hey hey,,,,,');
            return redirect("/member/{$user->slug}");
        }

    }
    
    public function profil($slug){
    	$user    = User::whereSlug($slug)->first();
        $profil  = $user->profil()->first();
        if ($user) {
            $threads = Forum::where('user_id',$user->id)->latest()->paginate(6);
            return view('users.profil', compact('user','threads','profil'));    
        }else{
            return redirect('/');
        }

    }

    public function karir(){
        if (Auth::check()) {
            if (Auth::user()) {
                $user  = Auth::user();
                $sales = Marketing::where('user_id', $user->id)->first();
                if ($sales) {
                    $bayar = Pembayaran::where('sales_id',$sales->id)->first();    
                    return view('users.karir', compact('sales','user','bayar'));
                }
                return view('users.karir', compact('sales','user'));
            }
        }else{
            return view('users.karir');
        }
    }

    public function createKarir(Request $request){
        $this->validate($request, [
                'brand_id' => 'required',
                'area_id' => 'required',
                'name' => 'required',
                'img' => 'required|max:3500',
                'pt' => 'required',
                'alamat' => 'required',
                'hp1' => 'required',
                'hp2' => 'required',
                'tentang' => 'required|max:255',
            ]);
        $user = Auth::user();
        $time = date('Y-m-d-H-i-s');
        $file = $request->file('img');
        if (!empty($file)) {
            $ex = $file->getClientOriginalExtension();
            $fileName = $user->id.'-'.$time.'-kampusmobil.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(300, 250);
            $img->save(public_path("marketingImg/". $fileName));
        }
        $slug = str_slug($request->name);
        $marketing = Marketing::create([
                    'name' => $request->name,
                    'slug' => $slug,
                    'img' => $fileName,
                    'pt' => $request->pt,
                    'alamat' => $request->alamat,
                    'hp1' => ltrim($request->hp1,'0'),
                    'hp2' => ltrim($request->hp2,'0'),
                    'tentang' => $request->tentang,
                    'brand_id' => $request->brand_id,
                    'area_id' => $request->area_id,
                    'user_id' => $user->id,
                ]);
        Mail::to('heryfidiawan07@gmail.com')->send(new marketingKarir($marketing));
        $request->session()->flash('status', 'Berhasil, Menunggu konfirmasi admin');
        return back();
    }

    public function updateKarir(Request $request, $id){
        $this->validate($request, [
                'name' => 'required',
                'pt' => 'required',
                'alamat' => 'required',
                'hp1' => 'required',
                'hp2' => 'required',
                'tentang' => 'required|max:255',
            ]);
        $marketing = Marketing::whereId($id)->first();
        $user = Auth::user();
        $file = $request->file('img');
        if (!empty($file)) {
            $fileName = $marketing->img;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(300, 250);
            $img->save(public_path("marketingImg/". $fileName));
        }else {
            $fileName = $marketing->img;
        }
        $slug = str_slug($request->name);
        $brand = $request->brand_id;
        $area = $request->area_id;
        if (!$brand || !$area) {
            $brand = $marketing->brand_id;
            $area  = $marketing->area_id;
        }
        $marketing->update([
                    'name' => $request->name,
                    'slug' => str_slug($request->name),
                    'img' => $fileName,
                    'pt' => $request->pt,
                    'alamat' => $request->alamat,
                    'hp1' => ltrim($request->hp1,'0'),
                    'hp2' => ltrim($request->hp2,'0'),
                    'tentang' => $request->tentang,
                    'brand_id' => $brand,
                    'area_id' => $area,
                    'user_id' => $user->id,
                ]);
        $request->session()->flash('status', 'Profil anda berhasil di update');
        return back();
    }
    
    public function cekArea($brand){
        $sales = Marketing::where('brand_id',$brand)->get();
        return response()->json($sales);
    }
    
    public function pembayaran(Request $request, $id){
        $this->validate($request, [
                'pengirim' => 'required',
                'bank' => 'required',
                'img' => 'required',
            ]);
        $marketing = Marketing::whereId($id)->first();
        $time = date('Y-m-d_H-i-s');
        $file = $request->file('img');
        if (!empty($file)) {
            $ex = $file->getClientOriginalExtension();
            $fileName = $marketing->id.'_'.$time.'_pembayaran_kampusmobil.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(200, 200);
            $img->save(public_path("resi/". $fileName));
        }
        $bayar = Pembayaran::create([
                    'sales_id' => $request->sales_id,
                    'img' => $fileName,
                    'pengirim' => $request->pengirim,
                    'bank' => $request->bank,
                ]);
        Mail::to('heryfidiawan07@gmail.com')->send(new MarketingCheckOut($bayar));
        $request->session()->flash('status', 'Terimakasih, Iklan anda akan di proses secepatnya oleh tim kami.');
        return back();
    }
                  
}
