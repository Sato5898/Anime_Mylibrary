<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\Anime;
use App\Models\Broadcast;

class AnimeController extends Controller
{
    public function add_insert(Request $request){
        $request->validate([
            'anime_name' => 'required',
            'genre' => 'required',
            'image_color' => 'required',
            'official_page' => 'required',
            'broadcast' => 'required',
            'on_air_date' => 'required',
            'on_air_time' => 'required',
            'streaming' => 'required', 
        ]);

        $anime = new Anime();
        $anime->anime_name = $request->input('anime_name');
        $anime->genre = $request->input('genre');
        $anime->image_color = $request->input('image_color');
        $anime->official_page = $request->input('official_page');
        $anime->save();

        $broadcast = new  Broadcast();
        $broadcast->broadcast = $request->input('broadcast');
        $broadcast->on_air_date = $request->input('on_air_date');
        $broadcast->on_air_time = $request->input('on_air_time');
        $broadcast->streaming = $request->input('streaming');
        if($broadcast->on_air_date == '月' && $broadcast->on_air_time == '23:00~23:30'){
            $broadcast->schedule_id = 12;
        }
        $broadcast->save();

        return redirect('add')->with('flash_message', '登録が完了しました');
    }
}
