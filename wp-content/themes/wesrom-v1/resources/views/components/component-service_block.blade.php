

<div class="service-section pb-4">
  <div class="container">
    <div class="row">
      <div class="col-md-13">
        <div class="card border-0">
          <div class="card-body ps-0">
            @if(get_sub_field('service_block_title'))<h2 class="card-title fw-bolder">{{ get_sub_field('service_block_title') }}</h2>@endif
            @if(get_sub_field('service_block_short_description'))<p class="card-text">{{ get_sub_field('service_block_short_description') }}</p>@endif
          </div>
        </div>
      </div>
    </div>
    <div class="service-card row row-cols-1 row-cols-md-3 g-4">
      @foreach (get_sub_field('service_block_services') as $serviceBlock)
      <div class="col pt-2">
        <div class="service-body card-body h-100 border-top border-5 rounded-0 border-primary">
          <div class="card-body">
            <h5 class="card-title fw-bolder">{{ get_the_title($serviceBlock->ID) }}</h5>
            <p class="card-text">{{ get_the_excerpt($serviceBlock->ID) }}</p>
            <a href="#" class="service-card-cta">LEARN MORE &xrarr;</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @if(get_sub_field('book_a_free_consultation'))
      <div class="text-center"><a href="{{ get_sub_field('book_a_free_consultation')['url']}}" class="btn btn-primary text-white mt-4">{{ get_sub_field('book_a_free_consultation')['title'] }}</a></div>
    @endif
  </div>
</div>
