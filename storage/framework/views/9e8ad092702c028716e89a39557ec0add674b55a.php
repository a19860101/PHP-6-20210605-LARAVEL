
<?php $__env->startSection('site-title'); ?>
文章列表
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
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
                <h2>文章列表</h2>
            </div>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-8 col-10 border border-secondary mb-5 rounded p-5">
                <h2><?php echo e($post->title); ?></h2>
                <div>
                    作者: 
                    <a href="<?php echo e(route('post.user',['user'=>$post->user_id])); ?>">
                        <?php echo e($post->user->name); ?>

                    </a>
                </div>
                <div>
                    分類: 
                        <a href="<?php echo e(route('post.category',['category'=>$post->category_id])); ?>">
                        <?php echo e($post->category->title); ?>

                        </a>
                </div>
                <div>
                標籤:
                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" class="badge bg-secondary">
                    <?php echo e($tag->title); ?>

                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="cover my-4">
                    <?php if($post->cover == null): ?>
                    <img src="<?php echo e(asset('storage/images/question-marks.jpg')); ?>" class="w-100">
                    <?php else: ?>
                    <img src="<?php echo e(asset('storage/images/'.$post->cover)); ?>" class="w-100">
                    <?php endif; ?>
                </div>
                <div>
                    <?php echo e(Str::limit(strip_tags($post->content),200)); ?>

                </div>
                <div class="text-end">      
                    <a href="<?php echo e(route('post.show',['post'=>$post->id])); ?>" class="btn btn-primary btn-sm">繼續閱讀</a>
                </div>
                <div>
                    最後更新時間<?php echo e($post->updated_at); ?>

                    <hr>
                    <?php Carbon\Carbon::setLocale('zh_TW'); ?>
                    最後更新時間 <?php echo e(Carbon\Carbon::parse($post->updated_at)->diffForHumans()); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-6-20210605-LARAVEL\resources\views/post/index.blade.php ENDPATH**/ ?>