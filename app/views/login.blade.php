@extends('home')

@section('subheading')
{{ \Form::open(array('url' => \URL::action('AuthController@authenticate'))) }}
  {{ Form::text('email', \Input::old('email'), array('placeholder' => 'Email')) }}
  <br>
  {{ Form::password('password', array('placeholder' => 'Password')) }}
  <br>
  {{ Form::button('Submit', array('type' => 'submit')) }}
{{ \Form::close() }}
@endsection
