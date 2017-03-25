<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfilesController extends Controller
{

    public function index($slug)
    {

        $user = User::where('slug', $slug)->first();

        return view('profiles.profile')
            ->with('user', $user);
    }


    public function edit()
    {

        return view('profiles.edit')
            ->with('info', Auth::user()->profile);

    }

    public function update(Request $r)
    {

        $this->validate($r, [
            'location'  => 'required',
            'about'     => 'required|max:255',
        ]);

        Auth::user()->profile()->update([
            'location' => $r->get('location'),
            'about' => $r->get('about')
        ]);


        if ($r->hasFile('avatar'))
        {

            Auth::user()->update([
                'avatar' => $r->file('avatar')->store('public/avatars')
            ]);

        }


        Session::flash('success', 'Profile update.');

        return redirect()->back();
    }

}
