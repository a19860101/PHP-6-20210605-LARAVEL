@extends('template.master')

@section('site-title')
編輯文章
@endsection

@section('main')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-10">
            <h2>編輯文章</h2>
            <hr>
        </div>
        <div class="col-xl-8 col-10">
            <form action="{{route('post.update',['post'=>$post->id])}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="" class="form-label">文章標題</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">文章分類</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" <?php echo $category->id == $post->category_id ? 'selected':''; ?>>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <?php
                        $tagString = array();
                        foreach($post->tags as $tags){
                            $tagString[] = $tags->title;
                        }
                        $tagString = implode(',',$tagString);
                    ?>
                    
                    <label for="tag" class="form-label">標籤</label>
                    <input type="text" name="tag" value="{{$tagString}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">文章內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
                </div>
                <input type="submit" value="儲存" class="btn btn-primary">
                <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        language:'zh_TW',
        height:600
    });
</script>
@endsection