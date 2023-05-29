<?php

namespace App\Http\Controllers\Crud;

use App\Models\User;

use App\Models\Spending;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->input('search');
        $spendings = Spending::select(
            'user_id as user_id',
            'name as user_name',
            'title as title',
            DB::raw('SUM(amount_spent) as amount_spent'),
            'spendings.created_at as created_at'
        )
            ->join('users', 'users.id', '=', 'spendings.user_id')
            ->groupBy('user_id')
            ->where('name', 'like', '%' . $name . '%')
            ->get();


        return view('dashboard.spendings.index', compact('spendings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        if ($request->user) {
            $user = User::findOrFail($request->user);
            if ($user->type == 'admin' || $user->type == 'instructor') {
                return view('dashboard.spendings.create', compact('user'));
            } else {
                return redirect()->route('spendings.index')->with('error', 'You must select a stuff first');
            }
        } else {
            return redirect()->route('spendings.index')->with('error', 'You must select a stuff first');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'amount_spent' => 'required|numeric',
        ]);

        $spending = new Spending();
        $spending->user_id = $request->id;

        $spending->title = $request->title;
        $spending->amount_spent = $request->amount_spent;
        $spending->bywho = Auth::user()->id;

        if ($spending->save()) {
            return redirect()->route('spendings.index')->with('success', 'Spending created successfully');
        } else {
            return redirect()->route('spendings.index')->with('error', 'Spending created failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $user = User::findOrFail($user);
        $spendings = Spending::select(
            'spendings.id',
            DB::raw(('(SELECT name FROM users WHERE users.id = spendings.user_id) as user')),
            'spendings.title',
            'spendings.amount_spent',
            'users.name as admin_name',
            'spendings.created_at',
            'spendings.updated_at',
        )
            ->where('spendings.user_id', $user->id)
            ->join('users', 'spendings.bywho', '=', 'users.id')
            ->get();

        // dd($spendings);
        return view('dashboard.spendings.show', compact('spendings', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spending $spending, Request $request)
    {
        if ($request->user) {
            $user = User::findOrFail($request->user);
            if ($user->type == 'admin' || $user->type == 'instructor') {
                return view('dashboard.spendings.edit', compact('user', 'spending'));
            } else {
                return redirect()->route('spendings.index')->with('error', 'You must select a stuff first');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spending $spending)
    {
        $request->validate([
            'title' => 'required',
            'amount_spent' => 'required|numeric',
        ]);

        $spending->title = $request->title;
        $spending->amount_spent = $request->amount_spent;
        $spending->bywho = Auth::user()->id;

        if ($spending->update()) {
            return redirect()->route('spendings.index')->with('success', 'Spending updated successfully');
        } else {
            return redirect()->route('spendings.index')->with('error', 'Spending updated failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spending $spending)
    {
        //
    }
}
