<?php
namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    public function roles()
    {
        return $this->belongsToMany('App\Models\Users', 'role_user', 'role_id', 'user_id');
    }

}