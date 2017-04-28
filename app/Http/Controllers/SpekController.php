<?php

namespace App\Http\Controllers;

use Purifier;
use App\Spek;
use App\Brand;
use App\Mobil;
use App\Marketing;
use Illuminate\Http\Request;

class SpekController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['show','index']]);
    }

    public function index(){
    	$speks   = Spek::latest()->paginate(4);
    	return view('speks.index', compact('speks'));
    }

    public function create(){
		$mobils		  = Mobil::all();
		return view('speks.create', compact('mobils'));
    }

    public function store(Request $request){
        $this->validate($request, [
        		'mobil_id' => 'required',
        		'title' => 'required',
                'speks' => 'required|min:3',
            ]);
    	Spek::create([
    				'mobil_id' => $request->mobil_id,
    				'title' => $request->title,
                    'slug' => str_slug($request->title),
    	    		'speks' => Purifier::clean($request->speks, array('Attr.EnableID' => true)),
    	    	]);
    	return redirect('/spesifikasi');
    }

    public function show($model, $title){
        $mobils    = Mobil::whereModel($model)->first();
        $brand     = Brand::whereId($mobils->brand_id)->first();
    	$spek  	   = Spek::where('mobil_id',$mobils->id)->first();
        if ($spek && $mobils) {
            return view('speks.show', compact('spek','brand'));
        }
            return redirect('/spesifikasi');
    }

    public function edit($id){
    	$speks  = Spek::whereId($id)->first();
    	$mobils = Mobil::all();
    	return view('speks.edit', compact('speks', 'mobils'));
    }
    
    public function update(Request $request, $id){
    	$this->validate($request, [
        		'mobil_id' => 'required',
        		'title' => 'required',
                'speks' => 'required|min:3',
            ]);
    	$speks = Spek::find($id);
    	$speks->update([
    	    		'mobil_id' => $request->mobil_id,
    	    		'title' => $request->title,
                    'slug' => str_slug($request->title),
    	    		'speks' => Purifier::clean($request->speks, array('Attr.EnableID' => true)),
    	    	]);
    	return redirect('/spesifikasi');
    }
    
    public function destroy($id){
    	$spek = Spek::find($id);
    	$spek->delete();
    	return back();
    }

}
