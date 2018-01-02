<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Image;
use App\User;
use App\Advertising;
use Illuminate\Http\Request;
use App\Mail\DaftarIklan;
use App\Mail\UpdateIklan;
use App\Mail\PembayaranAds;
use App\Mail\AdsVerification;
use App\Mail\PerpanjanganIklan;
use Illuminate\Support\Facades\Mail;

class AdvertisingController extends Controller
{   
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['create','store','update','perpanjangan']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Advertising::latest()->paginate(6);
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if (Auth::check()) {
            if (Auth::user()) {
                $user  = Auth::user();
                $ads = Advertising::where('user_id', $user->id)->first();
                if ($ads) {
                    $start = date_create($ads->start);
                    $done =  date_create($ads->done);
                    $now = date_create();
                    $sisa = date_diff($done,$now);
                    return view('ads.create', compact('ads','user','sisa'));
                }
                return view('ads.create', compact('ads'));
            }
        }else{
            return view('ads.create');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request, [
                'img' => 'required',
                'title' => 'required',
                'description' => 'required|min:3|max:255',
                'phone' => 'required',
                'whatsapp' => 'required',
                'coverage' => 'required',
                'start' => 'required',
                'durasi' => 'required',
            ]);
        if ($request->start < date('Y-m-d')) {
            $request->session()->flash('adswrong', 'Maaf !, Tanggal di mulai harus hari ini atau besok.');
            return back();
        }else {
            $done = date('Y-m-d', strtotime('+'.$request->durasi.' days', strtotime($request->start)));
            $time = date('Y-m-d-H-i-s');
            $file = $request->file('img');
            $user = Auth::user();
            if (!empty($file)) {
                $ex       = $file->getClientOriginalExtension();
                $fileName = str_slug($request->title).'-'.$time.'.'.$ex;
                $path     = $file->getRealPath();
                $img      = Image::make($path)->resize(1200, 600);
                $img->save(public_path("ads/". $fileName));
            }
            $ads = Auth::user()->advertisings()->create([
                    'user_id' => $user->id,
                    'img' => $fileName,
                    'title' => $request->title,
                    'description' => $request->description,
                    'phone' => ltrim($request->phone,'0'),
                    'whatsapp' => ltrim($request->whatsapp,'0'),
                    'coverage' => $request->coverage,
                    'start' => $request->start,
                    'done' => $done,
                ]);
            Mail::to('heryfidiawan07@gmail.com')->send(new DaftarIklan($ads));
            $request->session()->flash('ads', 'Berhasil membuat iklan');
            return redirect('/advertising');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'title' => 'required',
                'description' => 'required|min:3|max:255',
                'phone' => 'required',
                'whatsapp' => 'required',
                'coverage' => 'required',
                'start' => 'required',
                'durasi' => 'required',
            ]);
        if ($request->start < date('Y-m-d')) {
            $request->session()->flash('ads', 'Maaf !, Tanggal di mulai harus hari ini atau besok.');
            return back();
        }
        $done = date('Y-m-d', strtotime('+'.$request->durasi.' days', strtotime($request->start)));
        $time = date('Y-m-d-H-i-s');
        $file = $request->file('img');
        $ads = Advertising::whereId($id)->first();
        $user = User::whereId($ads->user_id)->first();
        if (!empty($file)) {
            $ex       = $file->getClientOriginalExtension();
            $fileName = str_slug($ads->title).'-'.$time.'.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(1200, 600);
                $cek   = public_path("ads/".$ads->img);
                if (File::exists($cek)) {
                    File::delete($cek);
                }
            $img->save(public_path("ads/". $fileName));
        }else{
            $fileName = $ads->img;
        }
        if ($ads->status == 1) {
            $start = $ads->start;
            $done  = $ads->done;
        }else{
            $start = $request->start;
            $done  = $done;
        }
        $ads->update([
                'user_id' => $user->id,
                'img' => $fileName,
                'title' => $request->title,
                'description' => $request->description,
                'phone' => ltrim($request->phone,'0'),
                'whatsapp' => ltrim($request->whatsapp,'0'),
                'coverage' => $request->coverage,
                'start' => $start,
                'done' => $done,
            ]);
        Mail::to('heryfidiawan07@gmail.com')->send(new UpdateIklan($ads));
        $request->session()->flash('ads', 'Iklan anda berhasil di update.');
        return redirect('/advertising');
    }

    public function perpanjangan(Request $request, $id){
        $this->validate($request, [
                'durasi' => 'required',
            ]);
        $ads = Advertising::whereId($id)->first();
        $done = date('Y-m-d', strtotime('+'.$request->durasi.' days', strtotime($ads->done)));
        $ads->update([
                'durasi' => $request->durasi,
                'done' => $done,
                'perpanjang' => 1,
                'status' => 0,
            ]);
        Mail::to('heryfidiawan07@gmail.com')->send(new PerpanjanganIklan($ads));
        $request->session()->flash('ads', 'Berhasil di perpanjang.');
        return redirect('/advertising');
    }

    public function pembayaran(Request $request, $id){
        $this->validate($request, [
                'resi' => 'required',
            ]);
        $ads = Advertising::whereId($id)->first();
        $user = User::whereId($ads->user_id)->first();
        $time = date('Y-m-d-H-i-s');
        $file = $request->file('resi');
        if (!empty($file)) {
            $ex       = $file->getClientOriginalExtension();
            $fileName = str_slug($ads->title).'-'.$time.'.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(500, 500);
                $cek   = public_path("resiIklan/".$ads->resi);
                if (File::exists($cek)) {
                    File::delete($cek);
                }
            $img->save(public_path("resiIklan/". $fileName));
            $ads->update([
                'resi' => $fileName,
            ]);
        }
        Mail::to('heryfidiawan07@gmail.com')->send(new PembayaranAds($ads));
        $request->session()->flash('adscheckout', 'Berhasil, Menungu konfirmasi admin.');
        return redirect('/advertising');
        
    }
    
    public function verifikasi(Request $request, $id){
        $ads = Advertising::whereId($id)->first();
        $ads->update([
                'status' => $request->status,
                'perpanjang' => $request->perpanjang,
            ]);
        if ($request->status == 1) {
            Mail::to($ads->user->email)->send(new AdsVerification($ads));
        }
        return back();
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
