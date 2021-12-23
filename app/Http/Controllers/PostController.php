<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post; // (Postモデルを使う)
use Illuminate\Support\Facades\Auth; // (ログイン機能を使う)
use Illuminate\Support\ViewErrorBag;

class PostController extends Controller
{
    public function index()
    {
        // モデルから投稿を全権取得して表示する
        $posts = Post::all();

        // 取得したデータをビューに変数として渡す
        return view('posts.index',['posts' => $posts]);
    }

    // 画面（投稿）画面表示
    public function create()
    {
        // create.blade.phpを表示する
        return view('posts.create');
    }

    // 登録（投稿）処理
    public function store(PostRequest $request)
    {
        // Postモデルのインスタンスを生成
        $post = New Post;

        // ユーザーが入力したリクエストの情報を格納していく
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id(); // Auth::id()でログインユーザーのIDが取得できる。

        $post->save(); // インスタンスをDBにレコードとして保存

        // 投稿一覧画面にリダイレクトさせる
        return redirect()->route('post.index');

    }

    public function show($id)
    {
        // 投稿データのIDでモデルから投稿を一件取得
        //findOrFail()は、指定したidのデータが見つからない場合にNot Foundの例外を返してくれる便利な検索メソッド
        $post = Post::findOrFail($id);

        // show.blade.phpを表示する
        return view('posts.show',['post' => $post]);

    }
}
