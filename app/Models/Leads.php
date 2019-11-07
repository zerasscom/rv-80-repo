<?php

namespace App\Models;

use App\Helpers\BaseModel;

class Leads extends BaseModel {

    protected $table                = 'leads';
    const CREATED_AT                = 'created_at';
    const UPDATED_AT                = 'updated_at';
    protected $hidden               = ['deleted_at'];
    protected $dates                = ['deleted_at'];

    public static function onCreateOrUpdateEvent($model)
    {
    }


    public static function boot()
    {
        parent::boot();

    }
}