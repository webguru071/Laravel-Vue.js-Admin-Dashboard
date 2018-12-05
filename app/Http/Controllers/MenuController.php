<?php 

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Get List of Menus
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getMenus(Request $request)
    {
        $menus = Menu::all();
        return response()->json([
            'status' => 'success',
            'result' => $menus,
            'messages' => null
        ]);
    }

    /**
     * Get List of Menus by User Id
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getUserMenus(Request $request)
    {
        $user = User::where('id', $request->user_id)->with(['group' => function($query) {
            $query->with(['privileges' => function($query) {
                $query->with('menu');
            }]);
        }])->first();

        $groupedMenus = $user->group->privileges->map(function($privilege, $key) {
            return $privilege->menu;
        })->sortBy('id')->groupBy('menu_section')->reject(function($menuSection, $key) {
            return empty($key);
        });

        return response()->json([
            'status' => 'success',
            'result' => $groupedMenus,
            'messages' => null
        ]);
    }
}