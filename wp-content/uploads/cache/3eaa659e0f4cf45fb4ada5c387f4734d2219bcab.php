<?php $__env->startSection('content'); ?>
  <?php if( have_rows('flexible_content_blocks') ): ?>
    <?php while( have_rows('flexible_content_blocks') ): ?>
      <?php the_row() ?>
				
      <?php if( get_row_layout() == 'banner_card_block' ): ?>
        <?php echo $__env->make('components.component-banner_card_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php elseif( get_row_layout() == 'grid_block' ): ?>
        <?php echo $__env->make('components.component-grid_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php elseif( get_row_layout() == 'service_block' ): ?>
        <?php echo $__env->make('components.component-service_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


      
      <?php endif; ?>

    <?php endwhile; ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>