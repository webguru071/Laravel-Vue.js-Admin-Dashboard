<?php 

namespace App\Models;

use DB, Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';

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

    public function getProducts($request)
    {
        $products = $this->select(['*']);
        if (!empty($request->search['field'])) {
            $searchField = $request->search['field'];
            $searchValue = $request->search['value'];
            $products->where($searchField, 'like', '%' . $searchValue . '%');
            $products->orderBy('products.id', 'desc');
        }
        return $products->paginate($request->limit);
    }

	public function transactionDetails()
    {
        return $this->hasMany('App\Models\TransactionDetail');
    }
}