<?php namespace App\Http\Controllers;
use DB;
use App\Models\Mountain;
use App\Models\Trail;
use App\Models\Image;
use App\Models\Comment;
use Request;


class CommentController extends Controller {
	public function addComment() {
		// $user_id = Request::input('user_id');
		// $message = Request::input('message');
		// $trail_id = Request::input('trail_id');

		$comment = new Comment();
		$comment->comment_description = Request::input('message');
		$comment->user_id = Request::input('user_id');
		$comment->trail_id = Request::input('trail_id');
		$comment_id = $comment->save();

		$comment = new Comment($comment_id);

		//$comment_id = Trail::addComment($user_id, $trail_id, $message);


		// return redirect()->back();
		return ['comment' => $comment->getData()];

	}

	public function deleteComment() {
		$comment_id = Request::input('comment_id');
		Comment::deleteComment($comment_id);
		return [$comment_id];

	}

}

