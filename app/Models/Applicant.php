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
	
	/**
     * Get applicant job.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function job() 
	{
		return $this->belongsTo(Job::class);
	}
	
	/**
     * Get applicant skills.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function skills() 
	{
		return $this->hasMany(Skill::class);
	}
}
