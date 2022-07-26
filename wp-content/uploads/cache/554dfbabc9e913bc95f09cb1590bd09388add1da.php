
<?php if(get_sub_field('banner_card_block_title')): ?>
<div class="banner-section">
  <div class="container">
    <div class="row">
        <div class="card border-0 ms-0 ps-0">
          <div class="card-body">
            <?php if(get_sub_field('banner_card_block_title')): ?><h1 class="card-title text-uppercase"><?php echo e(get_sub_field('banner_card_block_title')); ?></h1><?php endif; ?> 
            <?php if(get_sub_field('banner_card_block_banner_content')): ?><p class="card-text"><?php echo e(get_sub_field('banner_card_block_banner_content')); ?></p><?php endif; ?> 
            <?php if(get_sub_field('banner_card_block_ctas')): ?> <a href="<?php echo e(get_sub_field('banner_card_block_ctas')['url']); ?>" class="btn btn-primary text-white"><?php echo e(get_sub_field('banner_card_block_ctas')['title']); ?></a> <?php endif; ?> 
          </div>
        </div>
    </div>
  </div>
</div>
<?php endif; ?>