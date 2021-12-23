@extends('layouts.app')

@section('content')
	<div class="col-md-6 mx-auto">
		<div class="card-wrap">
			<div class="card mt-3">
				<div class="card-header">
					{{ $post->user->name }}
				</div>
				<div class="card-body">
					<h3>
						{{ $post->title }}
					</h3>
					<p class="mb-4">
						{{ $post->body }}
					</p>
					<div class="text-right">
						{{-- @ifディレクブにより編集ボタン、削除ボタンは、投稿のuser_idがログインユーザーと一致する場合（＝自分の投稿の時）にのみ表示するようにしています。 --}}
						@if ($post->user_id === Auth::id())

						{{-- ルーティングを指定しつつ投稿データのIDをルートパラメータとして渡す --}}
						<a class="btn btn-succes btn-sm" href="{{ route('post.edit',['id' => $post->id]) }}">
							<i class="far fa-edit"></i>編集
						</a>
						<a class="btn btn-danger btn-sm" rel="nofollow" href="#">
							<i class="far fa-trash-alt"></i>削除
						</a>
						@endif
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection