<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = "id";
    // public $timestamps = false;
    protected $fillable = ['name', 'username', 'email', 'password', 'userType'];

    const CREATED_AT = "createdAt";
    const UPDATED_AT = "updatedAt";
}
