<?php

class AuthController extends Controller {
  public function login()
  {
    return View::make('login');
  }

  public function authenticate()
  {
    $user = array(
      'email' => Input::get('email'),
      'password' => Input::get('password'),
    );

    if (Auth::attempt($user)) {
      return Redirect::intended(\URL::action('PresentationController@index'));
    }

    return Redirect::action('AuthController@login')
      ->withInput();
  }

  public function logout()
  {
    Auth::logout();
    return Redirect::action('AuthController@login');
  }
}
