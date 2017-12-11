<?php

namespace App\Http\Controllers;

use App\Video;
use App\Tipe;
use App\Forum;
use App\Article;
use App\Spek;
use App\Mobil;
use App\Brand;
use App\Marketing;
use Illuminate\Http\Request;

class MobilController extends Controller
{		
	public function __construct()
    {
        $this->middleware('admin', ['except'=>['show','index']]);
    }


    public function index($slug){
        $brand  = Brand::whereSlug($slug)->first();
        if (!$brand) {
            return view('errors.404');
        }
        $mobils = Mobil::where('brand_id',$brand->id)->latest()->paginate(6);
        $articles  = $brand->articles()->latest()->paginate(2);
        $speks     = $brand->speks()->latest()->paginate(6);
        $videos    = $brand->videos()->latest()->paginate(4);
        $threads   = $brand->forums()->latest()->paginate(2);
        return view('mobil.index', compact('mobils','brand','videos','articles','speks','threads'));
    }

    public function create(){
        $mobils = Mobil::orderBy('brand_id')->get();
        $brands = Brand::orderBy('brand')->get();
        return view('mobil.create', compact('brands','mobils'));
    }

    public function store(Request $request){
        $this->validate($request, [
                'brand_id' => 'required',
                'depan' => 'required',
                'samping' => 'required',
                'belakang' => 'required',
                'model' => 'required',
            ]);
        Mobil::create([
                    'brand_id' => $request->brand_id,
                    'depan' => $request->depan,
                    'samping' => $request->samping,
                    'belakang' => $request->belakang,
                    'model' => $request->model,
                    'slug' => str_slug($request->model),
                ]);
        return back();
    }

    public function show($brand, $slugModel){
        $mobil  = Mobil::whereSlug($slugModel)->first();
        $brand  = Brand::whereSlug($brand)->first();
        $types  = Tipe::where('mobil_id',$mobil->id)->get();
        $articles  = $brand->articles()->latest()->paginate(2);
        $threads   = $brand->forums()->latest()->paginate(2);
        $videos    = $mobil->videos()->latest()->paginate(2);
        $speks     = $mobil->speks()->latest()->paginate(2);
        return view('mobil.show', compact('mobil','marketings','brand','types','articles','speks','videos','threads'));
    }

    public function edit($id){
        $mobil       = Mobil::whereId($id)->first();
        $brands      = Brand::orderBy('brand')->get();
        return view('mobil.edit', compact('mobil', 'brands'));
    }
    
    public function update(Request $request, $id){
        $this->validate($request, [
                'depan' => 'required',
                'samping' => 'required',
                'belakang' => 'required',
                'model' => 'required',
            ]);
        $mobil = Mobil::find($id);
        $mobil->update([
                    'brand_id' => $request->brand_id,
                    'depan' => $request->depan,
                    'samping' => $request->samping,
                    'belakang' => $request->belakang,
                    'model' => $request->model,
                    'slug' => str_slug($request->model),
                ]);
        $brand = Brand::whereId($mobil->brand_id)->first();
        return redirect("/{$brand->slug}");
    }
    
    public function destroy($id){
        $mobil = Mobil::find($id);
        $mobil->delete();
        return back();
    }

}
