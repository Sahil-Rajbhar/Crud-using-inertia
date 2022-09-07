<?php

namespace App\Actions\Employees;

class CreateEmployee
{
    public function create($user, $input)
    {
        return $user->employees()->create($input);
    }
}
