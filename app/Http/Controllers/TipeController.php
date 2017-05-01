<?php

namespace App\Http\Controllers;

use App\Tipe;
use App\Mobil;
use App\Brand;
use Illuminate\Http\Request;

class TipeController extends Controller
{   
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create($model){
    	$mobil  = Mobil::whereSlug($model)->first();
    	$tipes  = Tipe::where('mobil_id',$mobil->id)->latest()->get();
      return view('tipes.create', compact('mobil','tipes'));
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
        $tipe   = Tipe::whereId($id)->first();
        return view('tipes.edit', compact('tipe'));
    }
    
    public function update(Request $request, $id){
      $this->validate($request, [
                'tipe' => 'required',
                'harga' => 'required',
                'transmisi' => 'required',
                'cc' => 'required',
            ]);
    	$tipe  = Tipe::find($id);
      $tipe->update([
                  'mobil_id' => $request->mobil_id,
                  'tipe' => $request->tipe,
                  'harga' => $request->harga,
                  'transmisi' => $request->transmisi,
                  'cc' => $request->cc,
              ]);
      return redirect("/admin/series/{$tipe->mobil->slug}");
    }
    
}
