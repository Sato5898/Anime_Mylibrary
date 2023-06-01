<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['anime_name'];
    protected $table = 'schedules';

    public function select() {
        $schedule = DB::table('schedules')->get();
        return $schedule;
    }

    public function scheduleSelect($id) {
        $details = DB::table('schedules')->find($id);
        return $details;
    }
}
