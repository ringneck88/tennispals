<?php namespace App\Http\Controllers;


use Request;
use App\Models\Location;
use App\User;

class LocationController extends Controller {

	

	public function viewAll() {
		$locations = Location::all();
		return view('alllocation',
			['locations' => $locations]);
	}

	public function viewAllByMatch($id) {
		$location = Location::where('match_id', '=', $id)->get();
		return view('all_location',
			['location' => $location]);
	}

	public function viewAllByUser($id) {
		$location = Location::where('user_id', '=', $id)->get();
		return view('alllocation',
			['location' => $location]);
	}

	public function view($id) {
		$location = Location::find($id);
		return view('location',
			['location' => $location]);
	}

	public function create() {
		return view('addlocation', []);
	}

	public function postCreate() {

		$address = Request::input('address') .',' . Request::input('city') .',' . Request::input('st');
		$geo = $this->geocode($address);
		// dd($address);

		$location = new Location();
		$location->name = Request::input('name');
		$location->comment = Request::input('comment');
		$location->address = Request::input('address');
		$location->city = Request::input('city');
		$location->st = Request::input('st');
		$location->zip = Request::input('zip');
		$location->lat = $geo[0];
		$location->long = $geo[1];
		$location->save();

		return redirect('locations');
	}

	public function update($id) {
		$location = Location::find($id);
		
		return view('updatelocation',
			['location' => $location]);
	}

	public function postUpdate($id) {

		$location = Location::find($id);
		$location->name = Request::input('name');
		$location->comment = Request::input('comment');
		$location->address = Request::input('address');
		$location->city = Request::input('city');
		$location->st = Request::input('st');
		$location->zip = Request::input('zip');
		$location->lat = Request::input('lat');
		$location->long = Request::input('long');
		$location->save();

		return redirect('locations');
	}

	public function delete($id) {
		$location = Location::find($id);
		$location->delete($id);

		return redirect('locations');
	}


// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}


}