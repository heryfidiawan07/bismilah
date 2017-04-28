<?php

namespace App\Http\Controllers;

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
        $brand      = Brand::whereSlug($slug)->first();
        $mobils     = Mobil::where('brand_id',$brand->id)->latest()->paginate(4);
        return view('mobil.index', compact('mobils','brand'));
    }

    public function create(){
        $mobils = Mobil::get();
        $brands = Brand::orderBy('brand')->get();
        return view('mobil.create', compact('brands','mobils'));
    }

    public function store(Request $request){
        Mobil::create([
                    'brand_id' => $request->brand_id,
                    'depan' => $request->depan,
                    'samping' => $request->samping,
                    'belakang' => $request->belakang,
                    'model' => $request->model,
                    'tipe' => $request->tipe,
                    'slug' => str_slug($request->model.'-'.$request->tipe),
                    'harga' => $request->harga,
                    'transmisi' => $request->transmisi,
                    'cc' => $request->cc,
                    'bakar' => $request->bakar,
                ]);
        return back();
    }

    public function show($brand, $slugModel){
        $mobil      = Mobil::whereSlug($slugModel)->first();
        $brand      = Brand::whereSlug($brand)->first();
        return view('mobil.show', compact('mobil','marketings','brand'));
    }

    public function edit($id){
        $mobil       = Mobil::whereId($id)->first();
        $brands      = Brand::orderBy('brand')->get();
        return view('mobil.edit', compact('mobil', 'brands'));
    }
    
    public function update(Request $request, $id){
        $mobil = Mobil::find($id);
        $mobil->update([
                    'brand_id' => $request->brand_id,
                    'depan' => $request->depan,
                    'samping' => $request->samping,
                    'belakang' => $request->belakang,
                    'model' => $request->model,
                    'tipe' => $request->tipe,
                    'slug' => str_slug($request->model.'-'.$request->tipe),
                    'harga' => $request->harga,
                    'transmisi' => $request->transmisi,
                    'cc' => $request->cc,
                    'bakar' => $request->bakar,
                ]);
        $brand = Brand::whereId($mobil->brand_id)->first();
        return redirect('/'.$brand->slug);
    }
    
    public function destroy($id){
        $mobil = Mobil::find($id);
        $mobil->delete();
        return back();
    }

}
