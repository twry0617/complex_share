@extends('layouts.app')

@section('content')

<h3>マイページ</h3>


<div style="margin-top: 30px;">

    <table class="table table-striped">
        @foreach($users as $user)
        <tr>
            <th width="150">ユーザーID</th>

            <td width="200">{{$user->id}}</td>
        </tr>
        <tr>
            <th width="150">ユーザー名</th>

            <td width="200">{{$user->name}}</td>
        </tr>
        <tr>
            <th width="150">ユーザーemail</th>

            <td width="200">{{$user->email}}</td>
        </tr>


        <button type="submit" class="btn btn-primary">
            編集する
        </button>
        @endforeach

        @foreach($likes as $like)
投稿id : {{$like->article->id}} 
投稿内容 : {{$like->article->message}} 
投稿者の名前 : {{$like->article->user->name}} 
@endforeach
</div>


@endsection