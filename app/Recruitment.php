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

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
//
//$table->bigIncrements('id')->unique()->unsigned();
//$table->unsignedBigInteger('user_id')->onDelete('cascade')->onUpdate('cascade');
//$table->string('position');
//$table->string('description');
//$table->string('company');
//$table->string('attached')->nullable();
//$table->string('status')->nullable();
//$table->timestamps();
}
