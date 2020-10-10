@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('退会') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('quit.delete') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <label for="name" class="col-form-label text-md-right">{{Auth::user()->name}}</label>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <label for="email" class="col-form-label text-md-right">{{Auth::user()->email}}</label>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2 text-md-center">
                                <p>「退会」ボタンを押すと退会処理を行います。本当に退会しますか？</p>
                            </div>
                            <div class="col-md-8 offset-md-2 text-md-center">
                                <button type="submit" class="submit">
                                    {{ __('退会') }}
                                </button>

                                <button type="submit" class="submit">
                                    <a href="/articles">キャンセル</a>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection