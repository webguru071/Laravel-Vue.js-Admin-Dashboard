<?php 

namespace App\Models;

use App\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model {

	protected $table = 'transaction_details';

	public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}