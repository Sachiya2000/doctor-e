<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Feedback;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    protected $user;
    protected $doctor;


    public function __construct()
    {
        $this->user = new User();
    }

// DoctorController.php

public function index(Request $request)
{
    // Check if the user is authenticated
    if (!Auth::check()) {
        return redirect()->route('login'); // Or any other route you want to redirect to
    }

    // Get the authenticated user's type
    $usertype = Auth::user()->usertype;

    // Fetch distinct specializations for the filter dropdown
    $specializations = Doctor::select('specialization')->distinct()->get();

    // Initialize the query
    $query = Doctor::query();

    // Apply the filter if specialization is selected
    if ($request->has('specialization') && $request->specialization != '') {
        $query->where('specialization', $request->specialization);
    }

    $doctors = $query->get();

    switch ($usertype) {
        case 'user':
            return view('doctorcard', compact('doctors', 'specializations'));

        case 'admin':
            $doctorCount = Doctor::count();
            $clientCount = User::where('usertype', 'user')->count();
            $adminCount = User::where('usertype', 'admin')->count();
            $appoinment = Appointment::count();
            return view('admin.admindashboard',compact('doctorCount','clientCount','appoinment','adminCount'));

        default:
            return redirect()->back();
    }
}


    public function viewData()
{
    $response['users'] = User::where('usertype', 'user')->get();
    return view('admin.table.clienttable')->with($response);
}

public function viewadminData()
{
    $response['users'] = User::where('usertype', 'admin')->get();
    return view('admin.table.admintable')->with($response);
}



public function deleteData($user_id){
    $user  = $this->user->find($user_id);
    $user ->delete();
    return redirect()->back();

}

public function editData($user_id){
    $response['user'] = $this->user->find($user_id);
    return view('admin.forms.updateuser')->with($response);

}


public function updateData(Request $request, $user_id)
{
    // Validate the incoming request
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',

        'profile_picture' => 'nullable|mimes:png,jpg,jpeg,webp',
    ]);

    $user = $this->user->find($user_id);

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
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Save the new profile picture path to the request data
        $requestData['profile_picture'] = $path . '/' . $filename;
    }

    // Update the user with the request data
    $user->update($requestData);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'User data updated successfully.');
}
    public function post(){
        return view("post");
    }
    public function homepage(){

        $service = Service::all();
        $feedbacks = Feedback::with('user')->get();

        return view('home.home',compact('service','feedbacks'));
    }

}
