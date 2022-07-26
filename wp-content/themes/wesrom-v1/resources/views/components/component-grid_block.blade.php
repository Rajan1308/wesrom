
@if(get_sub_field('grid_blocks'))
<div class="grid-section">
  <div class="container">
    <div class="row row-cols-1 row-cols-md-2 g-4 text-center">
      @foreach (get_sub_field('grid_blocks') as $gridblock )
        <div class="col">
          <div class="card h-100 border-0">
            <div class="grid-icon">
              <img src="{{ $gridblock['grid_block_icon']['url'] }}" alt="{{ $gridblock['grid_block_icon']['alt'] }}" />
            </div>
            <div class="card-body pb-0">
              <p>{{ $gridblock['grid_content'] }}</p>
            </div>
            <div class="grid-cta">
              <a href="{{ $gridblock['grid_ctas']['url'] }}" class="btn btn-primary text-white">{{ $gridblock['grid_ctas']['title'] }}</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endif
