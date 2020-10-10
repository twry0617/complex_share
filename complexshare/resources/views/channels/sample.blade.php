@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        
                        <ul id="board">
                            @foreach($posts as $post)
                            
                                <li>{{ $user->name }}{{ $post->text }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-body">
                        <input type="text" id="text">
                        <input type="submit" value="送信" id="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





@extends('layouts.app')
<style>
    /* チャットレイアウト */
    .chat-box {
        width: 100%;
        height: auto;
        overflow: hidden;
        /*floatの解除*/
        margin-bottom: 20px;
    }

    .chat-face {
        float: left;
        margin-right: -120px;
    }

    .chat-face img {
        border-radius: 30px;
        border: 1px solid #ccc;
        box-shadow: 0 0 4px #ddd;
    }

    .chat-area {
        width: 100%;
        float: right;
    }

    .chat-hukidashi {
        display: inline-block;
        /*コメントの文字数に合わせて可変*/
        padding: 15px 20px;
        margin-left: 120px;
        margin-top: 10px;
        border: 1px solid gray;
        border-radius: 10px;
    }
</style>


@section('content')


@foreach($posts as $post)
<div class="chat-box">

    <div class="chat-area">
        <ul class="chat-hukidashi">
        

            <li>{{ $user->name }}{{ $post->text }}</li>
            
</ul>
    </div>
</div>
@endforeach

<div class="card-body">
    <input type="text" id="text">
    <input type="submit" value="送信" id="submit">
</div>




@endsection