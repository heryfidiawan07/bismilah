<?php

namespace App\Http\Controllers;

use File;
use Image;
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
        $this->validate($request, [
                'brand' => 'required',
                'img'   => 'required',
            ]);
        $file = $request->file('img');
        if (!empty($file)) {
            $ex = $file->getClientOriginalExtension();
            $fileName = str_slug($request->brand).'.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(100, 50);
            $img->save(public_path("brands/". $fileName));
        }
    	Brand::create([
    	    		'brand' => $request->brand,
    	    		'slug' => str_slug($request->brand),
    	    	]);
    	return back();
    }

    public function update(Request $request, $id){
        $this->validate($request, [
                'brand' => 'required',
                'img'   => 'required',
            ]);
    	$brands = Brand::find($id);
        $path   = public_path("brands/".$brands->slug.'.png' );
            if (File::exists($path)) {
                File::delete($path);
            }
        $file = $request->file('img');
        if (!empty($file)) {
            $ex = $file->getClientOriginalExtension();
            $fileName = str_slug($request->brand).'.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(100, 50);
            $img->save(public_path("brands/". $fileName));
        }
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
