<?php

namespace App\Policies;

use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ServicePerbaikanPolicy
{
    public function __construct()
    {
        //
    }

    public function viewAny()
    {
        //
    }

    public function view(): Response
    {
        return Response::denyWithStatus(404);
    }

    public function create(User $user, ServiceOrder $order): Response
    {
        // return $user->hasRole('Super Admin') || $user->hasRole('Admin') || $user->can('perbaikan-create')
        //     ? Response::allow()
        //     : Response::deny('You are not allowed!');
    }

    public function update(User $user, ServiceOrder $order)
    {
        // return $order->approved == 1
        //     ? Response::allow()
        //     : Response::deny('You are not allowed!');
    }

    public function delete(User $user, ServiceOrder $order)
    {
        // return $order->approved == 1
        //     ? Response::allow()
        //     : Response::deny('You are not allowed!');
    }

    public function restore()
    {
        //
    }

    public function forceDelete()
    {
        //
    }
}
