

<?php $__env->startSection('title', '編集'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="mb-4">
        <div class="row">
            <div class="col">
                編集
            </div>
            <div class="col-auto">
                <?php echo $__env->make('layouts.return', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
            </div>
        </div>
    </h1>
    <form method="post" action="<?php echo e(url('/posts', $post->id)); ?>" class="ml-2">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('patch')); ?>

        <div class="form-group">
                <input type="text" name="title" placeholder="タイトルを入力" value="<?php echo e(old('title', $post->title)); ?>" class="form-control border-info mt-4">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
                <textarea name="body" placeholder="本文を入力" class="form-control border-info" rows="3"><?php echo e(old('body', $post->body)); ?></textarea>
                <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
                <input type="submit" value="更新" class="btn btn-success">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_top3/resources/views/posts/edit.blade.php ENDPATH**/ ?>