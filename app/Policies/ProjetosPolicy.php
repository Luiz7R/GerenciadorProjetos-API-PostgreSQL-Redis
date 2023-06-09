<?php

namespace App\Policies;

use App\Models\Projetos;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProjetosPolicy
{

    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        $allowedRoles = [User::ADM, User::MANAGER];

        $isAllowed = in_array($user->role, $allowedRoles);
        return $isAllowed ? Response::allow() : Response::deny('Acesso Negado');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Projetos $projetos)
    {
        $allowedRoles = [User::ADM, User::MANAGER, User::EMPLOYEE];
        $isAllowed = in_array($user->role, $allowedRoles);
        return $isAllowed ? Response::allow() : Response::deny('Acesso Negado');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Projetos $projetos)
    {
        return $user->role === User::ADM
            ? Response::allow() : Response::deny('Acesso Negado');
    }
}
