<?php

namespace App\Http\Controllers\Crud;

use App\Models\User;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {

    //     if (request('search')) {

    //         $search = $request->input('search');
    //         // dd($search);
    //         $payments = Payment::with('user')
    //             ->whereHas('user', function ($query) use ($search) {
    //                 $query->where('name', 'like', '%' . $search . '%');
    //             })
    //             ->get();
    //     } else {
    //         $students = User::with(['payments' => function ($query) {
    //             $query->select(
    //                 'student_id',
    //                 DB::raw('SUM(amount_paid) as amount_paid'),
    //                 DB::raw('MAX(goal_amount) as total_amount'),
    //                 DB::raw('MAX(payment_date) as latest_payment_date')
    //             )
    //                 ->groupBy('student_id')->orderBy('latest_payment_date', 'desc');
    //         }])
    //             ->where('type', 'student')
    //             // ->orderBy('created_at', 'desc')
    //             ->get(['id', 'name']);
    //     };
    //     return view('dashboard.payments.index', compact('students'));
    // }
    public function index(Request $request)
    {

        $name = $request->input('search');

        $payments = Payment::select(
            'student_id as user_id',
            'name as user_name',
            DB::raw('(SELECT goal_amount FROM payments p2 WHERE p2.student_id = payments.student_id ORDER BY created_at DESC LIMIT 1) as last_goal_amount'),
            DB::raw('SUM(amount_paid) as amount_paid'),
            'payment_date as latest_payment_date',
            'remaining_amount',
        )
            ->join('users', 'users.id', '=', 'payments.student_id')
            ->groupBy('student_id')
            ->orderBy('latest_payment_date', 'desc')
            ->where('name', 'like', '%' . $name . '%')
            ->get();





        return view('dashboard.payments.index', compact('payments', 'name'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->all());

        if ($request->user) {
            $user = User::findOrFail($request->user);
            return view('dashboard.payments.create', compact('user'));
        } else {
            return redirect()->route('payments.index')->with('error', 'You must select a student first');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'student_id' => 'required',
            'total' => 'required|numeric',

        ]);

        $payment = new Payment();
        $payment->student_id = $request->id;

        $payment->goal_amount = $request->total;

        $payment->payment_date = $request->date;
        $payment->bywho = Auth::user()->id;
        $payment->save();

        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $user = User::findOrFail($user);

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
            ->where('payments.student_id', $user->id)
            ->join('users', 'payments.bywho', '=', 'users.id')
            ->get();


        return view('dashboard.payments.show', compact(['payments', 'user']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $user)
    {
        $user = User::findOrFail($user);

        // $payment = Payment::findOrFail($payment);
        // $user = User::findOrFail($request->user);
        return view('dashboard.payments.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
