<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\inertia;
use App\Http\Requests\UserRequest;
use App\Actions\Users\UpdateUser;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        return Inertia::render('User/Create', compact('user'));
    }

    public function update(UserRequest $request, UpdateUser $updator) 
    {       
        $user = User::find($request->id);
        $updator->update($user, $request->all());
        echo "updated";
    }

}