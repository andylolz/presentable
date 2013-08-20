@extends('master')

@section('body-class')
slide-edit
@endsection

@section('content')
  <h2>Slide {{ $slide->number }}</h2>
  {{ \Form::open(array('method' => 'put', 'url' => \URL::action('SlideController@update', array($slide->presentation()->first()->slug, $slide->number)))) }}
    {{ \Form::textarea('contents', $slide->contents, array('style')) }}
    {{ \Form::button('Update', array('type' => 'submit', 'class' => 'btn btn-primary pull-right')) }}
  {{ \Form::close() }}
@endsection
