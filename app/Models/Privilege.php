<?php 

namespace App\Models;

use DB, Illuminate\Database\Eloquent\Model;

class Privilege extends Model {

	public $table = 'privileges';
	public $timestamps = false;

	public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

}
