<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow-sm">
  <a class="navbar-brand text-warning ml-md-5 pl-md-5" href="<?php echo e(url('/')); ?>">
    <?php echo e(config('app.name', 'MyTop3')); ?>

  </a>
  <!-- Navbar content -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"      aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto">
    
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto mr-md-5 pr-md-5">
      <!-- Authentication Links -->
      <?php if(auth()->guard()->guest()): ?>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
        </li>
        <?php if(Route::has('register')): ?>
          <li class="nav-item mr-md-4">
            <a class="nav-link text-light" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
            <a class="nav-link text-warning" href="<?php echo e(route('admin.login')); ?>"><?php echo e(__('Admin')); ?></a>
        </li>
      <?php else: ?>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo e(route('profile_image')); ?>">
              <?php echo e(__('Profile')); ?>

            </a>
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              <?php echo e(__('Logout')); ?>

            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
              <?php echo csrf_field(); ?>
            </form>
          </div>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav><?php /**PATH /work/backend/resources/views/layouts/nav.blade.php ENDPATH**/ ?>