<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
	protected $primaryKey = "id";
	//public $timestamps = false;

	const CREATED_AT = "createdAt";
	const UPDATED_AT = "updatedAt";
}
