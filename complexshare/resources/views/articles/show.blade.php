@extends('layouts.app')

@section('content')
<div class="container-lg">
    <div class='col-lg-6 col-12 mx-auto my-4'>
        <div class='card'>
            <div class="card-body">

                <h1 class="h5 mb-4">
                    {{$article->title}}
                </h1>

                <p class="mb-5">
                    {!! nl2br(e($article->body)) !!}
                </p>
            </div>
            @if(Auth::user()->id == $article->user_id)
            <div class="mb-4 text-right">
                <a class="btn btn-primary" href="{{ route('articles.edit', ['article' => $article]) }}">
                    編集する
                </a>
                <form style="display: inline-block;" method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">削除する</button>
                    @endif


                </form>
            </div>
        </div>


        @forelse($article->comments as $comment)

        <div class="border-top p-4">
            <time class="text-secondary">
                {{$comment->created_at->format('Y.m.d H:i')}}

            </time>
            <p class="mt-2">
                {!! nl2br(e($comment->body)) !!}
            </p>
            @if(Auth::user()->id == $comment->user_id)
            <form style="display: inline-block;" method="POST" action="{{ route('comments.destroy', ['comment' => $comment]) }}">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">削除する</button>
                    @endif


                </form>

        </div>

        @empty
        <p>まだコメントはありません</p>
        @endforelse
        <section>


            <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input name="article_id" type="hidden" value="{{$article->id}}">
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <div class="form-group">
                    <label for="body">
                        本文
                    </label>
                    <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                    <div class="invalid-feedback">
                        {{ $errors->first('body') }}
                    </div>
                    @endif
                </div>
                <div class="mt-4">
                    <button type="submit" class="submit">
                        コメントする
                    </button>
                    <a href="/articles" class="submit">戻る</a>
                </div>
            </form>
            @if (Auth::check())
            @if ($like)
            {{ Form::model($article, array('action' => array('LikesController@destroy', $article->id, $like->id))) }}
            <button type="submit">
                いいね {{ $article->likes_count }}
            </button>
            {!! Form::close() !!}
            @else
            {{ Form::model($article, array('action' => array('LikesController@store', $article->id))) }}
            <button type="submit">
                いいね {{ $article->likes_count }}
            </button>
            {!! Form::close() !!}
            @endif
            @endif
        </section>



    </div>
</div>
@endsection
