<?php
namespace App\Http\Controllers;

use Laraquick\Controllers\Traits\Api;

use App\User;

use Hash;

class UserController extends Controller {
  
  use Api;
  
  protected function model() {
    return User::class;
  }

  public function showModel()
  {
    return User::with('posts');
  }

  protected function validationRules(array $data, $id = null) {
    return [
      'name' => 'required|string',
      'email' => 'required|email',
      'password' => 'required',
      'role_id' => 'required',
    ];
  }
   protected function beforeStore(array &$data)
  {
    $data['password'] = Hash::make($data['password']);
  }

}