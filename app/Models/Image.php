<?php
namespace App\Models;

use DB;
use App\Library\Sql;
use App\Models\Model;

class Image extends Model {
	protected static $table = 'image';
	protected static $key = 'image_id';
}