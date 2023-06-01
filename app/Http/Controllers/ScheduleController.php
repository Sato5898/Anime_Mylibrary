<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function form() {
        $schedule = new Schedule;
        $schedules = $schedule->select();
        return view('schedule', compact('schedules'));
    }

    public function clear() {
        Schedule::where('anime_name', 'LIKE', 'anime'.'%')->update([
            'anime_name' => NULL,
        ]);
        return redirect('schedule');
    }
    
}
