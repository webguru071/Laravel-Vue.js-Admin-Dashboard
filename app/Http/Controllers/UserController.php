<?php 

namespace App\Http\Controllers;

use Hash, Validator;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	/**
     * Get List of Users
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getUsers(Request $request, User $user)
    {
        $users = $user->getUsers($request);
        return response()->json([
            'status' => 'success',
            'result' => [
                'total' => $users->total(), 
                'rows' => $users->items()
            ],
            'messages' => null
        ]);
    }

    /**
     * Get Single User
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getSingleUser(Request $request)
    {
        $rules = [
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $user = User::find($request->id);
            return response()->json([
                'status' => 'success',
                'result' => $user,
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

	/**
     * Create a New User
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function createUser(Request $request)
	{
		$rules = [
			'name' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|confirmed',
			'group_id' => 'required'
		];

		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$user = new User;
			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = Hash::make($request->password);
			$user->group_id = $request->group_id;
			$user->token = str_random(10);
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

	/**
     * Update Existing User
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function updateUser(Request $request)
	{
		$rules = [
			'id' => 'required',
			'name' => 'required',
			'group_id' => 'required'
		];

		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$user = User::find($request->id);
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

	/**
     * Change User Password
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function changeUserPassword(Request $request)
	{
		$rules = [
			'id' => 'required',
			'password' => 'required'
		];

		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$user = User::find($request->id);
			$user->password = Hash::make($request->password);
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

	/**
     * Delete User
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function deleteUser(Request $request)
	{
		$rules = [
			'id' => 'required'
		];

		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$user = User::find($request->id);	
			$user->delete();

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