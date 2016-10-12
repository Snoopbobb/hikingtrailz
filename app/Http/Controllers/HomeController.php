<?php namespace App\Http\Controllers;
use Request;
use DB;
use App\Models\Mountain;
use App\Models\Trail;
use App\Models\Image;

class HomeController extends Controller {

	
	public function index()
	{	
		// call weather function
		$weather = Controller::getWeather();

		if ($weather) {
			return view('home')->with($weather);
		} else {
			return view('home');
		}
		
	}

	public function getImage() {
		$mountain_id = Request::input('mountain_id');
		$mountain = new Mountain($mountain_id);
		$image = $mountain->image_id;
		$img = new Image($image);
		$imageURL = $img->image_path;

		return ['imageURL' => $imageURL];
	}

	public static function getWeather(){
		$weather = [];
		// get weather data
		// $json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Seattle');


		// =====================
		// bring me back!!!!
		// =====================

		$URL = "http://api.openweathermap.org/data/2.5/weather?q=Phoenix";
		$Context = stream_context_create(array(
				'http' => array(
    				'method' => 'GET',
    				'timeout' => 30,
					)
		));
		
		$json = file_get_contents($URL, false, $Context);

		$data = json_decode($json);

		// get temperature in farenheit, round to whole degree  
		$temperature = round((($data->main->temp)- 273.15) * 1.8 + 32);
		
		$code = $data->weather[0]->id;
		// echo $code;

		// =====================
		// bring me back!!!!
		// =====================


		// $clouds = '';
		// $code = 802;
		// $temperature = 79;

		switch ($code) {

			//clear skies
			case '800':
				$clouds = '<i class="wi wi-day-sunny" title = "' . 'its sunny yo' . '"></i>';
				break;

			//overcast in any way
			case ($code > '800' && $code < '805'):
				$clouds = '<i class="wi wi-day-cloudy" title = "' . 'its sorta cloudy' . '"></i>';
				break;	

			//thunderstorms	
			case ($code > '199' && $code < '233'):
				$clouds = '<i class="wi wi-storm-showers" title = "' . $data->weather[0]->description . '"></i>';
				break;		

			//	drizzle
			case ($code > '299' && $code < '322'):
				$clouds = '<i class="wi wi-day-showers" title = "' . $data->weather[0]->description . '"></i>';
				break;

			//	freezing rain
			case '511':
				$clouds = '<i class="wi wi-day-sleet" title = "' . $data->weather[0]->description . '"></i>';
				break;

			//	just Rainy
			case ($code > '499' && $code < '532' && $code != '511'):
				$clouds = '<i class="wi wi-day-showers" title = "' . $data->weather[0]->description . '"></i>';
				break;

			//	Snow
			case ($code > '599' && $code < '623'):
				$clouds = '<i class="wi wi-day-snow" title = "' . $data->weather[0]->description . '"></i>';
				break;

			default:
				$clouds = '<i class="wi wi-alien" title = "' . $data->weather[0]->description . '"></i>';
				break;
		}

		$weather = ['temperature' => $temperature, 'clouds'=>$clouds];

		return $weather;
	}
}
