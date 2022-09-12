<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EmailValidationController;

class EmailValidationController extends Controller
{
    public function validateEmail(Request $request)
    {            
        return $request->validate(['email' => 'unique:employees,email'.$request->id ?? null]);
        
    }

    public function validateUserEmail(Request $request)
    {           
        return $request->validate(['email' => 'unique:users,email'.$request->id]);
        
    }
}