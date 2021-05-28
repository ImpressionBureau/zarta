<?php

namespace App\Mail\Admin;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Appointments extends Mailable
{
    use Queueable, SerializesModels;

    public Appointment $appointment;

    /**
     * Create a new message instance.
     *
     * @param Appointment $appointment
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): Appointments
    {
        return $this
            ->to('5.miska.likarnya@gmail.com')
            ->subject('Запись на приём')
            ->markdown('mail.admin.appointment');
    }
}
