<?php

namespace App\Http\Controllers;

use Purifier;
use App\Spek;
use App\Brand;
use App\Video;
use App\Forum;
use App\Article;
use App\Marketing;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['show','index','brand']]);
    }

    public function index(){
    	$articles   = Article::latest()->paginate(8);
        $threads   = Forum::latest()->paginate(4);
        $videos   = Video::latest()->paginate(4);
        $speks   = Spek::latest()->paginate(4);
    	return view('articles.index', compact('articles','videos','threads','speks'));
    }

    public function brand($brand){
        $brand      = Brand::whereSlug($brand)->first();
        $articles   = Article::where('brand_id',$brand->id)->latest()->paginate(8);
        $threads   = $brand->forums()->latest()->paginate(3);
        $videos   = $brand->videos()->latest()->paginate(4);
        $speks   = $brand->speks()->latest()->paginate(2);
        return view('articles.index', compact('articles','threads','videos','speks'));
    }

    public function create(){
		$brands		  = Brand::all();
		return view('articles.create', compact('brands'));
    }

    public function store(Request $request){
        $this->validate($request, [
                'title' => 'required|unique:forums|max:255',
                'body' => 'required',
                'brand_id' => 'required',
            ]);
    	Article::create([
    	    		'title' => $request->title,
    	    		'slug' => str_slug($request->title),
                    'img' => $request->img,
    	    		'body' => Purifier::clean($request->body, array('Attr.EnableID' => true)),
    	    		'brand_id' => $request->brand_id,
    	    	]);
    	return redirect('/articles');
    }

    public function show($brand, $slug){
        $brand     = Brand::whereSlug($brand)->first();
    	$article   = Article::whereSlug($slug)->first();
        $threads   = $brand->forums()->latest()->paginate(4);
        $videos   = $brand->videos()->latest()->paginate(4);
        $speks   = $brand->speks()->latest()->paginate(4);

        if ($article && $brand) {
            return view('articles.show', compact('article','brand','threads','videos','speks'));
        }

        return redirect('/articles');
    }

    public function edit($id){
    	$article   = Article::whereId($id)->first();
    	$brands	   = Brand::all();
    	return view('articles.edit', compact('article', 'brands'));
    }
    
    public function update(Request $request, $id){
    	$articles = Article::find($id);
    	$articles->update([
    	    		'title' => $request->title,
    	    		'slug' => str_slug($request->title),
    	    		'img' => $request->img,
    	    		'body' => Purifier::clean($request->body, array('Attr.EnableID' => true)),
    	    		'brand_id' => $request->brand_id,
    	    	]);
    	return redirect('/articles');
    }
    
    public function destroy($id){
    	$article = Article::find($id);
    	$article->delete();
    	return back();
    }

}
