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
      $params = $request->validate([
          'id' => 'required',
          'topbar' => 'required',
          'body' => 'required',
      ]);

      $record = Color::findOrFail($params->id);
      $record->fill($params)->save();

      $records = Color::orderBy('id', 'asc')->get();
      return view('background-switcher.home', ['records' => $records]);
      }

}
