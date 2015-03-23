<?php namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Guard;
use DB;
use Request;
use App\Models\Profile;
use App\Models\Mountain;
use App\Models\Trail;
use App\Models\Image;

class ProfileController extends Controller {

//Access current user info	
	public function show() {
		$user = \Auth::user();

		return view('profile', ['user'=>$user]);
	}


//Update User Info

	public function edit($user_id) {
		$user_id = Request::input('user_id');
		$first_name = Request::input('first_name');
		$last_name = Request::input('last_name');
		$email = Request::input('email');
		$gender = Request::input('gender');
		$update_profile = Profile::edit($first_name, $last_name, $email, $gender, $user_id);
		
		return redirect("profile");
	}

//Delete User

	public function delete($user_id) {
		$delete_user = Profile::delete($user_id);

		return redirect("/");


	}
}
