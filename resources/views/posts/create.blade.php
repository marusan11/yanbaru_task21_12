@extends('layouts.app')

@section('content')
    <div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-8">
        		@if (count($errors) > 0)
					<ul class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<li> {{ $error}}</li>
						@endforeach
					</ul>
        		@endif
				<form action="{{ route('post.store') }}" method="POST">
					@csrf
					<div class="form-group">
						<label>タイトル</label>
						<input  type="text" class="form-control" aria-placeholder="ここにタイトルを入力して下さい" name="title">
					</div>
					<div class="form-group">
						<label>本文</label>
						<textarea class="form-control" placeholder="ここに本文を入力して下さい" rows="5" name="body"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">投稿する</button>
				</form>
        	</div>
      	</div>
    </div>
@endsection

{{-- @ifは先ほども登場したPHPのif文と同様の書き方で分岐処理ができるBladeのディレクティブですが、この部分でバリデーションのエラーメッセージがあれば表示するようにしています。

@foreachにて$errorsを$errorとしてエラーメッセージを展開しています。

投稿のformにおいては、POST通信を用いてpost.storeという名前のルートを指定しています。これは先ほどルーティングのweb.phpで記載しているので、そこで定義したアクション(storeアクション)が実行されることになります。

@csrfは、クロス・サイト・リクエスト・フォージェリ(CSRF)からアプリケーションを簡単に守るためのBladeのディレクティブです。 --}}