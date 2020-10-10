@extends('layouts.app')

<style>
    /* 左右 */
    .b-left-wrapper,
    .b-right-wrapper {
        margin: 0 auto 10px;
        /* 後続要素との距離は10px */
        width: 100%;
        min-height: 80px;
        /* アイコン画像の高さと同じ数値を入れます */
    }

    /* 左 */
    .b-left-wrapper {
        padding-left: 100px;
        /* アイコン画像の横幅+吹き出しまでの距離 注意1 */
    }

    /* 右 */
    .b-right-wrapper {
        padding-right: 100px;
        /* アイコン画像の横幅+吹き出しまでの距離 注意2 */
        text-align: right;
    }

    /* 左右吹き出し共通 */
    .b-left,
    .b-right {
        display: inline-block;
        width: 100%;
        max-width: 500px;
        /* 吹き出しの横幅最大値指定 */
        background-color: white;
        /* 吹き出し背景色 */
        border: 2px solid rgb(240, 240, 240);
        /* 吹き出しボーダー色 */
        border-radius: 6px;
        padding: 10px 15px;
        position: relative;
    }

    /* 左右吹き出し角部分共通 */
    .b-left:before,
    .b-right:before {
        content: "";
        width: 10px;
        height: 10px;
        background-color: white;
        /* 吹き出し背景色と同じ色を指定 */
        border-bottom: 2px solid rgb(240, 240, 240);
        /* 吹き出しボーダー色と同じ色を指定 */
        position: absolute;
        top: 15px;
        /* 角の位置 吹き出し上辺から15px下 */
    }

    /* 左吹き出し角部分 */
    .b-left:before {
        border-left: 2px solid rgb(240, 240, 240);
        /* 吹き出しボーダー色と同じ色を指定 */
        left: -8px;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    /* 右吹き出し角部分 */
    .b-right:before {
        border-right: 2px solid rgb(240, 240, 240);
        /* 吹き出しボーダー色と同じ色を指定 */
        right: -8px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    /* 左右アイコン共通 */
    .b-left:after,
    .b-right:after {
        content: "";
        width: 80px;
        /* アイコン横幅 */
        height: 80px;
        /* アイコン縦幅 */
        border-radius: 50%;
        /* アイコン円形指定 */
        position: absolute;
        top: 0;
    }

    .b-left:after {
        background: url(左側アイコン画像URL) center center /cover no-repeat;
        left: -100px;
        /* 注意1と同じ数値をマイナスで指定 */
    }

    .b-right:after {
        background: url(右側アイコン画像URL) center center /cover no-repeat;
        right: -100px;
        /* 注意2と同じ数値をマイナスで指定 */
    }

    
</style>


@section('content')
@foreach($posts as $post)

<div id="b-left-wrapper">
    <p>{{ $user->name }}</p>
</div>
    <div class="b-left">
        <p>{{ $post->text }}</p>
    </div>

    
    
    


@endforeach
<div class="card-body">
    <input type="text" id="text">
    <input type="submit" value="送信" id="submit">
</div>
@endsection