

<?php $__env->startSection('title', '新規投稿'); ?>

<?php $__env->startSection('content'); ?>

    <h1 class="mb-4">
        <div class="row">
            <div class="col">
                新規投稿
            </div>
            <div class="col-auto">
                <?php echo $__env->make('layouts.return', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
            </div>
        </div>
    </h1>
    <form method="get" action="<?php echo e(route('create')); ?>" class="form-inline ml-4">
        <div class="form-group row">
            <select class="form-control custom-select border-info col-8" name="selected_symbol">
                <option disabled selected hidden>記号を選ぶ</option>
                <?php $__currentLoopData = $symbols; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($symbol->body); ?>"><?php echo e($symbol->symbol); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          <button type="submit" class="btn btn-dark text-warning col-4">選択</button>
        </div> 
    </form>
    <form method="post" action="<?php echo e(url('/posts')); ?>" class="ml-2">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <input type="text" name="title" placeholder="タイトルを入力" value="<?php echo e(old('title')); ?>" class="form-control border-info mt-4">
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
            <textarea name="body" placeholder="本文を入力" class="form-control border-info" rows="3"><?php echo e(old('body', $selected_symbol)); ?></textarea>
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
        <input type="submit" value="投稿" class="btn btn-primary">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/backend/resources/views/posts/create.blade.php ENDPATH**/ ?>