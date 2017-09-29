<?php

namespace App\Http\Controllers;

use Auth;
use App\Brand;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['show','index','brand']]);
    }

    public function index(){
    	$videos   = Video::latest()->paginate(8);
    	return view('videos.index', compact('videos'));
    }

    public function brand($brand){
        $brand     = Brand::whereSlug($brand)->first();
        $videos    = Video::where('brand_id',$brand->id)->latest()->paginate(8);
        return view('videos.index', compact('videos'));
    }

    public function create(){
				$brands		  = Brand::all();
				return view('videos.create', compact('brands'));
    }

    public function store(Request $request){
        $this->validate($request, [
                'title' => 'required|unique:forums|max:255',
                'link' => 'required|max:500',
                'brand_id' => 'required',
            ]);
    	Video::create([
    	    		'title' => $request->title,
    	    		'slug' => str_slug($request->title),
    	    		'link' => $request->link,
    	    		'brand_id' => $request->brand_id,
    	    	]);
    	return redirect('/videos');
    }

    public function show($brand, $slug){
      $brand   = Brand::whereSlug($brand)->first();
    	$video   = Video::whereSlug($slug)->first();
        if ($video && $brand) {
            return view('videos.show', compact('video','brand'));
        }
            return redirect('/videos');
    }

    public function edit($id){
	    	$video   = Video::whereId($id)->first();
	    	$brands	 = Brand::all();
	    	return view('videos.edit', compact('video', 'brands'));
    }

    public function update(Request $request, $id){
    	$video = Video::find($id);
    	$video->update([
    	    		'title' => $request->title,
    	    		'slug' => str_slug($request->title),
    	    		'link' => $request->link,
    	    		'brand_id' => $request->brand_id,
    	    	]);
    	return redirect('/videos');
    }

    public function destroy($id){
	    	$video = Video::find($id);
	    	$video->delete();
	    	return back();
    }

}
