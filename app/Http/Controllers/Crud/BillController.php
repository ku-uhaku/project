<?php

namespace App\Http\Controllers\Crud;

use App\Models\Bill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::all();
        return view('dashboard.bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.bills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
        ]);

        $bill = new Bill();
        $bill->title = $request->title;
        $bill->description = $request->description;
        $bill->amount = $request->amount;
        $bill->bywho = Auth::user()->id;


        if ($bill->save()) {
            return redirect()->route('bills.index')->with('success', 'Bill created successfully');
        } else {
            return redirect()->route('bills.index')->with('error', 'Bill creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bill = Bill::findOrFail($id);
        return view('dashboard.bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
        ]);

        $bill = Bill::findOrFail($id);
        $bill->title = $request->title;
        $bill->description = $request->description;
        $bill->amount = $request->amount;
        $bill->bywho = Auth::user()->id;

        if ($bill->update()) {
            return redirect()->route('bills.index')->with('success', 'Bill updated successfully');
        } else {
            return redirect()->route('bills.index')->with('error', 'Bill update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        if ($bill->delete()) {
            return redirect()->route('bills.index')->with('success', 'Bill deleted successfully');
        } else {
            return redirect()->route('bills.index')->with('error', 'Bill deletion failed');
        }
    }
}
