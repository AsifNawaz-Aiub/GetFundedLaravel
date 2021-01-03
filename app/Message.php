<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $primaryKey = "id";
    //public $timestamps = false;

   const CREATED_AT = "createdAt";
   const UPDATED_AT = "updatedAt";
}
