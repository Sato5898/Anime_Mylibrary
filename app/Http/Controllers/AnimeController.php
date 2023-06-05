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
        
        if($broadcast->on_air_date == '日'){
            switch($broadcast->on_air_time){
                case $broadcast->on_air_time == '23:00~23:30':
                    $broadcast->schedule_id = 11;
                    break;
                case $broadcast->on_air_time == '23:30~24:00':
                    $broadcast->schedule_id = 21;
                    break;
                case $broadcast->on_air_time == '24:00~24:30':
                    $broadcast->schedule_id = 31;
                    break;
                case $broadcast->on_air_time == '24:30~25:00':
                    $broadcast->schedule_id = 41;
                    break;
                case $broadcast->on_air_time == '25:00~25:30':
                    $broadcast->schedule_id = 51;
                    break;
                case $broadcast->on_air_time == '25:30~26:00':
                    $broadcast->schedule_id = 61;
                    break;
                case $broadcast->on_air_time == '26:00~26:30':
                    $broadcast->schedule_id = 71;
                    break;
                default:
                    $broadcast->schedule_id = NULL;
            }
        }elseif($broadcast->on_air_date == '月'){
            switch($broadcast->on_air_time){
                case $broadcast->on_air_time == '23:00~23:30':
                    $broadcast->schedule_id = 12;
                    break;
                case $broadcast->on_air_time == '23:30~24:00':
                    $broadcast->schedule_id = 22;
                    break;
                case $broadcast->on_air_time == '24:00~24:30':
                    $broadcast->schedule_id = 32;
                    break;
                case $broadcast->on_air_time == '24:30~25:00':
                    $broadcast->schedule_id = 42;
                    break;
                case $broadcast->on_air_time == '25:00~25:30':
                    $broadcast->schedule_id = 52;
                    break;
                case $broadcast->on_air_time == '25:30~26:00':
                    $broadcast->schedule_id = 62;
                    break;
                case $broadcast->on_air_time == '26:00~26:30':
                    $broadcast->schedule_id = 72;
                    break;
                default:
                    $broadcast->schedule_id = NULL;
            }
        }elseif($broadcast->on_air_date == '火'){
            switch($broadcast->on_air_time){
                case $broadcast->on_air_time == '23:00~23:30':
                    $broadcast->schedule_id = 13;
                    break;
                case $broadcast->on_air_time == '23:30~24:00':
                    $broadcast->schedule_id = 23;
                    break;
                case $broadcast->on_air_time == '24:00~24:30':
                    $broadcast->schedule_id = 33;
                    break;
                case $broadcast->on_air_time == '24:30~25:00':
                    $broadcast->schedule_id = 43;
                    break;
                case $broadcast->on_air_time == '25:00~25:30':
                    $broadcast->schedule_id = 53;
                    break;
                case $broadcast->on_air_time == '25:30~26:00':
                    $broadcast->schedule_id = 63;
                    break;
                case $broadcast->on_air_time == '26:00~26:30':
                    $broadcast->schedule_id = 73;
                    break;
                default:
                    $broadcast->schedule_id = NULL;
            }
        }
        elseif($broadcast->on_air_date == '水'){
            switch($broadcast->on_air_time){
                case $broadcast->on_air_time == '23:00~23:30':
                    $broadcast->schedule_id = 14;
                    break;
                case $broadcast->on_air_time == '23:30~24:00':
                    $broadcast->schedule_id = 24;
                    break;
                case $broadcast->on_air_time == '24:00~24:30':
                    $broadcast->schedule_id = 34;
                    break;
                case $broadcast->on_air_time == '24:30~25:00':
                    $broadcast->schedule_id = 44;
                    break;
                case $broadcast->on_air_time == '25:00~25:30':
                    $broadcast->schedule_id = 54;
                    break;
                case $broadcast->on_air_time == '25:30~26:00':
                    $broadcast->schedule_id = 64;
                    break;
                case $broadcast->on_air_time == '26:00~26:30':
                    $broadcast->schedule_id = 74;
                    break;
                default:
                    $broadcast->schedule_id = NULL;
            }
        }elseif($broadcast->on_air_date == '木'){
            switch($broadcast->on_air_time){
                case $broadcast->on_air_time == '23:00~23:30':
                    $broadcast->schedule_id = 15;
                    break;
                case $broadcast->on_air_time == '23:30~24:00':
                    $broadcast->schedule_id = 25;
                    break;
                case $broadcast->on_air_time == '24:00~24:30':
                    $broadcast->schedule_id = 35;
                    break;
                case $broadcast->on_air_time == '24:30~25:00':
                    $broadcast->schedule_id = 45;
                    break;
                case $broadcast->on_air_time == '25:00~25:30':
                    $broadcast->schedule_id = 55;
                    break;
                case $broadcast->on_air_time == '25:30~26:00':
                    $broadcast->schedule_id = 65;
                    break;
                case $broadcast->on_air_time == '26:00~26:30':
                    $broadcast->schedule_id = 75;
                    break;
                default:
                    $broadcast->schedule_id = NULL;
            }
        }elseif($broadcast->on_air_date == '金'){
            switch($broadcast->on_air_time){
                case $broadcast->on_air_time == '23:00~23:30':
                    $broadcast->schedule_id = 16;
                    break;
                case $broadcast->on_air_time == '23:30~24:00':
                    $broadcast->schedule_id = 26;
                    break;
                case $broadcast->on_air_time == '24:00~24:30':
                    $broadcast->schedule_id = 36;
                    break;
                case $broadcast->on_air_time == '24:30~25:00':
                    $broadcast->schedule_id = 46;
                    break;
                case $broadcast->on_air_time == '25:00~25:30':
                    $broadcast->schedule_id = 56;
                    break;
                case $broadcast->on_air_time == '25:30~26:00':
                    $broadcast->schedule_id = 66;
                    break;
                case $broadcast->on_air_time == '26:00~26:30':
                    $broadcast->schedule_id = 76;
                    break;
                default:
                    $broadcast->schedule_id = NULL;
            }
        }elseif($broadcast->on_air_date == '土'){
            switch($broadcast->on_air_time){
                case $broadcast->on_air_time == '23:00~23:30':
                    $broadcast->schedule_id = 17;
                    break;
                case $broadcast->on_air_time == '23:30~24:00':
                    $broadcast->schedule_id = 27;
                    break;
                case $broadcast->on_air_time == '24:00~24:30':
                    $broadcast->schedule_id = 37;
                    break;
                case $broadcast->on_air_time == '24:30~25:00':
                    $broadcast->schedule_id = 47;
                    break;
                case $broadcast->on_air_time == '25:00~25:30':
                    $broadcast->schedule_id = 57;
                    break;
                case $broadcast->on_air_time == '25:30~26:00':
                    $broadcast->schedule_id = 67;
                    break;
                case $broadcast->on_air_time == '26:00~26:30':
                    $broadcast->schedule_id = 77;
                    break;
                default:
                    $broadcast->schedule_id = NULL;
            }
        }else{
                    $broadcast->schedule_id = NULL;
            }
        $broadcast->save();

        return redirect()->route('add')->with('flash_message', '登録が完了しました');
    }
}
