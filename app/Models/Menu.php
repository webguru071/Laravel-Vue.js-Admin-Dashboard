<?php 

namespace App\Models;

use DB, Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	public $table = 'menus';
	public $timestamps = false;

	public function privileges()
    {
        return $this->hasMany('App\Models\Privilege');
    }
    
}

