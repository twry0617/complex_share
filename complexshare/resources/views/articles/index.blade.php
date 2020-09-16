@extends('layouts.app')


@section('content')
<div class="mb-4">
    <a href="{{ route('articles.create') }}" class="submit">
        投稿を新規作成する
    </a>
</div>

<nav class="menu">
  <ul>
    <li>Home
    <li>Blog
    <li>About
  </ul>
</nav>
<div id="cardlayout-wrap">
    <!-- カードレイアウトをラッピング -->
    @foreach ($articles as $article)
    <section class="card-list">
        <a class="card-link" href="#">
            <h2 class="card-title">{{ $article->title }}</h2>
            <p class="card-text-tax"> {!! nl2br(e(str_limit($article->body, 200))) !!}</p>
        </a>
        <a class="card-link" href="{{ route('articles.show', ['article' => $article]) }}">
            続きを読む
        </a>
        <div class="card-footer">
            <span class="mr-2">
                投稿日時 {{ $article->created_at->format('Y.m.d') }}
            </span>
    </section>

    @endforeach
</div>

<div class="d-flex justify-content-center mb-5">
    {{ $articles->links() }}
</div>





@endsection