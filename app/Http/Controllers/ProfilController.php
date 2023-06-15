<?php

namespace App\Http\Controllers;


use App\Models\Exam;
use App\Models\User;
use App\Models\Payment;
use App\Models\Session;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {


        $user = User::findOrFail(Auth::user()->id);


        $payments = Payment::select(
            'payments.id',
            // DB::raw(('(SELECT id FROM users WHERE users.id = payments.student_id) as student_name')),
            DB::raw(('(SELECT name FROM users WHERE users.id = payments.student_id) as student_name')),
            'payments.amount_paid',
            'payments.goal_amount',
            'payments.remaining_amount',
            'payments.payment_date',
            'users.name as admin_name'
        )
            ->where('payments.student_id', Auth::user()->id)
            ->join('users', 'payments.bywho', '=', 'users.id')
            ->get();
        $exams = DB::select('select * from exam_user where user_id = ?', [Auth::user()->id]);
        foreach ($exams as $exam) {
            $exam = Exam::findOrFail($exam->exam_id);
            $instructor_exam = User::find($exam->instructor_id);
            $vehicle = Vehicle::find($exam->vehicle_id);
        };

        $sessions = DB::select('select * from session_user where user_id = ?', [Auth::user()->id]);
        $sessionArray = [];
        foreach ($sessions as $session) {
            $session = Session::findOrFail($session->session_id);
            $instructor_session = User::find($session->instructor_id);
            $vehicle_session = Vehicle::find($session->vehicle_id);
            $sessionArray[] = array(
                'session' => $session,
                'instructor_session' => $instructor_session,
                'vehicle_session' => $vehicle_session
            );
            //push the session in the array
            // dd($sessionArray);
        }




        // $exam = Exam::with('user')->find($exam->id);
        return view('auth.profile', compact('user', 'payments', 'exam', 'instructor_exam', 'vehicle', 'sessionArray'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the request
        dd($user);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'birthdate' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update the user object
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthdate = $request->birthdate;
        $user->bywho = Auth::user()->id;

        // Check if the request has a file
        if ($request->hasFile('image')) {

            // Delete the old image
            if ($user->image) {
                unlink(storage_path('app/public/profiles/' . $user->image));
            }

            // Hash the image name and store it in the folder & update the user object
            $image = $request->image;
            $image->store('public/profiles');
            $user->image = $image->hashName();
        }


        // Save the user object with an error/success message
        if ($user->update()) {
            // update the session
            // return redirect()->back()->with('success', 'L\'utilisateur a été modifié avec succès');
            return redirect()->route('users.index')->with('success', "L'utilisateur a été modifié avec succès");
        } else {
            dd($user->errors);
        }

        // return redirect()->route('dashboard.users.index')->with('massage', "L'utilisateur a été modifié avec succès");
    }
}
