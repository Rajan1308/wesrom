
<?php if(get_sub_field('grid_blocks')): ?>
<div class="grid-section">
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4 text-center">
      <?php $__currentLoopData = get_sub_field('grid_blocks'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gridblock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
          <div class="card h-100 border-0">
            <div class="grid-icon">
              <img src="<?php echo e($gridblock['grid_block_icon']['url']); ?>" alt="<?php echo e($gridblock['grid_block_icon']['alt']); ?>" />
            </div>
            <div class="card-body pb-0">
              <p><?php echo e($gridblock['grid_content']); ?></p>
            </div>
            <div class="grid-cta">
              <a href="<?php echo e($gridblock['grid_ctas']['url']); ?>" class="btn btn-primary text-white"><?php echo e($gridblock['grid_ctas']['title']); ?></a>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php endif; ?>
