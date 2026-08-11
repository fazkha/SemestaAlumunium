<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use App\Http\Requests\NotifRequest;
use App\Http\Requests\NotifUpdateRequest;

class NotifController extends Controller
{
    public function count()
    {
        $count = Notif::where('isactive', 1)->count();

        return response()->json([
            'count' => $count,
        ]);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(NotifRequest $request)
    {
        //
    }

    public function show(Notif $notif)
    {
        //
    }

    public function edit(Notif $notif)
    {
        //
    }

    public function update(NotifUpdateRequest $request, Notif $notif)
    {
        //
    }

    public function destroy(Notif $notif)
    {
        //
    }
}
