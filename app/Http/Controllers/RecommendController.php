<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendController extends Controller
{
    /*質問の入力値を受け取って変数に代入、足し合わせて$totalを出す*/
    public function postData(Request $request) {
        $genre = $request->input('radio1');
        $answer = $request->input('radio2');
        $trend = $request->input('radio3');
        $cool = $request->input('radio4');
        $total = $genre + $answer + $trend + $cool;

        return view('recommend_result', compact('total'));
    }
}
