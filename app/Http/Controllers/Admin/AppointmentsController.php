<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AppointmentsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return \view('admin.appointments.index', [
            'appointments' => Appointment::latest()->paginate(20),
        ]);
    }
    /**
     * @param Appointment $appointment
     * @return View
     */
    public function edit(Appointment $appointment): View
    {
        return \view('admin.appointments.edit', compact('appointment'));
    }

    /**
     * @param Request $request
     * @param Appointment $appointment
     * @return RedirectResponse
     */
    public function update(Request $request, Appointment $appointment): RedirectResponse
    {
        $appointment->update($request->only('status', 'message'));

        return \redirect()->route('admin.appointments.index')
            ->with('message', 'Запись успешно сохранена.');
    }
}
