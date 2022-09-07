<?php
    namespace App\Actions\Employees;

    use Illuminate\Support\Facades\Validator;

    class DestroyEmployee {
        
        public function destroy($employee){
          
            return $employee->delete();

        }
    }


?>