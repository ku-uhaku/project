<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = User::findOrFail($request->user);
        $user->load('payments');

        return view('admin.payment.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'total' => 'numeric|min:0',
        ]);


        $payment = new Payment();

        $payment->amount_paid = $request->amount;
        $payment->goal_amount = $request->total;
        $payment->remaining_amount = $request->total;
        $payment->student_id = $request->id;

        //date of this day format : 2021-05-05
        $payment->payment_date = now();
        $payment->save();

        return redirect()->route('admin.users.show', $request->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $user = User::findOrFail($user);
        $user->load('payments');


        return view('admin.payment.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
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
