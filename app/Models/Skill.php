<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
	public function applicant() 
	{
		return $this->belongsTo(Applicant::class);
	}
}
