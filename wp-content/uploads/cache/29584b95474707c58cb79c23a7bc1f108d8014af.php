<?php
  $footer_widget = get_field('footer_widget', 'options');
  $address_widget_heading  = get_field('address_widget_heading', 'options');
  $address = get_field('address', 'options');
  $view_more_ctas = get_field('view_more_ctas', 'options');
  $address_widget_heading_socical = get_field('address_widget_heading_socical', 'options');
  $socical_media = get_field('socical_media', 'options');
?>

<footer class="container-fluid">
  <div class="container">
    <div class="row">
      <?php $__currentLoopData = $footer_widget; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 widget-col ">
          <h3><?php echo e($widget['widget_heading']); ?></h3>
          <ul>
            <?php $__currentLoopData = $widget['menu_link']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e($menu_link['menu_link_link']); ?>"><?php echo e($menu_link['menu_label']); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php if( $address_widget_heading ): ?>
        <div class="col-md-3 widget-col">
          <h3><?php echo e($address_widget_heading); ?></h3>
          <p><?php echo $address; ?></p>
          <?php if($view_more_ctas): ?> <p class="view-more-office-cta"><a href="<?php echo e($view_more_ctas['url']); ?>"><?php echo e($view_more_ctas['title']); ?> &#x2192;</a></p> <?php endif; ?>
        </div>
      <?php endif; ?>
      <?php if($address_widget_heading_socical): ?>
      <div class="col-md-3 widget-col">
        <h3><?php echo e($address_widget_heading_socical); ?></h3>
        <ul class="socical-links">
          <?php $__currentLoopData = $socical_media; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socical_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e($socical_link['socical_media_link']); ?>"><i class="<?php echo e($socical_link['font_awsome']); ?>"></i></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <?php endif; ?>
      
    </div>
  </div>
</footer>
