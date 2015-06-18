<?php namespace App\Http\Controllers;


use Request;
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
		return view('match.allmatch',
			['matches' => $match]);
	}

	public function viewAllByMatch($id) {
		$match = Match::where('match_id', '=', $id)->get();
		return view('all_match',
			['match' => $match]);
	}

	public function viewAllByUser($id) {
		$match = Match::where('user_id', '=', $id)->get();
		return view('allmatch',
			['match' => $match]);
	}

	public function view($id) {
		$match = Match::find($id);
		return view('match',
			['match' => $match]);
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
		$match->ranking = Request::input('ranking');
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
		$match->match_date = Request::input('match_date');
		$match->match_time = Request::input('match_time');
		$match->location_id = Request::input('location_id');
		$match->opponent_id = Request::input('opponent_id');
		$match->open_date_time = Request::input('open_date_time');
		$match->close_date_time = Request::input('close_date_time');
		$match->ranking = Request::input('ranking');
		$match->gender = Request::input('gender');
		$match->save();

		return redirect('matches');
	}

	public function delete($id) {
		$match = Match::find($id);
		$match->delete($id);

		return redirect('matches');
	}


}