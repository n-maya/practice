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

  public function create()
  {
    return view('memos.create');
  }

  public function store(Request $request)
  {
    $params = $request->validate([
        'title' => 'required|max:50',
        'body' => 'required|max:2000',
    ]);

    Memo::create($params);

    return redirect()->route('top');
  }


  public function edit($memo_id)
  {
      $memo = Memo::findOrFail($memo_id);

      return view('memos.edit', [
          'memo' => $memo,
      ]);
  }

  public function update($memo_id, Request $request)
  {
      $params = $request->validate([
          'title' => 'required|max:50',
          'body' => 'required|max:2000',
      ]);

      $memo = Memo::findOrFail($memo_id);
      $memo->fill($params)->save();

      $memos = Memo::orderBy('created_at', 'desc')->get();

      return view('memos.index', ['memos' => $memos]);
  }

  public function destroy($memo_id)
  {
      $memo = Memo::findOrFail($memo_id);

      \DB::transaction(function () use ($memo) {
          $memo->delete();
      });

      return redirect()->route('top');
  }
}
