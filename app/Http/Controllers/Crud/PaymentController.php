<?php

namespace App\Http\Controllers\Crud;

use App\Models\User;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $students = User::with(['payments' => function ($query) {
            $query->select(
                'student_id',
                DB::raw('SUM(amount_paid) as amount_paid'),
                DB::raw('MAX(goal_amount) as total_amount'),
                DB::raw('MAX(payment_date) as latest_payment_date')
            )
                ->groupBy('student_id');
            // ->orderBy('latest_payment_date', 'desc');
        }])
            ->where('type', 'student')
            ->when($name, function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            // ->orderBy('payments.latest_payment_date', 'desc')
            ->get(['users.id', 'users.name']);

        return view('dashboard.payments.index', compact('students', 'name'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $user = User::findOrFail($request->user);

        // dd($user->payments->last()->remaining_amount);

        return view('dashboard.payments.create', compact('user'));
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
        $payment->save();

        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $user = User::findOrFail($user);








        return view('dashboard.payments.show', compact('user'));
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
