<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = "id";
    //public $timestamps = false;

    const CREATED_AT = "createdAt";
    const UPDATED_AT = "updatedAt";
}
