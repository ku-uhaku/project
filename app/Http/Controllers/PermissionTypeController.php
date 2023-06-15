<?php

namespace App\Http\Controllers;

use App\Models\PermissionType;
use Illuminate\Http\Request;

class PermissionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $permissionTypes = PermissionType::all();

        return view('dashboard.permisType.index', compact('permissionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PermissionType $permissionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermissionType $permissionType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermissionType $permissionType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermissionType $permissionType)
    {
        //
    }
}
