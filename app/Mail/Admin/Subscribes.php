<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Subscribes extends Mailable
{
    use Queueable, SerializesModels;

    public array $subscribe;

    /**
     * Create a new message instance.
     *
     * @param array $subscribe
     */
    public function __construct(array $subscribe)
    {
        $this->subscribe = $subscribe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): Subscribes
    {
        return $this
            ->to(['ml-shmd@ukr.net'])
            ->subject('Подписка на рассылку')
            ->view('mail.admin.subscribe');
    }
}
