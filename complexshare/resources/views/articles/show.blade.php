@extends('layouts.app')

@section('content')
<div class='contaniner mt-4'>

    <div class='border p-4'>
        <h1 class="h5 mb-4">
            {{$article->title}}
        </h1>

        <p class="mb-5">
            {!! nl2br(e($article->body)) !!}
        </p>

        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>

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
                    <button type="submit" class="btn btn-primary">
                        コメントする
                    </button>
                    <a href="/article" class="btn btn-primary">戻る</a>
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
            @forelse($article->comments as $comment)

            <div class="border-top p-4">
                <time class="text-secondary">
                    {{$comment->created_at->format('Y.m.d H:i')}}

                </time>
                <p class="mt-2">
                    {!! nl2br(e($comment->body)) !!}
                </p>

            </div>

            @empty
            <p>まだコメントはありません</p>
            @endforelse
        </section>
    </div>
</div>
@endsection


</section>