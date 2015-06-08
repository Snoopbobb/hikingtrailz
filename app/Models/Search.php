<?php
namespace App\Models;

use DB;
use App\Library\SQL;
use App\Models\Model;

class Search extends Model{
	protected static $table = 'trail';
	protected static $key = 'trail_id';

	public static function getSearch($message){	

		 
				$sql = "
						SELECT trail_id, 
						mountain_id,
						name, 
						elevation_gain,
						hashtag,
						length,
						description
						FROM trail 
						WHERE  name 
						LIKE '%" . $message . "%' 
						OR description
						LIKE '%" . $message  ."%'
						OR elevation_gain
						LIKE '%" . $message . "%'
					";
				$search = DB::select($sql, ['message' => $message]);
				// print_r($search);

				return $search;
	}

}