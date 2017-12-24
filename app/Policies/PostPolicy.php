<?php

namespace App\Policies;

use App\User;
use App\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

	protected $policies = [
		Article::class => PostPolicy::class,
	];
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

	public function update(User $user, Article $post)
	{
		return $user->id === $post->user_id;
	}
}
