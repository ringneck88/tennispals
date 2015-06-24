<?php namespace App\Http\Controllers;


use Request;
use App\Models;
use App\Models\Match;
use App\User;
use App\Models\Location;
use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class MatchController extends Controller {

	

	public function viewAll() {

		$match = Match::all();
		return view('match.allmatch', ['matches' => $match]);
	}

	public function matchByMatch($id) {

		$currentuser = Auth::user()->id;
		$match = Match::where('id', '=', $id)->first();
		$matches =Match::where('user_id' , '!=' , $currentuser );	//so not matches from current user	
		$matches  = $matches->where('id' , '!=' , $match->id );		//remove the event we are finding matches for from the list
		if($match->gender !=  'n'){	
			$matches  = $matches->where('gender' , '=' , $match->gender);
		};
		$matches = $matches->whereBetween('ranking', [($match->ranking - 1), ($match->ranking + 1)]);

		$matches = $matches->where('open_date_time', '<', $match->close_date_time)
							->Where('close_date_time', '>', $match->open_date_time)
							->get();
		
		return view('match.allmatch', ['matches' => $matches]);
	}

	public function jsonMatchByMatch($id) {

		$currentuser = Auth::user()->id;
		$match = Match::where('id', '=', $id)->first();
		$matches =Match::with('location')->with('user')->where('user_id' , '!=' , $currentuser );	//so not matches from current user	
		$matches  = $matches->where('id' , '!=' , $match->id );		//remove the event we are finding matches for from the list
		if($match->gender !=  'n'){	
			$matches  = $matches->where('gender' , '=' , $match->gender);
		};
		$matches = $matches->whereBetween('ranking', [($match->ranking - 1), ($match->ranking + 1)]);

		$matches = $matches->where('open_date_time', '<', $match->close_date_time)
							->Where('close_date_time', '>', $match->open_date_time)
							->get();
			
	
		return  $matches;


		// $users = DB::table('users')
  //           ->join('contacts', 'users.id', '=', 'contacts.user_id')
  //           ->join('orders', 'users.id', '=', 'orders.user_id')
  //           ->select('users.*', 'contacts.phone', 'orders.price')
  //           ->get();
	}


	public function viewAllByUser($id) {

		$match = Match::where('user_id', '=', $id)->get();

		return view('/match/allmatch',	['matches' => $match]);
	}


	public function jsonViewAllByUser($id) {

		$match = Match::with('location')->with('user')->where('user_id', '=', $id)->get();
		
		return  $match;
	}

	public function view($id) {

		$match = Match::find($id);

		return view('match', ['match' => $match]);
	}

	public function create() {

		$locations = Location::all();

		return view('/match/addmatch', ['locations' => $locations]);
	}

	public function postCreate() {

		$match = new Match();
		$match->user_id = Auth::user()->id;
		$match->comment = Request::input('comment');
		$match->match_date = Request::input('match_date');
		$match->match_time = Request::input('match_time');
		$match->location_id = Request::input('location_id');
		$match->opponent_id = Request::input('opponent_id');
		$match->open_date_time = Request::input('open_date_time');
		$match->close_date_time = Request::input('close_date_time');
		$match->ranking = Auth::user()->ranking;
		$match->gender = Request::input('gender');
		$match->save();

		return redirect('/matches');
	}

	public function update($id) {

		$match = Match::find($id);
		$locations = Location::all();
		
		return view('/match/updatematch',
			['match' => $match, 'locations' => $locations]);
	}

	public function postUpdate($id) {

		$match = Match::find($id);
		$match->user_id = Auth::user()->id;
		$match->comment = Request::input('comment');
		$match->match_date = Request::input('match_date_time');
		$match->location_id = Request::input('location_id');
		$match->opponent_id = Request::input('opponent_id');
		$match->open_date_time = Request::input('open_date_time');
		$match->close_date_time = Request::input('close_date_time');
		$match->ranking = Auth::user()->ranking;
		$match->gender = Request::input('gender');
		$match->save();

		return redirect('matches');
	}

	public function makeChallenge($id) {

		$match = Match::find($id);		
		$match->match_date = Request::input('match_date_time');
		$match->opponent_id =  Auth::user()->id;
		$match->save();

		return redirect('home');
	}	


	public function ajaxAcceptChallenge($id) {

		$match = Match::find($id);		
		$match->confirmed = '1';
		$match->save();
		
	}

	public function jsonChallenge() {

		$currentuser = Auth::user()->id;
		$matches = Match::with('location')->with('user')->where('user_id', $currentuser )	//so not matches from current user	
			->where('opponent_id', '!=', '')		//remove the event we without an oppenent
			->where('confirmed', '!=' , 1 )	//remove the non confirmed events 
			->get();
		return  $matches;
	}

	public function jsonConfirmed() {

		$matches = Match::with('location')->with('user')->where('confirmed', 1)
			->orWhere(function ($query) {
        		$query->where('user_id', Auth::user()->id )		//get confirmed events 
					->Where('opponent_id', Auth::user()->id);
				})	//so not matches from current user	
			->get();


		return  $matches;
	}

	public function delete($id) {

		$match = Match::find($id);
		$match->delete($id);

		return redirect('matches');
	}

	public function ajaxDelete($id) {
		
		$match = Match::find($id);
		$match->delete($id);

		return true;
	}


}