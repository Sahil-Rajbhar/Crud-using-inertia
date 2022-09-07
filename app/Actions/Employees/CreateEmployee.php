<?php

namespace App\Actions\Employees;

use Illuminate\Support\Facades\Validator;

class CreateEmployee {
    public function create($user, $input)
    {        
        return $user->employees()->create($input);
    }
}