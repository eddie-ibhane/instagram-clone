<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index($user){
        $user = User::findOrFail($user);
        // dd($user);

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // dd($follows);
        return view('profiles.index', compact('user', 'follows'));
    }

    public function edit( User $user){
        $this->authorize('update', $user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function update( User $user){
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            // 'name' =>           'required',
            // 'username' =>       'required',
            'title' =>          '',
            'description' =>    '',
            'url' =>            'url',
            'image' =>          '',
        ]);
        // $user->profile->update($data);

        if (request('image')) {
            $imagepath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagepath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagepath];
        }
        // dd(array_merge(
        //     $data,
        //     ['image' => $imagepath,
        // ]));
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect("/profile/{$user->id}"); 

    }
}
