<?php 

namespace App\Models;

use DB, Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $table = 'groups';

	/**
     * Replace Field
     *
     * @access 	public
     * @param 	
     * @return 	string
     */

	public function replaceField($field, $fields = [])
    {
        if (in_array($field, $fields)) {
            return $fields[$field];
        }

        return $field;
    }

	/**
     * Get List of Groups
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

    public function getGroups($request)
    {
        $users = $this->select(['*']);
        if (!empty($request->search['field'])) {
            $searchField = $request->search['field'];
            $searchValue = $request->search['value'];
            $users->where($searchField, 'like', '%' . $searchValue . '%');
            $users->orderBy('groups.id', 'desc');
        }
        return $users->paginate($request->limit);
    }

	public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function privileges()
    {
        return $this->hasMany('App\Models\Privilege');
    }
}