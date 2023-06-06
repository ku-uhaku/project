<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    public function error403()
    {
        return view('errors.403');
    }

    public function error404()
    {
        return view('errors.404');
    }
}
