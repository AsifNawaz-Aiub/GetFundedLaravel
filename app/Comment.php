<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
	protected $primaryKey = "id";
	//public $timestamps = false;

	const CREATED_AT = "createdAt";
	const UPDATED_AT = "updatedAt";
}
