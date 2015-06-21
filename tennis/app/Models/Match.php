<?php
namespace App\Models;




use Illuminate\Auth\Authenticatable;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use App;
use App\Models;
use App\Models\Location;
use App\Models\Match;

class Match extends Eloquent {
    

    protected $table      = 'match';
    protected $fillable = ['user_id', 'match_date', 'match_time', 'comment', 'opponent_id', 'location_id', 'open_date_time', 'close_date_time'];
   
    

	public function prettydate($datetime) {

		return strftime('%Y-%m-%dT%H:%M:%S', strtotime($datetime));

	}



	public function location(){

		return $this->belongsTo('App\Models\Location');

	}

	public function user(){

		return $this->belongsTo('App\User');

	}

		



}