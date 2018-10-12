<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;

class ResetPasswordController extends Controller
{

	   public function changePassword(Request $request){

    	$user = Auth::user();

    	$oldPassword = $request->input['oldPassword'];
    	$newPassword = $request->input['newPassword'];

    	if (Hash::check($oldPassword, $user->password)) {

        	$user_id = $user->id;
        	$obj_user = User::find($user_id)->first();
        	$obj_user->password = Hash::make($newPassword);
        	$obj_user->save();

        	return response()->json(["result"=>true]);
        }

    	else
			{

        		return response()->json(["result"=>false]);
    		}
    	}
}
