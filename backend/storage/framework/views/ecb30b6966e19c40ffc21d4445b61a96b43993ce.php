

<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>
    
    <h1>
    <a href="<?php echo e(url('/')); ?>" class="float-right ml-5 btn btn-outline-primary">戻る</a>
        <?php echo e($post->title); ?>

    </h1>
    <p class="mt-4 mb-5">
    <?php echo nl2br(e($post->body)); ?> 
    </p>
    
    <h3 class="mt-5">コメント</h3>
        <form method="post" action="<?php echo e(action('CommentsController@store', $post)); ?>">
            <div class="form-group">
                <?php echo e(csrf_field()); ?>

                    <input type="text" name="body" placeholder="タイトルを入力" value="<?php echo e(old('body')); ?>" class="form-control">
            </div>
                    <?php if($errors->has('body')): ?>
                    <span class="text-danger"><?php echo e($errors->first('body')); ?></span>
                    <?php endif; ?>
                    <?php if($errors->has('body')): ?>
                    <span class="text-danger"><?php echo e($errors->first('body')); ?></span>
                    <?php endif; ?>
                    <input type="submit" value="コメントする" class="btn btn-outline-primary">
        </form>
        <table class="table table-striped table-hover mt-2">
            <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <?php echo e($comment->body); ?>

                    </td>
                    <td>
                    <?php echo $__env->make('layouts.modal_delete_comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <td class="mt-4">コメントがありません</td>
                </tr>
            <?php endif; ?>
        </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_top10/resources/views/posts/show.blade.php ENDPATH**/ ?>