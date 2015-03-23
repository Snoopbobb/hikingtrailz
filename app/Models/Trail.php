<?php
namespace App\Models;

use DB;
use App\Library\SQL;
use App\Models\Model;

class Trail extends Model{
	protected static $table = 'trail';
	protected static $key = 'trail_id';

	public static function getComments($trail_id){	
		$sql = "
			SELECT user.user_id, 
			comment_description,  
			comment.created_at as created_at,
			comment_id,
			user.username
			FROM comment 
			JOIN user USING(user_id)
			WHERE trail_id = :trail_id
			ORDER BY comment.created_at DESC
			";
		$comment = DB::select($sql, [':trail_id' => $trail_id]);

		return $comment;
	}

	


	// public static function deleteComment($comment_id) {
	// 	$sql = "
	// 			DELETE FROM comment
	// 			WHERE comment_id = :comment_id
	// 			";
	// 	DB::delete($sql, [
	// 					':comment_id' => $comment_id
	// 					]);	
		
	// }
}