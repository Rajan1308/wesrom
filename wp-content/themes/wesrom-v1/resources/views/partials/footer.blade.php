@php
  $footer_widget = get_field('footer_widget', 'options');
  $address_widget_heading  = get_field('address_widget_heading', 'options');
  $address = get_field('address', 'options');
  $view_more_ctas = get_field('view_more_ctas', 'options');
  $address_widget_heading_socical = get_field('address_widget_heading_socical', 'options');
  $socical_media = get_field('socical_media', 'options');
@endphp

<footer class="container-fluid">
  <div class="container">
    <div class="row">
      @foreach ($footer_widget as $widget)
        <div class="col-md-3 widget-col ">
          <h3>{{ $widget['widget_heading'] }}</h3>
          <ul>
            @foreach ($widget['menu_link'] as  $menu_link)
            <li><a href="{{ $menu_link['menu_link_link'] }}">{{ $menu_link['menu_label'] }}</a></li>
            @endforeach
          </ul>
        </div>
      @endforeach
      @if ( $address_widget_heading )
        <div class="col-md-3 widget-col">
          <h3>{{ $address_widget_heading }}</h3>
          <p>{!! $address !!}</p>
          @if ($view_more_ctas) <p class="view-more-office-cta"><a href="{{ $view_more_ctas['url'] }}">{{ $view_more_ctas['title'] }} &#x2192;</a></p> @endif
        </div>
      @endif
      @if ($address_widget_heading_socical)
      <div class="col-md-3 widget-col">
        <h3>{{ $address_widget_heading_socical }}</h3>
        <ul class="socical-links">
          @foreach ( $socical_media as  $socical_link)
          <li><a href="{{ $socical_link['socical_media_link'] }}"><i class="{{ $socical_link['font_awsome'] }}"></i></a></li>
          @endforeach
        </ul>
      </div>
      @endif
      
    </div>
  </div>
</footer>
