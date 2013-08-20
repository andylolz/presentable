@extends('master')

@section('body-class')
slide-show
@endsection

@section('extra-css')
<!-- Use a big text version of the bootstrap css -->
<link href="/bootstrap/css/giant-bootstrap.css" rel="stylesheet">
@endsection

@section('extra-js')
<script>
$(function() {
  $('.slide-show li').hide();

  $('.slide-show').keydown(function(event) {
    @if (Auth::user())
    if(event.which == 27) {
      // escape
      window.location.href = "{{ \URL::action('SlideController@edit', array($presentation->slug, $slide->number)) }}";
    }
    @endif

    if(event.which == 37) {
      // left arrow
      el = $('.slide-show li:visible').last();
      if(el.length == 0) {
        window.location.href = "{{ \URL::action('SlideController@show', array($presentation->slug, $slide->number - 1)) }}";
      } else {
        el.hide();
      }
    }
    if(event.which == 39) {
      // right arrow
      el = $('.slide-show li:hidden').first();
      if(el.length == 0) {
        window.location.href = "{{ \URL::action('SlideController@show', array($presentation->slug, $slide->number + 1)) }}";
      } else {
        el.show();
      }
    }
  });
});
</script>
@endsection

@section('navbar')
{{-- Remove the navbar --}}
@endsection

@section('content')
{{ $rendered_contents }}
@endsection
