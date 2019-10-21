<?php

namespace App\Http\Controllers\Front;

use App\Mail\Admin\Appointments;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AppointmentsController extends Controller
{
    public function form(Request $request)
    {
        $appointment = Appointment::create([
           'name' =>$request->input('form-name'),
           'phone' => $request->input('form-phone'),
           'email' => $request->input('form-email')
        ]);
        $type = 'appointment';
        Mail::send(new Appointments($appointment));
        return \view('app.pages.thanks', compact('type'));
    }

    public function modal(Request $request)
    {
        $appointment = Appointment::create([
            'name' =>$request->input('modal-name'),
            'phone' => $request->input('modal-phone'),
            'email' => $request->input('modal-email'),
            'service_id' => $request->input('modal-service'),
        ]);
        $type = 'appointment';
        Mail::send(new Appointments($appointment));
        return \view('app.pages.thanks', compact('type'));
    }
}
