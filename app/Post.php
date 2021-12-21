<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //$fillableには、データベースにおいてユーザーが入力できる値のカラムを指定します。今回はtitleとbodyカラムを指定しています。
    //投稿データのidカラムの値は自動で割り振られるのですが、上記を指定することでタイトル(title)や本文(body)はユーザー入力値によって登録したり編集したりできるようになります。
    protected $fillable = ['title','body'];

    //Userモデルとのリレーション
    public function user()
    {
        //モデル間のリレーションを定義しています。
        //belongsTo()メソッドでUserモデルと多対１の関係のもつことを表します。
        return $this->belongsTo('App\User');
    }
}
