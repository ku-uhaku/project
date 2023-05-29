<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewPayment extends Controller
{
    public function create(Request $request)
    {
        $user = User::findOrFail($request->user);

        // dd($user->payments->last()->remaining_amount);

        return view('dashboard.payments.editPayment', compact('user'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'total' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $payment = new Payment();

        $payment->student_id = $id;
        $payment->goal_amount = $request->total;
        $payment->remaining_amount = $request->total;
        $payment->amount_paid = $request->amount;
        $payment->bywho = Auth::user()->id;
        $payment->save();

        return redirect()->route('payments.index')->with('success', 'Payment added successfully');
    }
}
