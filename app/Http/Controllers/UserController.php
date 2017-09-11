<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{   
	/**
     * Create a new UserController.
     *     
     * @return void
     */ 
	public function __construct() 
	{
		// Protect routes
		$this->middleware('auth');
	}
	
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
    public function update(UpdateUserRequest $request, User $user)
    {
	    // Update user
	    $user->update($request->input('attributes'));
	    
	    // Return to dashboard
	    return redirect('/home');
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
