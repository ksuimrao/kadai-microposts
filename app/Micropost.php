<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];   //変数を定義し、代入

    public function user()      //関数を定義しているだけ
    {
        return $this->belongsTo(User::class);       //特定の投稿者の情報を簡単な記述で取得できるようにしている
    }
}
