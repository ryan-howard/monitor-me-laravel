<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

//   public function createToken () {
//     $user       = Auth::user();
//     $userTokens = $user->tokens;

//     foreach($userTokens as $token) {
//       $token->revoke();
//     }

//     $token = $user->createToken('developer')->accessToken;

//     return response()->json(array('personal_access_token'=>$token), 200);
//   }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('pressure_chart');
  }
}
