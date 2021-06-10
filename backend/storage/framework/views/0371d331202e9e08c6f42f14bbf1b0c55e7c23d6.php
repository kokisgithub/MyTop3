

<?php $__env->startSection('title', 'MyTop3'); ?>

<?php $__env->startSection('content'); ?>

    <h1>
    <a href="<?php echo e(url('/posts/create')); ?>" class="float-right btn btn-outline-primary">新規作成</a>
    MyTop3
    </h1>
      <table class="table table-striped table-hover mt-3">
        <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <tr>
            <td>
                <a href="<?php echo e(action('PostsController@show', $post)); ?>"><?php echo e($post->title); ?></a>
            </td>
            <td>
            <td>
            <?php echo $__env->make('layouts.modal_delete_post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <td>
                <a href="<?php echo e(action('PostsController@edit', $post)); ?>" class="btn btn-outline-secondary">編集</a>
            </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <td class="mt-4">投稿がありません</td>
          </tr>
        <?php endif; ?>
      </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_top10/resources/views/posts/index.blade.php ENDPATH**/ ?>