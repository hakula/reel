<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;

class UserApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('users.applicants.list', [
	        'applicants' => $user->applicants()->paginate(10),
	        'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  User $user, Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  User $user, Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  User $user, Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  User $user, Applicant $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Applicant $applicant)
    {
        //
    }
}
