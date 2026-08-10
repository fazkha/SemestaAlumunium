<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PurchaseOrder;
use Illuminate\Auth\Access\Response;

class PurchaseReceiptPolicy
{
    public function __construct()
    {
        //
    }

    public function viewAny()
    {
        //
    }

    public function view()
    {
        //
    }

    public function create(User $user)
    {
        return Response::deny('You are not allowed!');
        return $user->can('purchasereceipt-create')
            ? Response::allow()
            : Response::deny('You are not allowed!');
    }

    public function update(User $user, PurchaseOrder $order)
    {
        return Response::allow();
    }

    public function delete(User $user)
    {
        return Response::deny('You are not allowed!');
        return $user->can('purchasereceipt-delete')
            ? Response::allow()
            : Response::deny('You are not allowed!');
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
