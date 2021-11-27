<?php

namespace App\Jobs;

use App\EventTicket;
use App\Mail\TicketConfirmMail;
use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendConfirmEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $email;
    protected $booking;

    public function __construct($email , EventTicket $booking)
    {
        $this->email = $email;
        $this->booking = $booking;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email_data = new TicketConfirmMail($this->booking);
        Mail::to($this->email)->send($email_data);
    }
}
