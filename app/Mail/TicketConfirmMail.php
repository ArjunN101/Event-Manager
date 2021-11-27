<?php

namespace App\Mail;

use App\EventTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TicketConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $booking;
    public $attach;
    public $pathToLogo;
    public $eventBanner;
    public function __construct(EventTicket $booking)
    {
        $this->pathToLogo = 'public/asset/img/logo.png';
        $this->booking = $booking;
        $this->attach = 'public/storage/tickets/'.$booking->ticket;
        $this->eventBanner = 'public/storage/events/'.$booking->eventDetail->picture;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // sleep(5);

        return $this->view('emails.event.confirmation-mail')
                    ->subject('Your Ticket')
                    ->attach($this->attach, [
                        'as' => 'myticket.pdf',
                        'mime' => 'application/pdf',
                    ]);

    }

}
