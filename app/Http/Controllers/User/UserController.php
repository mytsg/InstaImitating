<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;

class UserController extends Controller
{
    public function profile($id){
        $user = User::findOrFail($id);
        $items = Item::where('user_id',$user->id)
                ->orderBy('created_at','desc')
                ->get();

        return view('user.profile',compact('user','items'));
        // dd('ユーザーのプロフィール画面です。');
    }
}
