<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    // if the table in the db not the same name 
    // write this code 
    //  protected $table = 'my_offers';

    protected $fillable=['id','name','price','details','created_at','updated_at'];
    protected $hidden=['created_at','updated_at',];
    // public    $timestamps=false;

}
