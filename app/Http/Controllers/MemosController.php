<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memo;

class MemosController extends Controller
{
  public function index()
  {
      $memos = Memo::orderBy('created_at', 'desc')->get();

      return view('memos.index', ['memos' => $memos]);
  }
}
