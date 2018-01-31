<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Favorite;

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
		return $this->hasMany('App\Comment', 'new_id', 'id');
	}

	public function favorited($nid){
		return (bool)Favorite::where('user_id',Auth::id())->where('new_id', $nid)->first();
	}
}
