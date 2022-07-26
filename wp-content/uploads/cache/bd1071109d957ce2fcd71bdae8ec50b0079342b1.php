<?php $__env->startSection('content'); ?>


<div class="card">
  <?php (new \Sober\Controller\Blade\Debugger(get_defined_vars())); ?>
  <h2 class="text-center"><?php echo e($post->post_title); ?></h2>
  <div class="cadr-body">
    <?php echo $post->post_content; ?>


    <?php echo e($user); ?>

  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>