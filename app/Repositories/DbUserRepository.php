<?php

namespace App\Repositories;

class DbUserRepository implements UserRepository
{
    public function create($attributes)
    {
        // User::create()
        echo "User is creating...& user name : ". $attributes;
    }
}
