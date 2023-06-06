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
        return redirect()->route('schedule')->with('flash_message_clear', '値のクリアが完了しました');
    }
    public function set() {
        DB::update('UPDATE animes SET animes.schedule_id = ( SELECT broadcasts.schedule_id FROM broadcasts where animes.id = broadcasts.id)');
        return redirect()->route('dashboard')->with('flash_message_add', '値の更新が完了しました');
    }
    
}
