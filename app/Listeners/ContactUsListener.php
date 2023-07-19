<?php

namespace App\Listeners;

use App\Events\ContactUsRequestEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Mail\Mailer;
use App\Mail\ContactUsMail;

class ContactUsListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(private Mailer $mailer)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactUsRequestEvent $event): void
    {
        $this->mailer->send(new ContactUsMail($event->data));
    }
}
