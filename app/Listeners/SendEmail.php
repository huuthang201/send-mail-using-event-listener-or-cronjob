<?php

namespace App\Listeners;

use App\Event\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class SendEmail
{
    /**
     * Create the event listener.
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
     * @param  \App\Event\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $data = ['name' => "ThangNH", "content" => "xaaaaaaaaaaaaaaaaaaaaaa!"];
        Mail::send(['html' => 'layouts.sendmail'], $data, function ($message) use ($event, $data) {
            $message->from('thangnh2001@gmail.com', $data['name']);
            $message->to($event->email)->subject('Test send email!');
        });
        echo "Check your inbox.";

        exit;
    }
}
