<?php

namespace App\Http\Controllers;

use Auth;
use Purifier;
use App\Forum;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{		
		public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $slug){
        $this->validate($request, [
                'body' => 'required|min:3',
            ]);
    	$thread = Forum::whereSlug($slug)->first();
    	Comment::create([
    		'body' => Purifier::clean($request->body),
    		'forum_id' => $thread->id,
    		'user_id'  => Auth::user()->id,
    	]);
    	return back();
    }

    public function update(Request $request, $id){
        $this->validate($request, [
                'body' => 'required|min:3',
            ]);
		$comments = Comment::whereId($id)->first();
		$comments->update([
			'body' => Purifier::clean($request->body),
		]);
		return back();
    }
    
}
