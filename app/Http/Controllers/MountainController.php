<?php namespace App\Http\Controllers;
use DB;
use App\Models\Mountain;
use App\Models\Trail;
use App\Models\Image;

class MountainController extends Controller {

	public function getAll() {
		return view('Mountain', ['title' => 'All The Mountains', 'description' => 'some random Mountains yo']);
	}

	public function getMountain($mountain_id) {

			// call weather function
			// $weather = Controller::getWeather();

			$trailNames = [];
			$trailIds = [];


			$mountain = new Mountain($mountain_id);
			$trails = Trail::all(['mountain_id' => $mountain_id]);

			$image = $mountain->image_id;
			$img = new Image($image);
			$imageURL = $img->image_path;
			$tileImageURL = [];

			foreach($trails->getArray() as $trail) {
				$trailNames[] = $trail->name;
				$trailIds[] = $trail->trail_id;
			}

			foreach ($trailIds as $trail_id) {
				$trailimage = new Trail($trail_id);
				$timg = new Image($trailimage->image_id);
				$tileImageURL[] = $timg->image_path;
			}

			$template = '';
			$a = '<a href="/hikingtrailz/Trails/'. $mountain_id . '/';
			$b = '"><div class="scale trail_tile_';
			$i = 1;
			$q = 0;
			foreach ($trails->getArray() as $trail) {
				$template .= $a . $trail->trail_id . $b . $i . '" style="background-image: url(/hikingtrailz/' . $tileImageURL[$q] . '); background-size: 150% 100%; color: #ddd; text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.9);"><h3>' . $trail->name . '</h3></div></a>';
				$i++;
				$q++;
			}

			return view('Mountain', ['mountain' => $mountain, 'trail' => $trails, 
						'trailNames' => $trailNames, 'trailIds' => $trailIds, 'imageURL' => $imageURL, 'template' => $template]);
	}

	public function getImage ($mountain_id) {
		$mountain_id = Request::input('mountain_id');
		$mountain = new Mountain($mountain_id);

		$image = $mountain->image_id;
		$img = new Image($image);
		$imageURL = $img->image_path;

		return json_encode($imageURL);

		header('Content-Type: application/json'); 
	}
}