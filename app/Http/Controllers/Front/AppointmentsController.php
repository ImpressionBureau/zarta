<?php

namespace App\Http\Controllers\Front;

use App\Mail\Admin\Appointments;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use function view;

class AppointmentsController extends Controller
{
    public function form(Request $request)
    {
        $appointment = Appointment::create(
            $request->only('name', 'phone', 'email', 'service_type', 'service_id')
        );

        $type = 'appointment';

        Mail::send(new Appointments($appointment));

        return view('app.pages.thanks', compact('type'));
    }
}
