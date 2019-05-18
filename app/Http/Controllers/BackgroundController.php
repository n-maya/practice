<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Color;


class BackgroundController extends Controller
{
    public function home(){
      $records = Color::orderBy('id', 'asc')->get();

      return view('background-switcher.home', ['records' => $records]);
    }

    public function switch(Request $request){

      $user = Color::firstOrNew(['id' => '1']);
      $user['hoge'] = 1;
      $user->save();

      }

}
