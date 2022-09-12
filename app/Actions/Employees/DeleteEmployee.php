<?php
namespace App\Actions\Employees;

class DeleteEmployee
{
    public function destroy($employee)
    {
        return $employee->delete();
    }
}



?>