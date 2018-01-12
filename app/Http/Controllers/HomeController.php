<?php

namespace App\Http\Controllers;

use App\Link;
use App\Area;
use App\Spek;
use App\Brand;
use App\Forum;
use App\Mobil;
use App\Article;
use App\Video;
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
        $articles  = Article::latest()->paginate(4);
        $threads   = Forum::latest()->paginate(4);
        $videos   = Video::latest()->paginate(4);
        $speks     = Spek::latest()->paginate(4);
        return view('home', compact('articles','threads','videos','speks'));
    }

    public function cari($brand, $area){
        $sales = Marketing::where([['brand_id',$brand],['area_id',$area],['iklan',1]])->first();
        $link = $sales->link()->first();
        return response()->json(array('sales' => $sales, 'link' => $link));
    }

    public function syarat(){
        return view('users.syarat');
    }
    

}
