<?php 

namespace App\Actions\Users;

class UpdateUser
{
    public function update($user, $input)
    {       
        return $user->update($input);
    }
}



?>