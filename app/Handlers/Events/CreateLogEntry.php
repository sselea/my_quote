<?php namespace App\Handlers\Events;

use App\Events\QuoteCreated;	
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\QuoteLog; 

class CreateLogEntry {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  QuoteCreated  $event
	 * @return void
	 */
	public function handle(QuoteCreated $event)
	{
		$author = $event->author_name;
		$log_entry = new QuoteLog();
		$log_entry->author = $author;
		$log_entry->save();
	}

}
