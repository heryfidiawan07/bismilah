<?php

namespace App\Http\Controllers;

use File;
use Auth;
use Image;
use App\User;
use App\Area;
use App\Brand;
use App\Mobil;
use App\Tipe;
use App\Marketing;
use App\Pembayaran;
use Illuminate\Http\Request;
use App\Mail\KonfirmasiMarketing;
use Illuminate\Support\Facades\Mail;

class MarketingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['area','show']]);
    }

    public function index(){
    	$marketings = Marketing::get();
    	$brands		= Brand::all();
    	$areas	    = Area::all();
        $users      = User::all();
    	return view('marketings.marketings', compact('marketings', 'brands', 'areas','users'));
    }

    public function store(Request $request){
        $this->validate($request, [
                'brand_id' => 'required',
                'area_id' => 'required',
                'name' => 'required',
                'img' => 'required|max:3500',
                'pt' => 'required',
                'alamat' => 'required',
                'hp1' => 'required',
                'hp2' => 'required',
                'tentang' => 'required|max:100',
                'user_id' => 'required',
            ]);
        $time = date('Y-m-d-H-i-s');
        $file = $request->file('img');
        if (!empty($file)) {
            $ex = $file->getClientOriginalExtension();
            $fileName = $request->user_id.'-'.$time.'-kampusmobil.'.$ex;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(300, 250);
            $img->save(public_path("marketingImg/". $fileName));
        }
    	Marketing::create([
    	    		'name' => $request->name,
    	    		'slug' => str_slug($request->name),
    	    		'img' => $fileName,
    	    		'pt' => $request->pt,
    	    		'alamat' => $request->alamat,
    	    		'hp1' => $request->hp1,
    	    		'hp2' => $request->hp2,
    	    		'tentang' => $request->tentang,
    	    		'brand_id' => $request->brand_id,
    	    		'area_id' => $request->area_id,
                    'user_id' => $request->user_id,
    	    		'iklan' => $request->iklan,
    	    	]);
    	return redirect('/admin/marketings');
    }

    public function edit($id){
    	$sales 		  = Marketing::whereId($id)->first();
    	$brands		  = Brand::all();
    	$areas		  = Area::all();
        $users        = User::all();
    	return view('marketings.edit', compact('sales', 'brands', 'areas','users'));
    }
    
    public function update(Request $request, $id){
    	$marketing = Marketing::find($id);
        $this->validate($request, [
                'brand_id' => 'required',
                'area_id' => 'required',
                'name' => 'required',
                'pt' => 'required',
                'alamat' => 'required',
                'hp1' => 'required',
                'hp2' => 'required',
                'tentang' => 'required|max:100',
                'user_id' => 'required',
            ]);
        $user   = $request->user_id;
        $file = $request->file('img');
        if (!empty($file)) {
            $ex = $file->getClientOriginalExtension();
            $fileName = $marketing->img;
            $path     = $file->getRealPath();
            $img      = Image::make($path)->resize(300, 250);
            $img->save(public_path("marketingImg/". $fileName));
        }else {
            $fileName = $marketing->img;
        }
    	$marketing->update([
    	    		'name' => $request->name,
    	    		'slug' => str_slug($request->name),
    	    		'img' => $fileName,
    	    		'pt' => $request->pt,
    	    		'alamat' => $request->alamat,
    	    		'hp1' => $request->hp1,
    	    		'hp2' => $request->hp2,
    	    		'tentang' => $request->tentang,
    	    		'brand_id' => $request->brand_id,
    	    		'area_id' => $request->area_id,
                    'user_id' => $request->user_id,
    	    		'iklan' => $request->iklan,
    	    	]);
        if ($request->iklan == 1) {
            Mail::to($marketing->user->email)->send(new KonfirmasiMarketing($marketing));
        }
    	return redirect('/admin/marketings');
    }
    
    public function destroy($id){
    	$marketings = Marketing::find($id);
        $path   = public_path("marketingImg/".$marketings->img );
        if (File::exists($path)) {
            File::delete($path);
            $marketings->save();
            $marketings->delete();
        }
        $marketings->delete();
        return back();
    }

    public function area($brand, $area){
        $brand = Brand::whereSlug($brand)->first();
        $area  = Area::whereSlug($area)->first();
        $sales = Marketing::where([['brand_id',$brand->id],['area_id',$area->id]])->first();
        return response()->json($sales);
    }

    public function show($slug){
        $sales = Marketing::where([['slug',$slug],['iklan',1]])->first();
        if ($sales) {
            $mobils = Mobil::where('brand_id',$sales->brand_id)->get();
            return view('marketings.show', compact('sales','mobils'));
        }
        return redirect('/');
        
    }

    public function indexPembayaran(){
        $bayar = Pembayaran::paginate(6);
        return view('marketings.checkout', compact('bayar'));
    }

    public function showPembayaran($id){
        $bayar = Pembayaran::where('sales_id',$id)->first();
        if (!$bayar) {
            return redirect('/admin/marketings');    
        }
        return view('marketings.bukti', compact('bayar'));
    }

    public function deletePembayaran($id){
        $bayar = Pembayaran::find($id);
        $bayar->delete();
        return redirect('/admin/marketings');
    }

}
