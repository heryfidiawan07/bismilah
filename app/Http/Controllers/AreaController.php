<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
    	$areas = Area::all();
    	return view('areas.areas', compact('areas'));
    }

    public function store(Request $request){
    	Area::create([
    	    		'area' => $request->area,
    	    		'slug' => str_slug($request->area),
    	    	]);
    	return back();
    }

    public function update(Request $request, $id){
    	$areas = Area::find($id);
    	$areas->update([
    	    		'area' => $request->area,
    	    		'slug' => str_slug($request->area),
    	    	]);
    	return back();
    }
    
    public function destroy($id){
    	$areas = Area::find($id);
    	$areas->delete();
    	return back();
    }

}
