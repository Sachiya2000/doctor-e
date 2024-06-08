<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class FeedbackController extends Controller
{
    //
    protected $feedback;

    public function __construct()
    {
        $this->feedback = new Feedback();
    }
    public function saveData(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'feedback' => 'required|string|max:255',
            'client_id' => 'required|exists:users,id',
        ]);


        Feedback::create([
            'feedback' => $request->feedback,
            'client_id' => $request->client_id,
        ]);


        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }
    public function viewData(Request $request)
{


    $query = Feedback::query();



    $feedbacks = $query->get();
    $users = User::all();

    return view('admin.blog.feedbacktable', compact('feedbacks', 'users'));
}
public function view(Request $request)
{
    $feedbacks = Feedback::with('user')->get();
    return view('home.clientsection', compact('feedbacks'));
}


public function edit($id)
{
    $feedback = Feedback::findOrFail($id);
    return view('admin.blog.updatefeedbacktable', compact('feedback'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'feedback' => 'required|string|max:255',
    ]);

    $feedback = Feedback::findOrFail($id);
    $feedback->update($validatedData);

    return redirect()->back()->with('success', 'Feedback updated successfully!');
}

public function destroy($id)
{
    $feedback = Feedback::findOrFail($id);
    $feedback->delete();

    return redirect()->route('feedback.index')->with('success', 'Feedback deleted successfully!');
}

}
