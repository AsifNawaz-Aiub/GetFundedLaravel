<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';
    protected $primaryKey = "id";
    //public $timestamps = false;
    const CREATED_AT = "createdAt";
    const UPDATED_AT = "updatedAt";
}
