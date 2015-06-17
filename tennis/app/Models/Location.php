<?php
namespace App\Models;


// use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use App;

class Location extends Eloquent {
    

    protected $table      = 'location';
    protected $fillable = ['name', 'comment', 'address', 'city', 'st', 'zip', 'lat', 'long'];
   
    // protected $fillable = ['track_title', 'track_url'];
    

	// public function comments(){

	// 	return $this->hasMany('App\Models\TrackComment');

	// }


	// public function user(){

	// 	return $this->belongsTo('App\User');

	// }

	// public function tracks(){

	// 	return $this->belongsTo('App\Models\TrackComment');

	// }

		



}