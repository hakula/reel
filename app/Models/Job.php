<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
	public function applicants()
	{
		return $this->hasMany(Applicant::class);
	}
	
	public function skills() 
	{		
		return $this->hasManyThrough(Skill::class, Applicant::class);
	}
	
	public function user() 
	{
		return $this->belongsTo(User::class);
	}
}
