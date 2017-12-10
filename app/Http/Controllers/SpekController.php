<?php

namespace App\Http\Controllers;

use Purifier;
use App\Spek;
use App\Brand;
use App\Mobil;
use App\Article;
use App\Forum;
use App\Video;
use App\Marketing;
use Illuminate\Http\Request;

class SpekController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['show','index','model']]);
    }

    public function index(){
    	$speks   = Spek::latest()->paginate(8);
        $articles   = Article::latest()->paginate(2);
        $threads   = Forum::latest()->paginate(3);
        $videos   = Video::latest()->paginate(2);
    	return view('speks.index', compact('speks','articles','threads','videos'));
    }

    public function model($model){
        $mobil = Mobil::where('slug',$model)->first();
        $speks = Spek::where('mobil_id',$mobil->id)->latest()->paginate(8);

        $brand     = $mobil->brand()->first();
        $threads   = $brand->forums()->latest()->paginate(3);
        $articles  = $brand->articles()->latest()->paginate(2);
        $videos     = $brand->videos()->latest()->paginate(2);
        return view('speks.index', compact('speks','articles','threads','videos'));
    }
            
    public function create(){
		$mobils = Mobil::orderBy('brand_id')->get();
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
        $mobils    = Mobil::whereSlug($model)->first();
        $brand     = Brand::whereId($mobils->brand_id)->first();
    	$spek  	   = Spek::where([['mobil_id',$mobils->id],['slug',$title]])->first();
        
        $threads   = $brand->forums()->latest()->paginate(3);
        $articles  = $brand->articles()->latest()->paginate(2);
        $videos     = $brand->videos()->latest()->paginate(2);
        if ($spek) {
            return view('speks.show', compact('spek','brand','articles','threads','videos'));
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
