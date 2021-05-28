<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Admin\Appointments;
use App\Models\Appointment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function view;

class AppointmentsController extends Controller
{
    public function form(Request $request)
    {
        $appointment = Appointment::create(
            $request->only('name', 'phone', 'email', 'service_type', 'service_id')
        );

        try {
            Mail::send(new Appointments($appointment));
        } catch (Exception$exception) {
            // silent mode
        }

        return view('app.pages.thanks', [
            'type' => 'appointment'
        ]);
    }
}
