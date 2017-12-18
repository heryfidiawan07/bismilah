<?php

namespace App\Http\Controllers;

use App\Pesan;
use App\Mail\PesanKiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesans = Pesan::latest()->paginate(12);
        return view('pesan.index', compact('pesans'));
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
                'email' => 'required|min:3|max:50',
                'alamat' => 'required|min:3|max:100',
                'hp' => 'required|min:3|max:13',
                'wa' => 'required|min:3|max:13',
                'pesan' => 'required|min:3|max:500',
                'g-recaptcha-response' => 'required|captcha',
            ]);
        $pesan = Pesan::create([
                'email' => $request->email,
                'alamat' => $request->alamat,
                'hp' => $request->hp,
                'wa' => $request->wa,
                'pesan' => $request->pesan,
            ]);
        Mail::to('heryfidiawan07@gmail.com')->send(new PesanKiriman($pesan));
        $request->session()->flash('pesan', 'Pesan anda telah terkirim.');
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
