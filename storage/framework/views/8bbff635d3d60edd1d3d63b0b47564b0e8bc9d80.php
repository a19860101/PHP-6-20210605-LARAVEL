
<?php $__env->startSection('site-title'); ?>
新增分類
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2>新增分類</h2>
            <hr>
        </div>
        <div class="col-8">
            <form action="<?php echo e(route('category.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
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
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo e($category->title); ?>

                    <form action="<?php echo e(route('category.destroy',['category'=>$category->id])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <input type="submit" value="刪除" class="btn btn-danger btn-sm" onclick="return confirm('確認刪除?')">
                    </form>    
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP-6-20210605-LARAVEL\resources\views/category/create.blade.php ENDPATH**/ ?>