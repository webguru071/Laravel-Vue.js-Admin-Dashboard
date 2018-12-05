<?php 

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use DB, Auth, Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

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
     * Get List of Users
     *
     * @access  public
     * @param   
     * @return  json(array)
     */

    public function getUsers($request)
    {
        $users = $this->select(['users.*', 'groups.group_name']);
        $users->leftJoin('groups', 'groups.id', '=', 'users.group_id');
        $fields = [
            'name' => 'users.name',
            'email' => 'users.email',
            'group_name' => 'groups.group_name'
        ];
        if (!empty($request->search['field'])) {
            $searchField = $this->replaceField($request->search['field'], $fields);
            $searchValue = $request->search['value'];
            $users->where($searchField, 'like', '%' . $searchValue . '%');
            $users->orderBy('users.id', 'desc');
        }
        return $users->paginate($request->limit);
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
}