<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('user.editForm', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|min:4|max:255',
            'email' => 'required|email',
            'avatar' => 'required|mimes:jpg,jpeg,png,gif|max:1024'
        ]);


        $avatarName = $request->avatar->getClientOriginalName();
        $request->avatar->storeAs('images', $avatarName, 'public');


        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->avatar = $avatarName;

        $user->save();

        return redirect()->route('post.index');

    }
}
