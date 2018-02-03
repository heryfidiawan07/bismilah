<?php

namespace App\Http\Controllers;

use File;
use Image;
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
        
        $url      = $request->img;
        $ex = substr($url, strrpos($url, '.') + 1);
        $img      = Image::make($url)->resize(1200, 630);
        $fileName = str_slug($request->title).'.'.$ex;
        $img->save(public_path("articlesImg/". $fileName));

        $slug = str_slug($request->title);
    	Article::create([
    	    		'title' => $request->title,
    	    		'slug' => $slug,
                    'img' => $fileName,
    	    		'body' => Purifier::clean($request->body, array('Attr.EnableID' => true)),
    	    		'brand_id' => $request->brand_id,
    	    	]);
        $brand = Brand::whereId($request->brand_id)->first();
        return redirect("/articles/{$brand->slug}/{$slug}");
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
        if ($articles->img != $request->img) {
            $url      = $request->img;
            $ex = substr($url, strrpos($url, '.') + 1);
            $img      = Image::make($url)->resize(1200, 630);
            $fileName = str_slug($request->title).'.'.$ex;
                $cek   = public_path("articlesImg/".$articles->img);
                File::delete($cek);
            $img->save(public_path("articlesImg/". $fileName));   
        }else {
            $fileName = $articles->img;
        }
        $slug = str_slug($request->title);
    	$articles->update([
    	    		'title' => $request->title,
    	    		'slug' => $slug,
    	    		'img' => $fileName,
    	    		'body' => Purifier::clean($request->body, array('Attr.EnableID' => true)),
    	    		'brand_id' => $request->brand_id,
    	    	]);
    	$brand = Brand::whereId($request->brand_id)->first();
        return redirect("/articles/{$brand->slug}/{$slug}");
    }
    
    public function destroy($id){
    	$article = Article::find($id);
    	$article->delete();
    	return back();
    }

}
