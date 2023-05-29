<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use App\Models\Payment;
use App\Models\Spending;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $admins = User::where('type', 'admin')->get();


        return view('superAdmin.index', compact(['admins']));
    }
    public function filter(Request $request)
    {
        $admins = User::where('type', 'admin')->get();

        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');
        $admin = $request->input('admin');
        $type = $request->input('type');

        // Use the year and month to filter user data
        $query = User::query();


        if ($year) {
            $query->whereYear('created_at', $year);
        }

        if ($month) {
            $query->whereMonth('created_at', $month);
        }

        if ($day) {
            $query->whereDay('created_at', $day);
        }

        if ($admin) {
            $query->where('bywho', $admin);
        }

        if ($type) {
            $query->where('type', $type);
        }


        $users = $query->paginate('10');


        if ($users->isEmpty()) {
            // No users found, return the view without passing any data
            return view('superAdmin.index', compact('admins'));
        }

        // Pass the filtered data to the view
        return view('superAdmin.index', compact(['admins', 'users']));
    }

    public function profits()
    {
        return view('superAdmin.profits');
    }

    public function filterProfits(Request $request)
    {
        $admins = User::where('type', 'admin')->get();

        $year = $request->input('year');
        $month = $request->input('month');
        $day = $request->input('day');
        $admin = $request->input('admin');
        $start = $request->input('start');
        $end = $request->input('end');

        $paymentQuery = Payment::query()->where('amount_paid', '!=', 0);
        $spendingsQuery = Spending::query()->where('amount_spent', '!=', 0);
        $billsQuery = Bill::query();

        if ($year) {
            $paymentQuery->whereYear('created_at', $year);
            $spendingsQuery->whereYear('created_at', $year);
            $billsQuery->whereYear('created_at', $year);
        }

        if ($month) {
            $paymentQuery->whereMonth('created_at', $month);
            $spendingsQuery->whereMonth('created_at', $month);
            $billsQuery->whereMonth('created_at', $month);
        }

        if ($day) {
            $paymentQuery->whereDay('created_at', $day);
            $spendingsQuery->whereDay('created_at', $day);
            $billsQuery->whereDay('created_at', $day);
        }

        if ($admin) {
            $paymentQuery->where('bywho', $admin);
            $spendingsQuery->where('bywho', $admin);
            $billsQuery->where('bywho', $admin);
        }

        $payments = $paymentQuery->paginate(10);
        $spendings = $spendingsQuery->paginate(10);
        $bills = $billsQuery->paginate(10);

        $totalPayment = $payments->sum('amount_paid');
        $totalSpending = $spendings->sum('amount_spent');
        $totalBills = $bills->sum('amount');
        $total = $totalPayment - $totalSpending - $totalBills;

        return view('superAdmin.profits', compact('admins', 'payments', 'spendings', 'bills', 'totalPayment', 'totalSpending', 'totalBills', 'total'));
    }
}
