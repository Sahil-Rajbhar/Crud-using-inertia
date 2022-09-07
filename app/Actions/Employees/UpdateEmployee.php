<?php 
    namespace App\Actions\Employees;

    use Illuminate\Support\Facades\Validator;

    class UpdateEmployee{

        public function update($employee, $input){
            
            return $employee->update($input);
           
        }
    } 



?>