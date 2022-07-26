<header id="wrapper-navbar">
  <h2 id="main-nav-label" class="screen-reader-text">
    <?php esc_html_e( 'Main Navigation' ); ?>
  </h2>
  <nav class="navbar navbar-expand-md ">
    <div class="container-fluid">
      <a class="navbar-brand" rel="home" href="<?php echo e(home_url('/')); ?>" itemprop="url">
        <?php if(get_field('wesrom_option_logo', 'options')): ?>
          <img src="<?php echo e(get_field ('wesrom_option_logo', 'options')['url']); ?>" alt="<?php echo e(get_bloginfo('name', 'display')); ?>" />
        <?php else: ?>
          <?php echo e(get_bloginfo('name', 'display')); ?>

        <?php endif; ?>
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
        </svg>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
       
        <?php if(has_nav_menu('primary_navigation')): ?>
          <?php echo wp_nav_menu(['theme_location' => 'primary_navigation', 
          
          'menu_class'      => 'navbar-nav ml-auto',
          'fallback_cb'     => '',
          'menu_id'         => 'main-menu']); ?>

        <?php endif; ?>
        
      </div>
    </div>
  </nav>
</header>
