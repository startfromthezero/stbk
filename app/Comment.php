<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jcc\LaravelVote\CanBeVoted;
class Comment extends Model
{
	use CanBeVoted;
	protected $vote = User::class;
    //
	protected $fillable = [
		'user_id',
		'parent_id',
		'new_id',
		'content'
	];
}
