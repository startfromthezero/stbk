<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
	protected $listen = [
		'App\Events\permChangeEvent' => [
			'App\Listeners\permChangeListener',
		],
		'App\Events\userActionEvent' => [
			'App\Listeners\userActionListener',
		],
		'App\Events\newsViewEvent'=>[
			'App\Listeners\newsViewListener',
		],
	];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
