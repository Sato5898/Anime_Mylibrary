<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detail extends Model
{
    use HasFactory;
    protected $table = 'animes';

    /*選択したアニメ詳細を表示させる
    　animesテーブルとbroadcastsテーブルを結合させ取得*/
    public function show($id){
        $summaries = DB::table('animes')
            ->select('animes.anime_name', 'animes.genre', 'animes.official_page', 'broadcasts.broadcast')
            ->join('broadcasts', 'animes.id', '=', 'broadcasts.anime_id')
            ->find($id);
        return $summaries;
    }

}
