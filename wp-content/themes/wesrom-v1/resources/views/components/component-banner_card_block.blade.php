
@if (get_sub_field('banner_card_block_title'))
<div class="banner-section">
  <div class="container">
    <div class="row">
        <div class="card border-0 ms-0 ps-0">
          <div class="card-body">
            @if (get_sub_field('banner_card_block_title'))<h1 class="card-title text-uppercase">{{ get_sub_field('banner_card_block_title') }}</h1>@endif 
            @if (get_sub_field('banner_card_block_banner_content'))<p class="card-text">{{ get_sub_field('banner_card_block_banner_content') }}</p>@endif 
            @if (get_sub_field('banner_card_block_ctas')) <a href="{{ get_sub_field('banner_card_block_ctas')['url'] }}" class="btn btn-primary text-white">{{ get_sub_field('banner_card_block_ctas')['title'] }}</a> @endif 
          </div>
        </div>
    </div>
  </div>
</div>
@endif