

<?php $__env->startSection('title', '編集'); ?>

<?php $__env->startSection('content'); ?>
    <h1>
    <a href="<?php echo e(url('/')); ?>" class="float-right btn btn-outline-primary">戻る</a>
    編集
    </h1>
    <form method="post" action="<?php echo e(url('/posts', $post->id)); ?>">
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('patch')); ?>

                <input type="text" name="title" placeholder="タイトルを入力" value="<?php echo e(old('title', $post->title)); ?>" class="form-control">
                <?php if($errors->has('title')): ?>
                <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                <?php endif; ?>
        </div>
        <div class="form-group">
                <textarea name="body" placeholder="本文を入力" class="form-control" rows="10"><?php echo e(old('body', $post->body)); ?></textarea>
                <?php if($errors->has('body')): ?>
                <span class="text-danger"><?php echo e($errors->first('body')); ?></span>
                <?php endif; ?>
        </div>
                <input type="submit" value="更新" class="btn btn-outline-success">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_top10/resources/views/posts/edit.blade.php ENDPATH**/ ?>