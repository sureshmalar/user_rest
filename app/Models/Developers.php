<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Developers extends Model
{
    use HasFactory;
    protected $table = 'developers';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name', 
        'last_name',
        'email', 
        'password',
        'confirm_password',
        'phone_number', 
        'address', 
        'profile_pic'
    ];

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($pass)
    {

      $this->attributes['password'] = Hash::make($pass);
    }
}
