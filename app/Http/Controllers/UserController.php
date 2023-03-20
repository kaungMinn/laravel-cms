<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        return view('auth.posts.user',[
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->moto = $request->moto;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->zip_code = $request->zip_code;
        $user->about_me = $request->about_me;
        $user->save();

        return back();
        
    }
}
