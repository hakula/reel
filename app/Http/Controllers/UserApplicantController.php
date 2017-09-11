<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;

class UserApplicantController extends Controller
{
	/**
     * Create a new UserApplicantController.
     *     
     * @return void
     */
	public function __construct()
	{
		// Protect routes
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the applicants for a given user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('users.applicants.list', [
	        'applicants' => $user->applicants()->orderBy('created_at', 'desc')->paginate(10),
	        'user' => $user,
        ]);
    }
}
