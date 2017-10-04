<?php

namespace App\Http\Controllers;

use Auth;
use App\Brand;
use App\Mobil;
use App\Video;
use App\Vcomment;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['show','index','model','brand']]);
    }

    public function index(){
    	$videos   = Video::latest()->paginate(8);
    	return view('videos.index', compact('videos'));
    }

    public function model($model){
        $mobil  = Mobil::where('slug',$model)->first();
        $videos = Video::where('mobil_id',$mobil->id)->latest()->paginate(4);
        return view('videos.index', compact('videos'));
    }

    public function brand($brand){
        $brand  = Brand::where('slug',$brand)->first();
        $videos = Video::where('brand_id',$brand->id)->latest()->paginate(4);
        return view('videos.index', compact('videos'));
    }

    public function create(){
		$mobils = Mobil::orderBy('brand_id')->get();
		return view('videos.create', compact('mobils'));
    }

    public function store(Request $request){
        $this->validate($request, [
                'title' => 'required|unique:forums|max:255',
                'link' => 'required|max:500',
                'mobil_id' => 'required',
                'brand_id' => 'required',
            ]);
    	Video::create([
    	    		'title' => $request->title,
    	    		'slug' => str_slug($request->title),
    	    		'link' => $request->link,
    	    		'mobil_id' => $request->mobil_id,
                    'brand_id' => $request->brand_id,
    	    	]);
    	return redirect('/videos');
    }

    public function show($model, $slug){
        $mobils    = Mobil::whereSlug($model)->first();
        $brand     = Brand::whereId($mobils->brand_id)->first();
        $video     = Video::where([['mobil_id',$mobils->id],['slug',$slug]])->first();
        if ($video) {
            $comments   = $video->vcomments()->latest()->paginate(5);
            return view('videos.show', compact('video','brand','comments'));
        }
            return redirect('/videos');

    }

    public function edit($id){
        $mobils = Mobil::orderBy('brand_id')->get();
    	$video   = Video::whereId($id)->first();
    	return view('videos.edit', compact('video', 'mobils'));
    }

    public function update(Request $request, $id){
    	$video = Video::find($id);
    	$video->update([
    	    		'title' => $request->title,
    	    		'slug' => str_slug($request->title),
    	    		'link' => $request->link,
    	    		'mobil_id' => $request->mobil_id,
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
