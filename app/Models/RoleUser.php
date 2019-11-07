<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    public $fillable = ['user_id', 'role_id'];

    protected $primaryKey = 'id';
    public function user_id_users()
    {
        return $this->belongsTo('App\Models\Users', 'user_id', 'id');
    }
    public function role_id_roles()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    protected $table = 'role_user';
    public $timestamps = false;

    protected $casts = [
    ];
}

?>