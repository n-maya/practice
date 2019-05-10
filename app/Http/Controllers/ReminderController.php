<?php

namespace App\Http\Controllers;

use App\Remind;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    function index()
    {
        $reminds = Remind::get();

        return view('reminder/index', compact('reminds'));
    }

    public function store(Request $request)
    {
      $remind = new Remind();
      $remind->email   = $request->email;
      $remind->body    = $request->body;
      $remind->send_at = $request->send_at;
      $remind->save();

      return redirect(route('reminder'));
    }

    public function destroy($remind_id)
    {
        $remind = Remind::findOrFail($remind_id);

        \DB::transaction(function () use ($remind) {
            $remind->delete();
        });

        return redirect(route('reminder'));
    }

}
