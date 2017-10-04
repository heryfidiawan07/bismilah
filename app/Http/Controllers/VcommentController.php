<?php

namespace App\Http\Controllers;

use Auth;
use Purifier;
use App\Video;
use App\Vcomment;
use Illuminate\Http\Request;

class VcommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $slug){
        $this->validate($request, [
                'body' => 'required|min:3',
            ]);
    	$thread = Video::whereSlug($slug)->first();
    	Vcomment::create([
    		'body' => Purifier::clean($request->body),
    		'video_id' => $thread->id,
    		'user_id'  => Auth::user()->id,
    	]);
    	return back();
    }

    public function update(Request $request, $id){
        $this->validate($request, [
                'body' => 'required|min:3',
            ]);
		$comments = Vcomment::whereId($id)->first();
		$comments->update([
			'body' => Purifier::clean($request->body),
		]);
		return back();
    }

}
