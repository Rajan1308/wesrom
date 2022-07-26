{{--
  Template Name: Home Template
--}}

@extends('layouts.app')

@section('content')
  @if( have_rows('flexible_content_blocks') )
		@php
			$rowCount = count( get_field( 'flexible_content_blocks' ) );
		@endphp
    @while ( have_rows('flexible_content_blocks') )
      @php the_row() @endphp
				
      @if( get_row_layout() == 'banner_card_block' )
        @include('components.component-banner_card_block')
      @elseif( get_row_layout() == 'grid_block' )
        @include('components.component-grid_block')
      @elseif( get_row_layout() == 'service_block' )
        @include('components.component-service_block')

      @elseif( get_row_layout() == 'faq' )
        @include('components.component-faq')
      @elseif( get_row_layout() == 'try_outout' )
        @include('components.component-try-outout')
      @endif

    @endwhile
  @endif
@endsection
