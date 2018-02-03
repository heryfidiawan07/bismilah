<?php

namespace App\Http\Controllers;

use File;
use Image;
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
        $articles  = $brand->articles()->latest()->paginate(4);
        $speks     = $brand->speks()->latest()->paginate(4);
        $videos    = $brand->videos()->latest()->paginate(4);
        $threads   = $brand->forums()->latest()->paginate(4);
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

        $url1 = $request->depan;    $url2 = $request->samping;      $url3 = $request->belakang;
        $ex1 = substr($url1, strrpos($url1, '.') + 1);
        $ex2 = substr($url2, strrpos($url2, '.') + 1);
        $ex3 = substr($url3, strrpos($url3, '.') + 1);
        $img1  = Image::make($url1)->resize(1200, 630);
        $img2  = Image::make($url2)->resize(1200, 630);
        $img3  = Image::make($url3)->resize(1200, 630);
        $depan    = str_slug($request->model).'-1'.'.'.$ex1;
        $samping  = str_slug($request->model).'-2'.'.'.$ex2;
        $belakang = str_slug($request->model).'-3'.'.'.$ex3;
        $img1->save(public_path("model/". $depan));
        $img2->save(public_path("model/". $samping));
        $img3->save(public_path("model/". $belakang));

        Mobil::create([
                    'brand_id' => $request->brand_id,
                    'depan' => $depan,
                    'samping' => $samping,
                    'belakang' => $belakang,
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
        
        if ($request->depan != $mobil->depan) {
            $url1 = $request->depan;
            $ex1 = substr($url1, strrpos($url1, '.') + 1);
            $img1  = Image::make($url1)->resize(1200, 630);
            $depan    = str_slug($request->model).'-1'.'.'.$ex1;
                $cek1 = public_path("model/".$mobil->depan);
                File::delete($cek1);
            $img1->save(public_path("model/". $depan));
        }else{
            $depan = $mobil->depan;
        }
        if ($request->samping != $mobil->samping) {
            $url2 = $request->samping;
            $ex2 = substr($url2, strrpos($url2, '.') + 1);
            $img2  = Image::make($url2)->resize(1200, 630);
            $samping  = str_slug($request->model).'-2'.'.'.$ex2;
                $cek2 = public_path("model/".$mobil->samping);
                File::delete($cek2);
            $img2->save(public_path("model/". $samping));
        }else{
            $samping = $mobil->samping;
        }
        if ($request->belakang != $mobil->belakang) {
            $url3 = $request->belakang;
            $ex3 = substr($url3, strrpos($url3, '.') + 1);
            $img3  = Image::make($url3)->resize(1200, 630);
            $belakang = str_slug($request->model).'-3'.'.'.$ex3;
                $cek3 = public_path("model/".$mobil->belakang);
                File::delete($cek3);
            $img3->save(public_path("model/". $belakang));
        }else{
            $belakang = $mobil->belakang;
        }
        $mobil->update([
                    'brand_id' => $request->brand_id,
                    'depan' => $depan,
                    'samping' => $samping,
                    'belakang' => $belakang,
                    'model' => $request->model,
                    'slug' => str_slug($request->model),
                ]);
        $brand = Brand::whereId($mobil->brand_id)->first();
        return redirect("/profil/{$brand->slug}/{$mobil->slug}");
    }
    
    public function destroy($id){
        $mobil = Mobil::find($id);
        $mobil->delete();
        return back();
    }

}
