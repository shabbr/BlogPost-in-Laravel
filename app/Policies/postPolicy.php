<?php

namespace App\Policies;

use App\Models\User;

use App\Models\Post;
class postPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }
    public function check(User $user){
        return $user->name=== 'charm';
      
    }
}
