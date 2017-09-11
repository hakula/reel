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
    
    /**
     * Get job applicants.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function applicants()
	{
		return $this->hasMany(Applicant::class);
	}
	
	/**
     * Get job skills.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
	public function skills() 
	{		
		return $this->hasManyThrough(Skill::class, Applicant::class);
	}
	
	/**
     * Get job user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function user() 
	{
		return $this->belongsTo(User::class);
	}
}
