<?php

namespace App\Http\Controllers\Front;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentsController extends Controller
{
    public function form(Request $request)
    {
        Appointment::create([
           'name' =>$request->input('form-name'),
           'phone' => $request->input('form-phone'),
           'email' => $request->input('form-email')
        ]);
        return \redirect()->route('app.home');
    }

    public function modal(Request $request)
    {
        Appointment::create([
            'name' =>$request->input('modal-name'),
            'phone' => $request->input('modal-phone'),
            'email' => $request->input('modal-email'),
            'service_id' => $request->input('modal-service'),
        ]);
        return \redirect()->route('app.home');
    }
}
