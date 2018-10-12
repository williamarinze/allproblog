<?php
namespace App\Http\Controllers;

use Laraquick\Controllers\Traits\Api;

use App\Comment;

use Auth;

use Hash;

class CommentController extends Controller {
  
  use Api;
  
  protected function model() {
    return Comment::class;
  }

  protected function validationRules(array $data, $id = null) {
    return [
      'content' => 'required|string',
      'post_id' => 'required|integer|exists:posts,id',
    ];
  }
   protected function beforeStore(array &$data)
  {
    $data['user_id'] = Auth::id();
    $data['is_approved'] = false;
  }
}