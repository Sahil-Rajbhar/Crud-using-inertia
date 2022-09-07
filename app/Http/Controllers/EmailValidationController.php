<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailValidationController extends Controller
{
    //

    public function validateEmail(Request $request)
    {
        return $request->validate(['email' => 'unique:employees,email'.$request->id ?? null]);
    }
}
