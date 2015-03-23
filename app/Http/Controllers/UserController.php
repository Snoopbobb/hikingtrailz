<?php namespace App\Http\Controllers;

use DB;
use App\Models\Mountain;
use App\Models\Trail;

class UserController extends Controller {

	
	public function show($user_id)
	{
		return view('profile');
	}

	public function getProfile() {
		if (Auth::user()){
			return view("profile");
			} return view("home");

	public function getProfile() {
		if (\Auth::user()){
			return view ('profile');
		}
		return view ("home");
	}


