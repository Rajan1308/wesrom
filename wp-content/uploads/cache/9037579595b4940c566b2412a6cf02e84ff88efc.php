

<div class="service-section pb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-13">
        <div class="card border-0">
          <div class="card-body ps-0">
            <?php if(get_sub_field('service_block_title')): ?><h2 class="card-title fw-bolder"><?php echo e(get_sub_field('service_block_title')); ?></h2><?php endif; ?>
            <?php if(get_sub_field('service_block_short_description')): ?><p class="card-text"><?php echo e(get_sub_field('service_block_short_description')); ?></p><?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="service-card row row-cols-1 row-cols-md-3 g-4">
      <?php $__currentLoopData = get_sub_field('service_block_services'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceBlock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col pt-2">
        <div class="service-body card-body h-100 border-top border-5 rounded-0 border-primary">
          <div class="card-body">
            <h5 class="card-title fw-bolder"><?php echo e(get_the_title($serviceBlock->ID)); ?></h5>
            <p class="card-text"><?php echo e(get_the_excerpt($serviceBlock->ID)); ?></p>
            <a href="<?php echo e(get_the_permalink($serviceBlock->ID)); ?>" class="service-card-cta"><?php echo _e('LEARN MORE', 'wesrom'); ?> &xrarr;</a>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php if(get_sub_field('book_a_free_consultation')): ?>
      <div class="text-center"><a href="<?php echo e(get_sub_field('book_a_free_consultation')['url']); ?>" class="btn btn-primary text-white mt-4"><?php echo e(get_sub_field('book_a_free_consultation')['title']); ?></a></div>
    <?php endif; ?>
  </div>
</div>
