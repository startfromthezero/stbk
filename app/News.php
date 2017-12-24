<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = 'news';

	protected $fillable = [
		'title',
		'content',
		'from',
		'user_id',
		'type_id',
		'is_show',
		'is_recomm',
		'is_top',
		'keyword',
		'synopsis'
	];

	public function hasManyComments()
	{
		return $this->hasMany('App\Comment', 'news_id', 'id');
	}
}
