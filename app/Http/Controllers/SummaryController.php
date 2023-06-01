<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summary;

class SummaryController extends Controller
{
    public function form() {
        $summary = new Summary;
        $summaries = $summary->select();
        return view('dashboard', compact('summaries'));
    }

   

    public function look($id){
        $animes = Summary::find($id);
        return view('detail', compact('animes'));
    }

}
