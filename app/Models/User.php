<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];    
    
    /**
     * Get user applicants.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function applicants() 
    {
	    return $this->hasManyThrough(Applicant::class, Job::class);
    }
    
    /**
     * Get user jobs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
	    return $this->hasMany(Job::class);
    }
}
