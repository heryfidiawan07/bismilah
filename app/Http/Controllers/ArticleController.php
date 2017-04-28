<?php

namespace App\Http\Controllers;

use Purifier;
use App\Brand;
use App\Article;
use App\Marketing;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['show','index']]);
    }

    public function index(){
    	$articles   = Article::latest()->paginate(4);
    	return view('articles.index', compact('articles'));
    }

    public function create(){
		$brands		  = Brand::all();
		return view('articles.create', compact('brands'));
    }

    public function store(Request $request){
        $this->validate($request, [
                'title' => 'required|unique:forums|max:255',
                'body' => 'required|max:10000',
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
        if ($article && $brand) {
            return view('articles.show', compact('article','brand'));
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
