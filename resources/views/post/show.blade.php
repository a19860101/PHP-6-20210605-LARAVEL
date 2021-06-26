@extends('template.master')
@section('site-title')
{{$post->title}}
@endsection
@section('main')
<div class="container">
    <div class="row justify-content-center">
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
                {!!$post->content !!}
            </div>
            <div>
                最後更新時間{{$post->updated_at}}
            </div>
            <div>
                <a href="{{route('post.index')}}" class="btn btn-success">文章列表</a>
                @if(Auth::id() == $post->user_id)
                <a href="{{route('post.edit',['post'=>$post->id])}}" class="btn btn-info">編輯文章</a>
                <form action="{{route('post.delete',['post'=>$post->id])}}" method="post" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <input type="submit" value="刪除" class="btn btn-danger" onclick="return confirm('確認刪除?')">
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection