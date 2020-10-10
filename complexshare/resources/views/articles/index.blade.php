@extends('layouts.app')


@section('content')
<div class="mb-4">
    <a href="{{route('articles.create')}}" class="btn btn-radius-solid">投稿を新規作成する<i class="fas fa-angle-right fa-position-right"></i>

    </a>
</div>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Complex Share</div>
        <div class="list-group list-group-flush">
            <a href="/articles" class="list-group-item list-group-item-action bg-light">記事一覧</a>
            <a href="/mypage" class="list-group-item list-group-item-action bg-light">マイページ</a>
            <a href={{route('logout')}} class="list-group-item list-group-item-action bg-light" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">ログアウト</a>
            <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">
                @csrf
            </form>

            <a href="/quit" class="list-group-item list-group-item-action bg-light">退会</a>
            <a href="/posts" class="list-group-item list-group-item-action bg-light">チャット</a>

        </div>
    </div>

    <div class="container">
        <div class="row justify-content-left">
            @foreach ($articles as $article)
            <div class="col-md-4 mb-2">
                <div class="card">
                    <h6>
                        <div class="card-header">{{ $article->title }}</div>
                    </h6>
                    <div class="card-body">
                        <p>{!! nl2br(e(str_limit($article->body,200))) !!}</p>
                    </div>
                    <a class="card-link" href="{{ route('articles.show', ['article' => $article]) }}">
                        続きを読む
                    </a>
                    <div class="card-footer">
                        <span class="mr-2">
                            投稿日時 {{$article->created_at->format('Y.m.d') }}
                        </span>
                        @if($article->comments->count())
                        <span class="badge badge-primary">
                            コメント {{$article->comments->count()}}件
                        </span>
                        　　　　　　　　　　　　　　@endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- 以下の部分を追加 -->
        <div class="row justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>

    @endsection