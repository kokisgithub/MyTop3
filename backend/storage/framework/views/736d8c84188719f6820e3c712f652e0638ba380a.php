

<?php $__env->startSection('title', 'MyTop3'); ?>

<?php $__env->startSection('content'); ?>

    <h1 class="mb-5">
     プロフィール画像アップロード - 確認画面
    </h1>
    <form method="post" action="<?php echo e(url('/uploaders/complete')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group row">
          <p class="col-sm-4 col-form-label">画像</p>        
          <div class="col-sm-8">
            <img src="<?php echo e(asset('/storage/' . $newImageName)); ?>" width="200" height="130">
          </div>
          <input type="hidden" name="image" value="<?php echo e($path); ?>" >
        </div>
        <div class="text-center">        
          <input type="submit" value="登録" class="btn btn-info">
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_top3/resources/views/uploader/confirm.blade.php ENDPATH**/ ?>