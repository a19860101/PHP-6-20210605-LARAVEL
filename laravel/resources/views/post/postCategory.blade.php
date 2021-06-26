@extends('template.master')
@section('site-title')
文章列表
@endsection
@section('main')
    <style>
        .cover {
            width: 100%;
            height: 300px;
        }
        .cover img {
            width: 100%;
            height: 100%;
            object-fit:cover;
            object-position: center;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-10 mb-5">
                <h2>分類文章列表</h2>
            </div>
            @foreach($posts as $post)
            <div class="col-lg-8 col-10 border border-secondary mb-5 rounded p-5">
                <h2>{{$post->title}}</h2>
                <div>
                    作者: {{$post->user->name}}
                </div>
                <div>
                    分類: {{$post->category->title}}
                </div>
                <div class="cover my-4">
                    @if($post->cover == null)
                    <img src="{{asset('storage/images/question-marks.jpg')}}" class="w-100">
                    @else
                    <img src="{{asset('storage/images/'.$post->cover)}}" class="w-100">
                    @endif
                </div>
                <div>
                    {{Str::limit(strip_tags($post->content),200)}}
                </div>
                <div class="text-end">      
                    <a href="{{route('post.show',['post'=>$post->id])}}" class="btn btn-primary btn-sm">繼續閱讀</a>
                </div>
                <div>
                    最後更新時間{{$post->updated_at}}
                    <hr>
                    <?php Carbon\Carbon::setLocale('zh_TW'); ?>
                    最後更新時間 {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection