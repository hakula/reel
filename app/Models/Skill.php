<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
	
	/**
     * Get skill applicant.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function applicant() 
	{
		return $this->belongsTo(Applicant::class);
	}
}
