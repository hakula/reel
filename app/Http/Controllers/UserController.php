<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    /**
     * Show the form for editing a user.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
		return view('users.edit', [
			'user' => $user,
		]);
    }

    /**
     * Update a user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
	    $user->update($request->input('attributes'));
	    return redirect(sprintf('/users/%s/edit', $user->id));
    }

    /**
     * Remove a user from storage.
     *
     * @param  int  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
