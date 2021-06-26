@extends('template.master')
@section('site-title')
新增分類
@endsection

@section('main')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2>新增分類</h2>
            <hr>
        </div>
        <div class="col-8">
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">分類標題</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">分類英文標題</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                
                <input type="submit" value="新增分類" class="btn btn-primary">
                <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
            </form>
        </div>
        <div class="col-4">
            <ul class="list-gorup mt-5">
                @foreach($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$category->title}}
                    <form action="{{route('category.destroy',['category'=>$category->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="刪除" class="btn btn-danger btn-sm" onclick="return confirm('確認刪除?')">
                    </form>    
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection