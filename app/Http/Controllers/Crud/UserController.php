<?php

namespace App\Http\Controllers\Crud;

use App\Models\User;

use Illuminate\Http\Request;
use App\Models\PermissionType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $users = User::where('name', 'like', '%' . request('search') . '%')->where('id', '!=', Auth::user()->id)->where('type', '!=', 'superAdmin')->where('type', '!=', 'admin')->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $users = User::orderBy('created_at', 'desc')->where('type', '!=', 'superAdmin')->where('type', '!=', 'admin')->paginate(10);
        }
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = PermissionType::all();

        return view('dashboard.users.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required',
            'birthdate' => 'required',
            'password' => 'required|confirmed',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Check if password and password_confirmation are the same
        if ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Password and password confirmation are not the same');
        }

        // Create a new user object
        $user = new User();
        $users = User::paginate(10);

        // Assign the values to the user object
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->birthdate = $request->birthdate;
        $user->password = bcrypt($request->password);
        $user->bywho = Auth::user()->id;
        $user->permission_type = $request->permission_type;

        // Check if the request has a file
        if ($request->hasFile('image')) {

            // Hash the image name and store it in the folder & update the user object
            $image = $request->image;
            $image->store('public/profiles');
            $user->image = $image->hashName();
        }

        // Save the user object with an error/success message
        if ($user->save()) {
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } else {
            return view('dashboard.users.index', compact('users'))->with('error', 'User creation failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if ($user->id == Auth::user()->id) {
            return redirect()->route('profile');
        } else {
            $bywho = User::find($user->bywho);
            return view('dashboard.users.show', compact(['user', 'bywho']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if ($user->id == Auth::user()->id) {
            return redirect()->route('profile');
        } else {
            return view('dashboard.users.edit', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate the request
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
        if ($user->save()) {
            // update the session
            // return redirect()->back()->with('success', 'L\'utilisateur a été modifié avec succès');
            return redirect()->route('users.index')->with('success', "L'utilisateur a été modifié avec succès");
        } else {
            dd($user->errors);
        }

        // return redirect()->route('dashboard.users.index')->with('massage', "L'utilisateur a été modifié avec succès");
    }

    /**
     * Delete the user from the database
     */
    public function destroy(User $user)
    {
        // Delete the user object with an error/success message
        if ($user->delete()) {
            return redirect()->route('users.index')->with('success', 'L\'utilisateur a été supprimé avec succès');
        } else {
            return redirect()->route('users.index')->with('error', 'Quelque chose s\'est mal passé');
        }
    }
}
