<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'phone', 'email', 'password', 'firstname', 'middlename', 'lastname', 'dod', 'address',
        'activated', 'completejobs', 'rating', 'numofrating', 'resident', 'residentlga',
        'lastlocation','skill1','skill2','ref','image'
    ];

    protected $hidden = ['password', 'remember_token'];
}
