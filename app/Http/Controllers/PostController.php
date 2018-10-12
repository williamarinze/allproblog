<?php
namespace App\Http\Controllers;

use Laraquick\Controllers\Traits\Api;

use App\Post;

use Auth;

use Hash;

class PostController extends Controller {
  
  use Api;
  
  protected function model() {
    return Post::class;
  }
  

  public function showModel()
  {
    return Post::with('comments');
  }

  protected function validationRules(array $data, $id = null) {
    return [
      'title' => 'required|string',
      'body' => 'required|string',
      'image' => 'sometimes|string',
    ];
  }
   protected function beforeStore(array &$data)
  {
    $data['user_id'] = Auth::id();
  }
}