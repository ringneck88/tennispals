<?php namespace App\Http\Controllers;


use Request;
use App\Models\Message;
use App\User;

class MessageController extends Controller {

	

	public function viewAll() {
		$message = Message::all();
		return view('all_message',
			['message' => $message]);
	}

	public function viewAllByMatch($id) {
		$message = Message::where('match_id', '=', $id)->get();
		return view('all_message',
			['message' => $message]);
	}

	public function viewAllByUser($id) {
		$message = Message::where('user_id', '=', $id)->get();
		return view('all_message',
			['message' => $message]);
	}

	public function view($id) {
		$message = Message::get($id);
		return view('message',
			['message' => $message]);
	}

	public function create() {
		return view('message', []);
	}

	public function postCreate() {
		$message = new Message();
		$message->user_id = Request::input('user_id');
		$message->match_id = Request::input('match_id');
		$message->comment = Request::input('message');
		$message->save();

		return redirect('message');
	}

	public function update($id) {
		$message = Message::find($id);
		
		return view('update_message',
			['message' => $message]);
	}

	public function postUpdate($id) {
		$message = Message::find($id);
		$message->user_id = Request::input('user_id');
		$message->track_id = Request::input('track_id');
		$message->comment = Request::input('comment');
		$message->save();

		return redirect('message');
	}

	public function delete($id) {
		$message = Message::find($id);
		$message->delete($id);

		return redirect('message');
	}



}
