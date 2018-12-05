<?php 

namespace App\Http\Controllers;

use Validator;
use App\Models\Privilege;
use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    /**
     * Get Privileges by Selected Group
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

    public function getPrivileges(Request $request)
	{
        $rules = [
            'group_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $privileges = Privilege::where('group_id', '=', $request->group_id)->get();
            $privileges = $privileges->map(function($privilege, $key) {
                return $privilege['menu_id'];
            });

            return response()->json([
                'status' => 'success',
                'result' => $privileges,
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
     * Save Privileges of Selected Group
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

	public function savePrivilege(Request $request)
	{
        $rules = [
            'menus' => 'required',
            'group_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $privilege = Privilege::where('group_id', '=', $request->group_id);
            $privilege->delete();

            foreach ($request->menus as $id) {
                $privilege = new Privilege;     
                $privilege->group_id = $request->group_id;
                $privilege->menu_id  = $id;
                $privilege->save();
            }

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