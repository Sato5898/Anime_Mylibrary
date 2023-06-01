<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Detail;
use App\Models\Anime;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    /*詳細画面表示*/
    public function show($id){
        $details = Detail::join('broadcasts', 'animes.id', '=', 'broadcasts.id')->find($id);
        return view('detail', compact('details'));
    }

    /*一覧表にあるすべてのアニメを番組表に挿入*/
    public function add_schedule(){
        DB::update('UPDATE schedules SET schedules.anime_name = (select animes.anime_name from animes WHERE schedules.schedule_id = animes.schedule_id)');
        return redirect('schedule');
    }

    public function add_single($id){
        DB::raw('INSERT INTO schedules(schedules.anime_name) select (animes.anime_name) from animes WHERE (schedules.schedule_id = animes.schedule_id AND animes.id = ('.$id.'))');
        return redirect('schedule');
    }

    /*お気に入りリストに追加*/
    public function add_favorite($id){
        $user = Auth::id();
        $anime = Anime::find($id);
        $anime->user()->syncWithoutDetaching(['user_id'=>$user],['anime_id'=>$id]);
        return redirect('dashboard');
    }

    /*お気に入りリストから削除*/
    public function detach($id){
        $user = Auth::id();
        $anime = Anime::find($id);
        $anime->user()->detach($user);
        return redirect('favorite');
    }
}