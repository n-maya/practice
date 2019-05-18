<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request){

      $request->validate([
          'comment' => 'required',
      ]);

      $comment=new Comment();
      $comment->comment=$request->comment;
      $comment->save();

      return back();
    }

    public function approval(Request $request){

      $comment=Comment::find($request->commentId);
      $approveVal=$request->approve;
      if($approveVal=='on'){
         $approveVal = 1;
      } else{
         $approveVal = 0;
      }

      $comment->approve=$approveVal;
      $comment->save();

      return redirect('/approval/front');
    }

}
