<?php
class AuthController extends BaseController {

   public function getLogin()
   {
      return View::make('admin.login');
   }

   public function postLogin()
   {
      $user_data = array(
         'email' => Input::get('email'),
         'password' => Input::get('password')
      );

      if(Auth::attempt($user_data))
      {
         return Redirect::to('admin/');
      }else{
         return $this->getLogin()->with('error', 'Usuario o contraseña incorrectos.');
      }
   }

   public function getWelcome()
   {
      if(Auth::check())
      {
         $user = Auth::user();
         return View::make('admin.bienvenida')->with('user', $user);
      }else{
         return $this->getLogin();
      }
   }

   public function getLogout()
   {
      if(Auth::check())
      {
         Auth::logout();
      }
      return Redirect::to('admin/login');
   }

}

?>