<?php


Route::get('/hikingtrailz/', 'HomeController@index');

Route::get('/hikingtrailz/home', function(){
	return redirect('/');
});

//Profile
Route::get('/hikingtrailz/profile', 'ProfileController@show');
Route::post('/hikingtrailz/profile/{user_id}/update', 'ProfileController@edit');
Route::post('/hikingtrailz/profile/{user_id}/delete', 'ProfileController@delete');

//Static pages
Route::get('/hikingtrailz/suggest', function(){
	return view('pages.suggest');
});
Route::post('/hikingtrailz/confirmation', function(){
	return view('pages.confirmation');
});
Route::get('/hikingtrailz/faq', function(){
	return view('pages.faq');
});
Route::get('/hikingtrailz/about', function(){
	return view('pages.about');
});


//Mountains
Route::get('/hikingtrailz/featureImage', 'HomeController@getImage');
Route::get('/hikingtrailz/weather', 'HomeController@getWeather');

Route::get('/hikingtrailz/Mountains', function(){return redirect('/Mountains/all');});
Route::get('/hikingtrailz/Mountains/all', 'MountainController@getAll');
Route::get('/hikingtrailz/Mountains/{mountain_id}', 'MountainController@getMountain');


//Trails
Route::get('/hikingtrailz/Trails', function(){return redirect('/Mountains/all');});
Route::get('/hikingtrailz/randomTrail/{trail_id}', 'TrailController@randomTrail');
Route::get('/hikingtrailz/Trails/all', 'TrailController@getAll');
Route::get('/hikingtrailz/Trails/{mountain_id}/{trail_id}','TrailController@getTrail');
Route::get('/hikingtrailz/Trails/loginToComment/{mountain_id}/{trail_id}', ['middleware' => 'auth', 
	function($mountain_id, $trail_id){
   		return redirect("/Trails/$mountain_id/$trail_id");
}]);


//search
Route::get('/hikingtrailz/search' , 'SearchController@getSearch');

//Add a Comment
Route::get('/hikingtrailz/addComment', 'CommentController@addComment');

//Delete a Comment
Route::get('/hikingtrailz/deleteComment', 'CommentController@deleteComment');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);