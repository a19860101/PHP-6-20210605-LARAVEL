
<?php $__env->startSection('site-title'); ?>
<?php echo e($post->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-10 border border-secondary mb-5 rounded p-5">
            <h2><?php echo e($post->title); ?></h2>
            <div>
                作者: <?php echo e($post->user->name); ?>

            </div>
            <div>
                分類: <?php echo e($post->category->title); ?>

            </div>
            <div class="cover my-4">
                <?php if($post->cover == null): ?>
                <img src="<?php echo e(asset('storage/images/question-marks.jpg')); ?>" class="w-100">
                <?php else: ?>
                <img src="<?php echo e(asset('storage/images/'.$post->cover)); ?>" class="w-100">
                <?php endif; ?>
            </div>
            <div>
                <?php echo $post->content; ?>

            </div>
            <div>
                最後更新時間<?php echo e($post->updated_at); ?>

            </div>
            <div>
                <a href="<?php echo e(route('post.index')); ?>" class="btn btn-success">文章列表</a>
                <?php if(Auth::id() == $post->user_id): ?>
                <a href="<?php echo e(route('post.edit',['post'=>$post->id])); ?>" class="btn btn-info">編輯文章</a>
                <form action="<?php echo e(route('post.delete',['post'=>$post->id])); ?>" method="post" class="d-inline-block">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <input type="submit" value="刪除" class="btn btn-danger" onclick="return confirm('確認刪除?')">
                </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-6-20210605-LARAVEL\laravel\resources\views/post/show.blade.php ENDPATH**/ ?>