<?php namespace App\Providers;

use App\Handlers\Events\CreateLogEntry;
use App\Handlers\Events\SendUserNotification;
use App\Events\QuoteCreated;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'\App\Events\QuoteCreated'=> [
			'\App\Handlers\Events\CreateLogEntry',
			'\App\Handlers\Events\SendUserNotification'
		],


		QuoteCreated::class => [

			CreateLogEntry::class,
			SendUserNotification::class

		],
	];

	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		//
	}

}
