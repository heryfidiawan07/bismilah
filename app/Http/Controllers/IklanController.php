<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Iklan;
use Illuminate\Http\Request;

class IklanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()) {
                $user  = Auth::user();
                $iklan = Iklan::where('user_id', $user->id)->first();
                if ($iklan) {
                    $bukti = Iklan::where('bukti','!=',null)->first();
                    return view('users.iklan', compact('iklan','user','bukti'));
                }
                return view('users.iklan', compact('iklan','user'));
            }
        }else{
            return view('users.iklan');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'deskripsi' => 'required',
            'img' => 'required|max:3500',
            'hp' => 'required',
            'wa' => 'required',
            'mulai' => 'required',
            'pilihan' => 'required',
        ]);
        $user = Auth::user();
        $time = date('Y-m-d-H-i-s');
        $file = $request->file('img');
        if (!empty($file)) {
            $ex = $file->getClientOriginalExtension();
            $fileName = $user->id.'-'.$time.'iklan-kampusmobil.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(300, 250);
            $img->save(public_path("iklanImg/". $fileName));
        }
        $pilihan = $request->pilihan;
        $mulai = $request->mulai;
        $selesai = date('Y-m-d', strtotime('+'.$pilihan.' days', strtotime($mulai)));
        $iklan = Iklan::create([
                    'img' => $fileName,
                    'deskripsi' => $request->deskripsi,
                    'hp' => ltrim($request->hp,'0'),
                    'wa' => ltrim($request->wa,'0'),
                    'pilihan' => $pilihan,
                    'mulai' => $mulai,
                    'selesai' => $selesai,
                    'user_id' => $user->id,
                ]);
        //Mail::to('heryfidiawan07@gmail.com')->send(new marketingKarir($marketing));
        $request->session()->flash('status', 'Berhasil, Menunggu konfirmasi admin');
        return back();

    }

    public function pembayaranIklan(Request $request, $id){
        $this->validate($request, [
                'img' => 'required',
            ]);
        $iklan = Iklan::find($id);
        $time = date('Y-m-d_H-i-s');
        $file = $request->file('img');
        if (!empty($file)) {
            $ex = $file->getClientOriginalExtension();
            $fileName = $iklan->id.'_'.$time.'_pembayaran-iklan_kampusmobil.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(200, 200);
            $img->save(public_path("resiIklan/". $fileName));
        }
        $iklan->update([
                    'bukti' => $fileName,
                ]);
        //Mail::to('heryfidiawan07@gmail.com')->send(new MarketingCheckOut($bayar));
        $request->session()->flash('status', 'Terimakasih, Iklan anda akan di proses secepatnya oleh tim kami.');
        return back();
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
        //
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
