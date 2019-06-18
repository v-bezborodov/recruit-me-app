<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = ['id', 'user_id', 'position', 'description', 'company', 'attached', 'status'];
    protected $guarded = [];

    protected $with = ['user', 'country'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function country()
    {
        return $this->belongsTo('App\Countries');
    }

}
