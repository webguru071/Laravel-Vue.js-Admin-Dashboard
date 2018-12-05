<?php 

namespace App\Models;

use App\Libraries\Lionade;
use DB, Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

	protected $table = 'transactions';

	/**
     * Replace Field
     *
     * @access  public
     * @param   
     * @return  string
     */

    public function replaceField($field, $fields = [])
    {
        if (in_array($field, $fields)) {
            return $fields[$field];
        }

        return $field;
    }

    /**
     * Get List of Products
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getTransactions($request)
    {
        $transactions = $this->select(['*']);
        if (!empty($request->search['field'])) {
            $searchField = $request->search['field'];
            $searchValue = $request->search['value'];
            $transactions->where($searchField, 'like', '%' . $searchValue . '%');
            $transactions->orderBy('transactions.id', 'desc');
            $transactions->with(['transactionDetails' => function($query) {
                $query->with('product');
            }]);
        }
        return $transactions->paginate($request->limit);
    }

	public function transactionDetails()
    {
        return $this->hasMany('App\Models\TransactionDetail');
    }
}