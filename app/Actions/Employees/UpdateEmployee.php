<?php

namespace App\Actions\Employees;

class UpdateEmployee
{
    public function update($employee, $input)
    {
        return $employee->update($input);
    }
}
