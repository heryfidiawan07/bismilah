<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
    	$brands = Brand::all();
    	return view('brands.brands', compact('brands'));
    }

    public function store(Request $request){
    	Brand::create([
    	    		'brand' => $request->brand,
    	    		'slug' => str_slug($request->brand),
    	    	]);
    	return back();
    }

    public function update(Request $request, $id){
    	$brands = Brand::find($id);
    	$brands->update([
    	    		'brand' => $request->brand,
    	    		'slug' => str_slug($request->brand),
    	    	]);
    	return back();
    }
    
    public function destroy($id){
    	$brands = Brand::find($id);
    	$brands->delete();
    	return back();
    }

}
