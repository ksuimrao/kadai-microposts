<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {   //もしログインしていたら
            $user = \Auth::user();  //$userにログインしているuser代入して
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10); //そのユーザーの投稿を降順で代入して
            
            $data = [
                'user' => $user,    //ユーザーを表示
                'microposts' => $microposts,    //投稿を表示
            ];
        }
        
        return view('welcome', $data);
    }
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->microposts()->create([
            'content' => $request->content,
        ]);

        return back();
    }
    
    
    public function destroy($id)
    {
        $micropost = \App\Micropost::find($id);

        if (\Auth::id() === $micropost->user_id) {
            $micropost->delete();
        }

        return back();
    }
}
