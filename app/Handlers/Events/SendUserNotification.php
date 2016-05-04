<?php namespace App\Handlers\Events;

use App\Events\QuoteCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class SendUserNotification {

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
		$email = $event->author_email;

		Mail::send('emails.user_notification', ['name' => $author], function($message) use ($email,$author) {
			$message->from('admin@mytestcourse.com', 'Admin');
			$message->to($email, $author);
			$message->subject('Thank you for your Quote');

		});
	}

}
