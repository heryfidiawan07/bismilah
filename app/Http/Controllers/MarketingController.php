<?php

namespace App\Http\Controllers;

use File;
use Auth;
use Image;
use App\User;
use App\Area;
use App\Article;
use App\Forum;
use App\Spek;
use App\Brand;
use App\Mobil;
use App\Tipe;
use App\Video;
use App\Marketing;
use App\Link;
use App\Pembayaran;
use Illuminate\Http\Request;
use App\Mail\KonfirmasiMarketing;
use Illuminate\Support\Facades\Mail;

class MarketingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except'=>['area','show','dealer']]);
    }

    public function index(){
    	$marketings = Marketing::orderBy('brand_id')->get();
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
            $img      = Image::make($path)->resize(500, 400);
            $img->save(public_path("marketingImg/". $fileName));
        }
    	Marketing::create([
    	    		'name' => $request->name,
    	    		'slug' => str_slug($request->name),
    	    		'img' => $fileName,
    	    		'pt' => $request->pt,
    	    		'alamat' => $request->alamat,
    	    		'hp1' => ltrim($request->hp1,'0'),
    	    		'hp2' => ltrim($request->hp2,'0'),
    	    		'tentang' => $request->tentang,
    	    		'brand_id' => $request->brand_id,
    	    		'area_id' => $request->area_id,
                    'user_id' => $request->user_id,
    	    		'iklan' => $request->iklan,
    	    	]);
    	return redirect('/admin/marketings');
    }

    public function link(Request $request, $sid)
    {   $sales = Marketing::whereId($sid)->first();
        $link = Link::where('marketing_id', $sid)->first();
        if (count($link) > 0) {
            $link->update([
                    'link' => $request->link,
                ]);
        }else{
            Link::create([
                'marketing_id' => $sid,
                'link' => $request->link,
            ]);
        }
        return back();
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
            $img      = Image::make($path)->resize(500, 400);
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
    	    		'hp1' => ltrim($request->hp1,'0'),
    	    		'hp2' => ltrim($request->hp2,'0'),
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
        $sales = Marketing::where([['brand_id',$brand->id],['area_id',$area->id],['iklan',1]])->first();
        $link = $sales->link()->first();
        return response()->json(array('sales' => $sales, 'link' => $link));
    }

    public function show($slug){
        $sales = Marketing::where([['slug',$slug],['iklan',1]])->first();
        if ($sales) {
            $mobils = Mobil::where('brand_id',$sales->brand_id)->get();
            //$brand     = $mobils->brand()->first();
            $brand     = Brand::whereId($sales->brand_id)->first();
            $articles  = $brand->articles()->latest()->paginate(4);
            $speks     = $brand->speks()->latest()->paginate(4);
            $videos    = $brand->videos()->latest()->paginate(4);
            $threads   = $brand->forums()->latest()->paginate(4);
            return view('marketings.show', compact('sales','mobils','articles','speks','videos','threads'));
        }
        return redirect('/');
        
    }

    public function dealer($slug, $area){
        $brand = Brand::where('slug',$slug)->first();
        $area  = Area::where('slug',$area)->first();
        
        if ($brand && $area) {
            $sales = Marketing::where([['brand_id',$brand->id],['iklan',1],['area_id',$area->id]])->first();
        
            $mobils    = Mobil::where('brand_id',$brand->id)->get();
            $articles  = $brand->articles()->latest()->paginate(4);
            $speks     = $brand->speks()->latest()->paginate(4);
            $videos    = $brand->videos()->latest()->paginate(4);
            $threads   = $brand->forums()->latest()->paginate(4);
            return view('marketings.index', compact('sales','mobils','articles','speks','videos','threads','area','brand'));
        }else{
            return redirect('/');
        }
        
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
