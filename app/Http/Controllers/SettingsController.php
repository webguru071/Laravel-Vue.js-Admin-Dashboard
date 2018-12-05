<?php 

namespace App\Http\Controllers;

use Validator;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
	/**
     * Get Settings
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getSettings(Request $request)
    {
        $settings = Setting::all();
        return response()->json([
            'status' => 'success',
            'result' => $settings,
            'messages' => null
        ]);
    }

	/**
     * Save Settings Changes
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function save(Request $request)
	{
		$rules = [
			'company_name' => 'required',
			'company_address' => 'required',
			'company_phone_number' => 'required',
			'company_email' => 'required|email'
		];

		$validator = Validator::make($request->all(), $rules);
		if (!$validator->fails()) {
			$setting = Setting::where('meta_key', 'company_name')->first();
			$setting->meta_value = $request->company_name;
			$setting->save();

			$setting = Setting::where('meta_key', 'company_address')->first();
			$setting->meta_value = $request->company_address;
			$setting->save();

			$setting = Setting::where('meta_key', 'company_phone_number')->first();
			$setting->meta_value = $request->company_phone_number;
			$setting->save();

			$setting = Setting::where('meta_key', 'company_email')->first();
			$setting->meta_value = $request->company_email;
			$setting->save();

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