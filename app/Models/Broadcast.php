<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Anime;

class Broadcast extends Model
{

    use HasFactory;
    protected $table ='broadcasts';
    protected $fillable = [ 'anime_id','broadcast','on_air_date','on_air_time','streaming'];

    public function cast(){
        return $this->belongsTo(Anime::class);
    }
    
}
