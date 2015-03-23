<?php 
namespace App\Models;
use DB;

class Comment extends Model {
	protected static $table = 'comment';
	protected static $key = 'comment_id';


	public static function deleteComment($comment_id) {
		$sql = "
				DELETE FROM comment
				WHERE comment_id = :comment_id
				";
		DB::delete($sql, [
						':comment_id' => $comment_id
						]);	
		
	}
}