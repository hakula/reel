<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	public function applicants()
	{
		return $this->hasMany(Applicant::class);
	}
	
	public function user() 
	{
		return $this->belongsTo(User::class);
	}
}
