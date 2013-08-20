@extends('master')

@section('content')
  <h2>All presentations</h2>

  @if ($presentations)
  <table class="table table-striped">
    <thead>
      <th width="15%"></th>
      <th width="85%"></th>
    </thead>
    <tbody>
      @foreach ($presentations as $presentation)
      <tr>
        <td>
          {{ \Form::open(array('method' => 'delete', 'url' => \URL::action('PresentationController@destroy', array($presentation->slug)))) }}
            <div class="btn-group">
              <a href="{{ \URL::action('SlideController@show', array($presentation->slug, 1)) }}" class="btn"><i class="icon-search"></i></a>
              <a href="{{ \URL::action('SlideController@index', array($presentation->slug)) }}" class="btn"
              @if (Auth::guest())
                disabled="disabled"
              @endif
              ><i class="icon-pencil"></i></a>
              {{ \Form::button('<i class="icon-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-danger', 'disabled' => Auth::guest() ? true : null)) }}
            </div>
          {{ \Form::close() }}
        </td>
        <td>
          <h4><a href="{{ \URL::action('SlideController@index', array($presentation->slug)) }}">{{ $presentation->title }}</a></h4>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif

  @if (Auth::user())
  <a href="{{ \URL::action('PresentationController@create') }}" class="btn">Create</a>
  @endif
@endsection
