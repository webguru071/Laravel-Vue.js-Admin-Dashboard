<?php 

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
	/**
     * Get User Profile
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getProfile(Request $request)
    {
        $user = User::find($request->user_id);
        return response()->json([
            'status' => 'success',
            'result' => $user,
            'messages' => null
        ]);
    }

	/**
     * Save Profile Changes
     *
     * @access 	public
     * @param 	
     * @return 	json('string')
     */

	public function save(Request $request)
	{
		$rules = [
			'name' => 'required',
			'group_id'=> 'required'
		];

	    $validator = Validator::make($request->all(), $rules);
	    if (!$validator->fails()) {
	    	$user = User::find($request->user_id);
	    	$user->name = $request->name;
	    	$user->group_id = $request->group_id;
	    	$user->save();

	    	return response()->json([
	    		'status' => 'success',
	    		'result' => null,
	    		'messages' => null
	    	]);
	    } else {
	    	return response()->json([
	    		'status' => 'error',
	    		'result' => $validator->messages(),
	    		'messages' => null
	    	]);
	    }
	}
}