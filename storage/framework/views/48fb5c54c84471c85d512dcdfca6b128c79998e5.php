

<?php $__env->startSection('site-title'); ?>
新增文章
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-10">
            <h2>新增文章</h2>
            <hr>
        </div>
        <div class="col-xl-8 col-10">
            <form action="<?php echo e(route('post.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="" class="form-label">文章標題</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="">上傳封面</label>
                    <input type="file" name="cover">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">文章分類</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">標籤</label>
                    <input type="text" name="tag" id="tag" class="form-control" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">文章內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <input type="submit" value="新增" class="btn btn-primary">
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
        height:600,
        plugins:'image imagetools',
        toolbar:
            'removeformat | image |' +
            'styleselect bold italic forecolor |'+
            'alignleft aligncenter alignright |',
        image_title: true,
        automatic_uploads: true,
        images_upload_url: '/upload',
        file_picker_types: 'image',
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function () {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
            };

            input.click();
        },
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-6-20210605-LARAVEL\resources\views/post/create.blade.php ENDPATH**/ ?>