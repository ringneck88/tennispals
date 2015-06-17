<?php
namespace App\Models;


// use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Track extends Model implements AuthenticatableContract, CanResetPasswordContract {
    use Authenticatable, CanResetPassword;

    protected $table      = 'track';
   	protected $primaryKey = 'track_id';
    protected $fillable = ['track_title', 'track_url'];
    

	public function comments(){

		return $this->hasMany('App\Models\TrackComment');

	}


	public function user(){

		return $this->belongsTo('App\User');

	}

	public function tracks(){

		return $this->belongsTo('App\Models\TrackComment');

	}

		



}