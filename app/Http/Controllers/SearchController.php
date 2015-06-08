<?php namespace App\Http\Controllers;
i


class SearchController extends Controller {

	// public function getAll() {
	// 	return view('Trails');
	// }

	public function getSearch() {
		$message = Request::input('message');
		$search = Search::getSearch($message);
		// print_r($search);
		return $search;

	}

}