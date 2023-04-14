<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $instructors = User::All()->where('user_type', 'instructor');
        $cars = Vehicle::All();
        $user = User::findOrFail($request->user);
        return view('admin.exam.create', compact('user', 'instructors', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'instructor' => 'required',
            'vehicle' => 'required',
            'type' => 'required',
            'exam_date' => 'required|date',
            'title' => '',
            'exam_time' => 'required',
            'location' => 'required',
            'result' => '',
        ]);

        $exam = new Exam();
        $exam->student_id = $request->id;
        $exam->instructor_id = $request->instructor;
        $exam->vehicle_id = $request->vehicle;
        $exam->exam_type = $request->type;
        $exam->exam_date = $request->exam_date;
        $exam->exam_title = $request->title;
        $exam->exam_time = $request->exam_time;
        $exam->exam_location = $request->location;
        $exam->exam_result = $request->result;
        $exam->save();
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
