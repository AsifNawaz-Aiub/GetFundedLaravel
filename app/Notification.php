<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = "id";
    // public $timestamps = false;

    const CREATED_AT = "createdAt";
    const UPDATED_AT = "updatedAt";
}