<?php 

namespace App\Http\Controllers;

use Validator, Hash;
use App\Models\User;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
	/**
     * Save a New Password
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function save(Request $request)
	{
		$rules = [
			'old_password' => 'required',
			'new_password' => 'required'
		];

		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$user = User::find($request->user_id);
			if (Hash::check($request->old_password, $user->password)) {
				$user = User::find($request->user_id);
				$user->password = Hash::make($request->new_password);
				$user->save();

				return response()->json([
					'status' => 'success',
					'result' => null,
					'messages' => null
				]);
			} else {
				$validator->errors()->add('old_password', 'Wrong old password');
				return response()->json([
					'status' => 'error',
					'result' => $validator->messages(),
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