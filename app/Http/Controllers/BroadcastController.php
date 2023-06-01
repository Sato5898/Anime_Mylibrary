<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Broadcast;

class BroadcastController extends Controller
{
    public function show(){
        $broadcasts = Broadcast::all();

        return view('schedule_edit',compact('broadcasts'))
        ->with([
            'broadcasts' => $broadcasts,
        ]);
    }

    public function edit(Anime $anime)
    {
        $broadcasts = Broadcast::all();

        return view('schedule_edit')
            ->with([
                'broadcasts' => $broadcasts,
                'anime' =>$anime,
            ]);
    }
}
