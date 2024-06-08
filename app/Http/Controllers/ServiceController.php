<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    //
    protected $services;

    public function __construct()
    {
        $this ->services=new Service();
    }

    public function saveData(Request $request)
    {
        // Validate the incoming request
        $request->validate([


            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'title'=>'required',
            'description' => 'required',

        ]);

        // Check if the request has a profile picture
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/img';
            $file->move(public_path($path), $filename);

            // Save the profile picture path to the request data
            $requestData = $request->all();
            $requestData['image'] = $path . '/' . $filename;
        } else {
            // If no profile picture is provided, continue with the original request data
            $requestData = $request->all();
        }

        // Create a new doctor record
        $this->services->create($requestData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'data saved successfully.');
    }


    public function viewData()
    {
        // Fetch all doctor records
        $response['services'] = $this->services->all();

        // Return the view with the fetched data
        return view('admin.blog.services')->with($response);
    }


    public function deleteData($id){
        $service = $this->services->find($id);
        $service->delete();
        return redirect()->back();

    }

    public function editData($id){
        $response['service'] = $this->services->find($id);
        return view('admin.blog.updateservices')->with($response);

    }
    public function updateData(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([

        'image' => 'required|mimes:png,jpg,jpeg,webp',
        'title'=>'required',
        'description' => 'required',
    ]);

   $service = $this->services->find($id);

    // Initialize request data array
    $requestData = $request->all();

    // Check if the request has a profile picture
    if ($request->hasFile('image')) {
        // Validate and store the new profile picture
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads/img';
        $file->move(public_path($path), $filename);

        // Delete the old profile picture if it exists
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        // Save the new profile picture path to the request data
        $requestData['image'] = $path . '/' . $filename;
    }

    // Update the doctor with the request data
   $service->update($requestData);

    // Redirect back with a success message
    return redirect()->back()->with('success', ' data updated successfully.');
}

}
