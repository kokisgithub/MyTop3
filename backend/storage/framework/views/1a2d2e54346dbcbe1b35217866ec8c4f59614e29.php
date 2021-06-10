

<?php $__env->startSection('title', 'MyTop3'); ?>

<?php $__env->startSection('content'); ?>

  <h1 class="mb-4">
    <div class="row">
      <div class="col">
        MyTop3
      </div>
      <div class="col-auto">
        <a href="<?php echo e(route('create')); ?>" class="btn btn-outline-primary">投稿する</a>
      </div>
    </div>
  </h1>
  <?php echo $__env->make('posts.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <table class="table table-striped table-hover mt-2">
      <tr>
        <th scope="col">
          タイトル
        </th>
        <th scope="col">
          ユーザー
        </th>
        <?php if(auth()->guard()->check()): ?>
          <th scope="col">    
          </th>    
          <th scope="col">
          </th>    
        <?php endif; ?>
      </tr>
    <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td>
            <u><a href="<?php echo e(route('show', $post)); ?>" class="font-weight-bold"><?php echo e($post->title); ?></a></u>
        </td>
        <td class="text-secondary font-weight-bold">
          <?php if(!$post->user->image == null): ?>
            <img src="data:image/png;base64,<?php echo e($post->user->image); ?>" width="50" height="50">
          <?php endif; ?>
          <p>
            <?php echo e(optional($post->user)->name); ?>

          </p>
        </td>
        <?php if(auth()->guard()->check()): ?>
          <?php if($post->user_id === $login_user_id): ?>
            <td>
              <?php echo $__env->make('layouts.modal_delete_post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </td>
            <td>
              <a href="<?php echo e(route('edit', $post)); ?>" class="btn btn-outline-success">編集</a>
            </td>
          <?php else: ?>
            <td>
            </td>
            <td>
            </td>
          <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <td class="mt-4">投稿がありません</td>
      </tr>
    <?php endif; ?>
  </table>
  <div class="text-center">
    <?php echo $posts->appends(['keyword'=>$keyword])->render('vendor.pagination.paginate'); ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/backend/resources/views/posts/index.blade.php ENDPATH**/ ?>