<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Like;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth:users');
    }

    // 引数のidに紐づくitemにlikeする
    public function like($id){
        Like::create([
            'item_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function unlike($id){
        $like = Like::where('item_id',$id)->where('user_id',Auth::id())->first();
        $like->delete();

        return redirect()->back();
    }
}
