@extends('approval.layout')

@section('content')

<div class="container-fluid">
<div class="row justify-content-center mt-4">
<div class="col-xs-12 col-md-9">

    <table class="table table-striped">
      <thread>
        <tr>
          <th>Comments</th>
          <th>Approval</th>
        </tr>
      </thread>

      <tbody>

        @forelse($comments as $comment)
          <tr>
            <td>{{$comment->comment}}</td>
            <td>
              <form action="{{url('toggle-approve')}}" method="POST">
                {{csrf_field()}}
                <input <?php if($comment->approve == 1) {echo "checked";} ?> type="checkbox" name="approve" >
                <input type="hidden" name="commentId" value="{{$comment->id}}">
                <input class="btn btn-info" type="submit" value="Done">
              </form>
            </td>
          </tr>
        @empty
          <h4>No Data</h4>
        @endforelse

      </tbody>
    </table>
</div>
</div>
</div>
@endsection
