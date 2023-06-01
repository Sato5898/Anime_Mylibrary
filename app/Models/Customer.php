<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'users';

    /*論理削除したら、deleted_atがNULLかどうかを確認して表示することで
      削除ができるようになっている*/
    public function select() {
        $customers = DB::table($this->table)
        ->whereNull('deleted_at')
        ->get();
        return $customers;
    }

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'email'];
}

