<?php
namespace App\Models;

use DB;
use App\Library\Sql;
use App\Models\Model;

class Profile extends Model {
	protected static $table = 'user';
	protected static $key = 'user_id';


//Update user Info
	
	public static function edit($first_name, 
								$last_name, 
								$email, 
								$gender, 
								$user_id
								) {
		$sql= "UPDATE user
				SET first_name = :first_name,
					last_name = :last_name,
					email = :email,
					gender = :gender
				WHERE 
					user_id = :user_id
				";

		$update_profile = DB::statement($sql, [':first_name'=>$first_name,
								':last_name'=>$last_name,
								':email'=>$email,
								':gender'=>$gender,
								':user_id'=>$user_id]);

		return $update_profile;
	}

//Delete User

	public static function delete($user_id) {
		$sql="DELETE FROM user WHERE user_id = $user_id";
		$delete_user = DB::delete($sql);

		return $delete_user;
	}
}