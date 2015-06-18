<?php
namespace App\Http\Controllers;

use Request;
use App\User;
use App\Models\Track;

class UserController extends Controller {

	// public function __construct() {
	// 	$this->middleware('auth');
	// }

	// public function viewAllByArtist($user_id) {
	// 	$tracks = Track::where('user_id', '=', $user_id)->get();
	// 	$allTracks = Track::all();
	// 	return view('artist',
	// 		['tracks' => $tracks, 'allTracks' => $allTracks]);
	// }

	public function viewAll() {
		$users = User::all();
		return view('all_users',[ 'users'=>$users ]);

	}

	public function view($id) {
		$user = User::find($id);
		return view('/users/user',[ 'user'=>$user ]);
	}

	public function update($id) {
		$user = User::find($id);
		return view('update_user', ['user'=>$user]);
	}

	public function postUpdate($id) {
		$user = User::find($id);
		$user->first_name = Request::input('first_name');
		$user->last_name = Request::input('last_name');
		$user->email = Request::input('email');
		$user->address = Request::input('address');
		$user->city = Request::input('city');
		$user->about = Request::input('about');
		$user->ranking = Request::input('ranking');
		$user->gender = Request::input('gender');
		$user->st = Request::input('st');
		$user->zip = Request::input('zip');
		$user->birthdate = Request::input('birthdate');

		$user->save();
		return redirect('users');
	}

	public function delete($id) {
		$id   = Request::input('id');
		$user = User::find($id);
		$user->delete();
		return redirect('users');
	}

	protected function validateForm() {
		$this->validate(Request::instance(), [
			'first_name' => 'required|alpha|min:2|max:50',
			'last_name'  => 'alpha|between:2,50',
			'email'      => 'email',
		]);
	}

	// public function usercomments($id) {
	// 	$user_comments = User::with('comments.tracks')->where('id', '=', $id)->get();
	// 	return view('all_user_comments',
	// 		['user_comments' => $user_comments]);
	// }

	// public function logout() {
	// 	if (Auth::check()) {
	// 		Auth::logout();
	// 		return redirect('index');
	// 	}
	// }

}