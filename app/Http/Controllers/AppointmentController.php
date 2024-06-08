<?php

namespace App\Http\Controllers;
use App\DTOs\AppointmentDTO;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use Auth;
use PDF;

class AppointmentController extends Controller
{

    protected $appoinment;
    protected $doctor;

    public function __construct()
    {
        $this -> appoinment = new Appointment();
        $this -> doctor = new Doctor();
    }
    public function create($doc_id)
    {
        $doctor = Doctor::find($doc_id);
        return view('user.appoinmentform')->with('doctor', $doctor);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        Appointment::create($validatedData);

        return redirect()->route('appointments.create', ['doc_id' => $validatedData['doctor_id']])
            ->with('success', 'Appointment booked successfully!');
    }


public function viewData(Request $request)
{
    $month = $request->get('month');
    $year = $request->get('year');

    $query = Appointment::query();

    if ($month && $year) {
        $query->whereMonth('appointment_date', $month)
              ->whereYear('appointment_date', $year);
    }

    $appointments = $query->get();
    $doctors = Doctor::all();

    return view('admin.table.apoinmenttable', compact('appointments', 'doctors'));
}
public function generatePDF(Request $request)
{
    $month = $request->get('month');
    $year = $request->get('year');

    $query = Appointment::query();

    if ($month && $year) {
        $query->whereMonth('appointment_date', $month)
              ->whereYear('appointment_date', $year);
    }

    $appointments = $query->get();
    $doctors = Doctor::all();

    $pdf = PDF::loadView('admin.table.appointments_pdf', compact('appointments', 'doctors'))
    ->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif'])
    ->setPaper('a4', 'landscape')
    ->setWarnings(false)
    ->setWarnings(true);

return $pdf->stream('appointments.pdf');

}
public function edit($id)
{
    $appointment = Appointment::findOrFail($id);
    $doctors = Doctor::all();
    return view('admin.table.edit_appointment', compact('appointment', 'doctors'));
}
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'patient_id' => 'required|exists:users,id',
        'doctor_id' => 'required|exists:doctors,id',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required|date_format:H:i',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
    ]);

    $appointment = Appointment::findOrFail($id);
    $appointment->update($validatedData);

    return redirect()->route('appointments.index')
        ->with('success', 'Appointment updated successfully!');
}

public function destroy($id)
{
    $appointment = Appointment::findOrFail($id);
    $appointment->delete();

    return redirect()->route('appointments.index')
        ->with('success', 'Appointment deleted successfully!');
}

}


