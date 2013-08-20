@extends('master')

@section('content')
  <h2>Create a presentation</h2>

  {{ \Form::open(array('method' => 'post', 'url' => \URL::action('PresentationController@store'), 'class' => 'form-horizontal')) }}

    {{ \Form::label('title', 'Title') }}
    {{ \Form::text('title', null, array('placeholder' => 'e.g. my awesome presentation')) }}

    {{ \Form::button('Submit', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
  {{ \Form::close() }}
@endsection
