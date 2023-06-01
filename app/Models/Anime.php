<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Bookmark;

class Anime extends Model
{
    protected $table = 'animes';
    protected $fillable =[
        'anime_name', 'genre','image_color','official_page'
    ];
    protected $dates = ['created_at', 'updated_at'];
    use HasFactory;

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
