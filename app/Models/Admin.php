<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;
    protected $guard = 'admin';
	
    protected $fillable = [
        'name',
        'user_code', 		
		'email', 
		'password',
    ];
	
    protected $hidden = [
        'password', 
		'remember_token',
    ];
}
