<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Subscribes extends Mailable
{
    use Queueable, SerializesModels;
    public $subscribe;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscribe)
    {
        $this->subscribe = $subscribe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to(app('settings')->email)
            ->subject('Подписка на рассылку')
            ->view('mail.admin.subscribe');
    }
}
