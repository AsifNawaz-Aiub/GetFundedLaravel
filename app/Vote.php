<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
	protected $primaryKey = "id";
	//public $timestamps = false;

	const CREATED_AT = "createdAt";
	const UPDATED_AT = "updatedAt";
}
