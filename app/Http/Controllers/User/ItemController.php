<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth:users');
    }

    public function index()
    {
        $items = Item::select('id','user_id','information','filename','created_at')
                ->orderBy('created_at','desc')
                ->paginate(10);

        return view('user.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'information' => 'required|string|max:200',
            
        ]);

        $imageFile = $request->image;
        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName.'.'.$extension;
        $resizedImage = InterventionImage::make($imageFile)->resize(1280,1280)->encode();

        // dd($resizedImage);

        Storage::put('public/items/'.$fileNameToStore,$resizedImage);

        Item::create([
            'information' => $request->information,
            'user_id' => Auth::id(),
            'filename' => $fileNameToStore,
        ]);

        return redirect()->route('user.items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        $users = array();
        foreach($item->likes as $like){
            array_push($users, $like->user);
        }

        dd($users);

        return view('user.items.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
