<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sign extends Model
{
	protected $table = 'signs';

	protected $fillable = [
		'user_id',
		'sign_days',
		'last_sign_time'
	];
}
