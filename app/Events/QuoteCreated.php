<?php namespace App\Events;

use App\Events\Event; 

use Illuminate\Queue\SerializesModels;

class QuoteCreated extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($author)
	{
		$this->author_name = $author->name;
		$this->author_email = $author->email;
	}

}
