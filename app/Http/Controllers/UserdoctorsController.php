<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class UserdoctorsController extends Controller
{
   use AuthenticatesUsers;

   protected $loginView = 'userdoctors.login';

   protected $guard = 'doctors';

   

   public function authenticated()
   {
   	return redirect()->route('hojas.index');
   }
   public function logout()
   {
   	\Auth::guard('doctors')->logout();
   	return view('home');
   }
}
