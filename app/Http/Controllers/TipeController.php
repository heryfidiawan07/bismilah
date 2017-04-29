<?php

namespace App\Http\Controllers;

use App\Tipe;
use App\Mobil;
use App\Brand;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function create(){
    	$mobils = Mobil::orderBy('model')->get();
    	$tipes  = Tipe::all();
      return view('tipes.create', compact('mobils','tipes'));
    }

    public function store(Request $request){
      $this->validate($request, [
                'mobil_id' => 'required',
                'tipe' => 'required',
                'harga' => 'required',
                'transmisi' => 'required',
                'cc' => 'required',
            ]);
    	Tipe::create([
    			'mobil_id' => $request->mobil_id,
    			'tipe' => $request->tipe,
          'harga' => $request->harga,
          'transmisi' => $request->transmisi,
          'cc' => $request->cc,
    		]);
    	return back();
    }

    public function edit($id){
        $mobils = Mobil::all();
        $tipe   = Tipe::whereId($id)->first();
        return view('tipes.edit', compact('mobils','tipe'));
    }
    
    public function update(Request $request, $id){
      $this->validate($request, [
                'tipe' => 'required',
                'harga' => 'required',
                'transmisi' => 'required',
                'cc' => 'required',
            ]);
    	$tipe  = Tipe::find($id);
    	$mobil = Mobil::whereId($tipe->mobil_id)->first();
      $tipe->update([
                  'mobil_id' => $request->mobil_id,
                  'tipe' => $request->tipe,
                  'harga' => $request->harga,
                  'transmisi' => $request->transmisi,
                  'cc' => $request->cc,
              ]);
      $brand = Brand::whereId($mobil->brand_id)->first();
      return redirect('/admin/series');
    }
    
}
