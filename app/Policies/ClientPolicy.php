<?php

namespace App\Policies;

use App\Models\Client;

class ClientPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(Client $user, Client $client): bool
    {
        return $user->id === $client->id;
    }
}
