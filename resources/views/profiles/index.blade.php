@extends('layouts.front')

@section('title', 'プロフィール一覧')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->my_image_path)
                                    <img src="{{ asset('storage/image/' . $post->my_image_path) }}">
                                @endif
                            </div>
                            <div class="text col-md-6">
                                <div class="date">
                                    最終更新日：{{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->name, 150) }}
                                </div>
                                <div class="body mt-3">
                                    性別：{{ str_limit($post->gender, 10) }}
                                </div>
                                <div class="body mt-3">
                                    趣味：{{ str_limit($post->hobby, 50) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->introduction, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection