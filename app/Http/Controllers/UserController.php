<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'prenom' => 'required|max:255|min:3|alpha|regex:/^[a-zA-Z]+$/u|not_regex:/[0-9]/',
            'nom' => 'required|max:255|min:3|alpha|regex:/^[a-zA-Z]+$/u|not_regex:/[0-9]/',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|date|before:today',
            'role' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tele' => 'required|numeric|digits:10',
        ]);

        $user = new User();
        $user->name = $request->nom;
        // $user->fname = $request->prenom;
        $user->email = $request->email;
        $user->phone = $request->tele;
        // $user->age = $request->age;
        $user->user_type = $request->role;
        if ($request->hasFile('image')) {
            $user->image = $request->file('image')->store('images', 'public');
        } else {
            // return $request;
            $user->image = 'images/default.png';
        }
        // to generate random password
        $user->password = bcrypt('password');


        $user->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('payments');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user->load('payments');

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
