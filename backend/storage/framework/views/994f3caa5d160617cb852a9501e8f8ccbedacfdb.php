

<?php $__env->startSection('title', 'MyTop3'); ?>

<?php $__env->startSection('content'); ?>

    <h2 class="mb-4">
      <div class="row">
        <div class="col">
          <h3>プロフィール画像<br class="d-inline d-sm-none" />アップロード</h3>
        </div>
        <div class="col-auto">
          <?php echo $__env->make('layouts.return', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
        </div>
      </div>
    </h2>
    <form method="post" action="<?php echo e(route('profile_image')); ?>" enctype="multipart/form-data" class="form-inline">
      <?php echo csrf_field(); ?>
      <div class="form-group">
        <input type="file" name="image" class="form-control border-0">
      </div>
      <div class="form-group">        
        <input type="submit" value="アップロード" class="btn btn-info ml-sm-2">
      </div>
        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </form>
    <p><h3 class="font-weight-bold text-center my-5">
      <?php echo e($user->name); ?>

    </h3></p>
    <div class="row justify-content-center my-4 mx-auto">  
      <div class="col-md-4 col-sm-8">   
        <?php if(auth()->guard()->check()): ?>  
          <?php if(!$user->image == null): ?>
            <img src="data:image/png;base64,<?php echo e($user->image); ?>" class="card-img" width="20%" height="auto">
          <?php else: ?>
            <p class="text-center">プロフィール画像がありません</p>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_top3/resources/views/uploader/index.blade.php ENDPATH**/ ?>