<?php 

namespace App\Http\Controllers;

use Validator, Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	/**
     * Validate and Login User
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

	public function login(Request $request)
	{
		$rules = [
			'email' => 'required|email',
			'password' => 'required'
		];
		
	    $validator = Validator::make($request->all(), $rules);
	    if (!$validator->fails()) {
			$credentials = [
				'email' => $request['email'], 
				'password' => $request['password']
			];

			$keepLoggedIn = isset($request->keepLoggedIn) ? true : false;
			if (Auth::attempt($credentials, $keepLoggedIn)) {
				return response()->json([
					'status' => 'success',
					'result' => Auth::user(),
					'messages' => null
				]);
			} else {
				return response()->json([
					'status' => 'error',
					'result' => [
						'password' => ['Invalid email or password']
					],
					'messages' => null
				]);
			}
		} else {
	    	return response()->json([
	    		'status' => 'error',
	    		'result' => $validator->messages(),
	    		'messages' => null
	    	]);
	    }
	}
}