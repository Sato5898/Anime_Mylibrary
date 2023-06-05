<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function form() {
        $schedule = new Schedule;
        $schedules = $schedule->select();
        return view('schedule', compact('schedules'));
    }

    public function clear() {
        Schedule::where('anime_name', '!=', 'NULL')->update([
            'anime_name' => NULL,
        ]);
        return redirect('schedule');
    }
    public function set() {
        DB::update('UPDATE animes SET animes.schedule_id = ( SELECT broadcasts.schedule_id FROM broadcasts where animes.id = broadcasts.id');
        return redirect()->route('dashboard')->with('flash_message', 'クリアが完了しました');
    }
    
}
