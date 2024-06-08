<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    protected $doctor;

    public function __construct()
    {
        $this->doctor = new Doctor();
    }

    public function saveData(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'specialization' => 'required',
            'description' => 'required',
            'profile_picture' => 'required|mimes:png,jpg,jpeg,webp',
        ]);

        // Check if the request has a profile picture
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/img';
            $file->move(public_path($path), $filename);

            // Save the profile picture path to the request data
            $requestData = $request->all();
            $requestData['profile_picture'] = $path . '/' . $filename;
        } else {
            // If no profile picture is provided, continue with the original request data
            $requestData = $request->all();
        }

        // Create a new doctor record
        $this->doctor->create($requestData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Doctor data saved successfully.');
    }

    public function viewData()
    {
        // Fetch all doctor records
        $response['doctors'] = $this->doctor->all();

        // Return the view with the fetched data
        return view('admin.table.doctortable')->with($response);
    }

    public function deleteData($doc_id){
        $doctor  = $this->doctor->find($doc_id);
        $doctor ->delete();
        return redirect()->back();

    }

    public function editData($doc_id){
        $response['doctor'] = $this->doctor->find($doc_id);
        return view('admin.forms.updatedoctor')->with($response);

    }
    public function updateData(Request $request, $doc_id)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'specialization' => 'required',
        'description' => 'required',
        'profile_picture' => 'nullable|mimes:png,jpg,jpeg,webp',
    ]);

    $doctor = $this->doctor->find($doc_id);

    // Initialize request data array
    $requestData = $request->all();

    // Check if the request has a profile picture
    if ($request->hasFile('profile_picture')) {
        // Validate and store the new profile picture
        $file = $request->file('profile_picture');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/img';
        $file->move(public_path($path), $filename);

        // Delete the old profile picture if it exists
        if ($doctor->profile_picture) {
            Storage::disk('public')->delete($doctor->profile_picture);
        }

        // Save the new profile picture path to the request data
        $requestData['profile_picture'] = $path . '/' . $filename;
    }

    // Update the doctor with the request data
    $doctor->update($requestData);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Doctor data updated successfully.');
}
}

