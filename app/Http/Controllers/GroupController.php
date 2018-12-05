<?php 

namespace App\Http\Controllers;

use Validator;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Get List of Groups
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getGroups(Request $request, Group $group)
    {
        $groups = $group->getGroups($request);
        return response()->json([
            'status' => 'success',
            'result' => [
                'total' => $groups->total(), 
                'rows' => $groups->items()
            ],
            'messages' => null
        ]);
    }

    /**
     * Get List of Groups Without Any Filters
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getAllGroups(Request $request, Group $group)
    {
        $groups = Group::all();
        return response()->json([
            'status' => 'success',
            'result' => $groups,
            'messages' => null
        ]);
    }

    /**
     * Get Single Group
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getSingleGroup(Request $request)
    {
        $rules = [
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $group = Group::find($request->id);
            return response()->json([
                'status' => 'success',
                'result' => $group,
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
     * Create a New Group
     *
     * @access  public
     * @param   
     * @return  json(string)
     */

    public function createGroup(Request $request)
    {
        $rules = [
            'group_name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $group = new Group;
            $group->group_name = $request->group_name;
            $group->save();

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
     * Update Existing Group
     *
     * @access  public
     * @param   
     * @return  json(string)
     */

    public function updateGroup(Request $request)
    {
        $rules = [
            'id' => 'required',
            'group_name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $group = Group::find($request->id);
            $group->group_name = $request->group_name;
            $group->save();

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
     * Delete Group
     *
     * @access  public
     * @param   
     * @return  json(string)
     */

    public function deleteGroup(Request $request)
    {
        $rules = [
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $group = Group::find($request->id); 
            $group->delete();

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