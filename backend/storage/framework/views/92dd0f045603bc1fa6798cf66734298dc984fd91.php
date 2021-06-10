

<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>
    
    <h6 class="text-secondary">
        <div class="row">
            <div class="col">
                <?php if(!$post->user->image == null): ?>
                    <img src="data:image/png;base64,<?php echo e($post->user->image); ?>" width="50" height="50">
                <?php endif; ?>
                <?php echo e($post->user->name); ?>

            </div>
            <div class="col-auto">
                <?php echo $__env->make('layouts.return', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
            </div>
        </div>
    </h6>
    <h3 class="mt-4 mb-4 ml-3 text-danger">
        <?php echo e($post->title); ?>

    </h3>
    <h4 class="mt-4 mb-5 ml-5 text-danger">
        <?php echo nl2br(e($post->body)); ?> 
    </h4>
    <h5 class="mt-5">
        コメント
    </h5>
    <form method="post" action="<?php echo e(action('CommentsController@store', $post)); ?>" >
        <?php echo csrf_field(); ?>
        <div class="form-group mt-3">
                <input type="text" name="body" placeholder="コメントを入力" value="<?php echo e(old('body')); ?>" class="form-control border-info">
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
        <input type="submit" value="コメントする" class="btn btn-primary">
    </form>
    <table class="table table-striped table-hover mt-4">
        <tr>
            <th scope="col">
                コメント
            </th>
            <th scope="col">
                ユーザー
            </th>
            <?php if(auth()->guard()->check()): ?>
                <th scope="col">
                </th>
            <?php endif; ?>
        </tr>
        <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td>
                    <?php echo e($comment->body); ?>

                </td>
                <td class="text-secondary font-weight-bold">
                    <?php if(!$comment->user->image == null): ?>
                        <img src="data:image/png;base64,<?php echo e($comment->user->image); ?>" width="50" height="50">
                    <?php endif; ?>
                    <p>
                        <?php echo e(optional($comment->user)->name); ?>

                    </p>
                </td>
                <?php if(auth()->guard()->check()): ?>
                    <?php if($comment->user_id === $login_user_id): ?>
                        <td>
                            <?php echo $__env->make('layouts.modal_delete_comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </td>
                    <?php else: ?>
                        <td>
                        </td>
                    <?php endif; ?>
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <td class="mt-4">コメントがありません</td>
            </tr>
        <?php endif; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /work/backend/resources/views/posts/show.blade.php ENDPATH**/ ?>