<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use Laraquick\Controllers\Traits\Respond; 

class ResetPasswordController extends Controller
{
	use Respond;

	public function changePassword(Request $request) {

		$request->validate([
			'oldPassword' => 'required',
			'newPassword' => 'required'
		]); 

		$user = Auth::user();

    	if (Hash::check($request->oldPassword, $user->password)) {
        	$user->password = Hash::make($request->newPassword);
        	$user->save();

        	return [
        		'status' => 'password changed succesfully'
        	];
        }
    	else {
        	return $this->error('Incorrect password');;
    	}
    }
}
