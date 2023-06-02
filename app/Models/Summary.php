<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Summary extends Model
{
    use HasFactory;
    protected $table = 'animes';

    /*一覧表の表示*/
    public function select() {
        $animes = DB::table('animes')
        ->get();
        return $animes;
    }

    protected $dates = ['deleted_at'];
}
