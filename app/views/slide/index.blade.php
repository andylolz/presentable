@extends('master')

@section('content')
  <h2>&ldquo;{{ $presentation->title }}&rdquo; &ndash; Overview</h2>

  <ul class="thumbnails">
    @foreach ($presentation->slides as $slide)
    <li class="span2">
      <div class="thumbnail">
        <div class="caption">
          <h3>Slide {{ $slide->number }}</h3>
          <p>{{{ substr($slide->contents, 0, 30) }}}&hellip;</p>
          {{ \Form::open(array('method' => 'delete', 'url' => \URL::action('SlideController@destroy', array($presentation->slug, $slide->number)))) }}
            <div class="btn-group">
              <a href="{{ \URL::action('SlideController@show', array($presentation->slug, $slide->number)) }}" class="btn"><i class="icon-search"></i></a>
              <a href="{{ \URL::action('SlideController@edit', array($presentation->slug, $slide->number)) }}" class="btn"
              @if (Auth::guest())
                disabled="disabled"
              @endif
              ><i class="icon-pencil"></i></a>
              {{ \Form::button('<i class="icon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'disabled' => Auth::guest() ? true : null)) }}
            </div>
          {{ \Form::close() }}
        </div>
      </div>
    </li>
    @endforeach

    @if (Auth::check())
    <li class="span2">
      <div class="thumbnail">
        <div class="caption">
          {{ \Form::open(array('url' => \URL::action('SlideController@store', array($presentation->slug)))) }}
            {{ \Form::button('Add a slide', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
          {{ \Form::close() }}
        </div>
      </div>
    </li>
    @endif
  </ul>
@endsection
