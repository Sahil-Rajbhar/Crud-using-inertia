<?php

namespace App\Actions\Employees;

class DestroyEmployee
{
    public function destroy($employee)
    {
        return $employee->delete();
    }
}
