<?php

namespace App\Http\Controllers;

use App\Area;
use App\Spek;
use App\Brand;
use App\Forum;
use App\Mobil;
use App\Article;
use App\Marketing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $articles  = Article::latest()->paginate(2);
        $threads   = Forum::latest()->paginate(3);
        
        return view('home', compact('articles','threads'));
    }

    public function cari($brand, $area){
        $sales = Marketing::where([['brand_id',$brand],['area_id',$area]])->first();
        return response()->json($sales);
    }

    public function syarat(){
        return view('users.syarat');
    }
    

}
