<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
	
	public function job() 
	{
		return $this->belongsTo(Job::class);
	}
	
	public function skills() 
	{
		return $this->hasMany(Skill::class);
	}
}
