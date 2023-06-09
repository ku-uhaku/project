<?php

namespace App\Http\Controllers\Crud;

use App\Models\User;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('dashboard.vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = User::where('type', 'instructor')->get();
        return view('dashboard.vehicles.create', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'matricule' => 'required',
            'model' => 'required',
            'image' => '',
            'instructors' => '',
        ]);


        $vehicle = new Vehicle();

        $vehicle->title = $request->title;
        $vehicle->matricule = $request->matricule;
        $vehicle->model = $request->model;
        $vehicle->user_id = $request->instructors;

        if ($request->hasFile('image')) {

            // Hash the image name and store it in the folder & update the user object
            $image = $request->image;
            $image->store('public/vehicles');
            $vehicle->image = $image->hashName();
        }


        $vehicle->save();

        return redirect()->route('vehicles.index')->with('success', 'L\'Vehicles a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($vehicle)
    {
        $instructors = User::where('type', 'instructor')->get();
        $vehicle = Vehicle::findOrFail($vehicle);
        return view('dashboard.vehicles.show', compact('vehicle', 'instructors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        $instructors = User::where('type', 'instructor')->get();
        return view('dashboard.vehicles.edit', compact('vehicle', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'title' => 'required',
            'matricule' => 'required',
            'model' => 'required',
            'image' => '',
            'instructors' => '',
        ]);

        $vehicle->title = $request->title;
        $vehicle->matricule = $request->matricule;
        $vehicle->model = $request->model;
        $vehicle->user_id = $request->instructors;

        if ($request->hasFile('image')) {

            // Hash the image name and store it in the folder & update the user object
            $image = $request->image;
            $image->store('public/vehicles');
            $vehicle->image = $image->hashName();
        }

        $vehicle->update();

        return redirect()->route('vehicles.index')->with('success', 'L\'vehicle a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->delete()) {
            return redirect()->route('vehicles.index')->with('success', 'L\'vehicle a été supprimé avec succès');
        } else {
            return redirect()->route('vehicles.index')->with('error', 'Quelque chose s\'est mal passé');
        }
    }
}
