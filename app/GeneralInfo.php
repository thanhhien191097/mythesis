<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralInfo extends Model
{

    protected $table = 'generalinfo';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'job', 'age', 'address'
    ];
}
