@extends('approval.layout')

@section('content')

<div class="container-fluid">
<div class="row justify-content-center mt-4">
<div class="col-xs-12 col-md-5">

  <h3 class="text-center mb40 mt60">Comment Here</h3>
  <hr>

        <form action="{{url('/commentApproval')}}" method="POST" class="mt-5 mb-5">
          {{csrf_field()}}

          <div class="form-group">
          <label for="comment">White Comment</label>
            <input class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" placeholder="Write comment" type="text" >
            @if ($errors->has('comment'))
                <div class="invalid-feedback">
                    {{ $errors->first('comment') }}
                </div>
            @endif
          </div>

          <input class="btn btn-info mt-3 float-right" type="submit" value="Send to Approver">
        </form>

        <div style="height:30px;"></div>

        <a href="/approval/dash" class="btn btn-info float-right" >Approval Dashboard</a>

        <div style="height:70px;"></div>

  <h3 class="text-center mb40 mt60">Approved Comments</h3>
  <hr>
        <ol>
          @forelse ($comments as $comment)
            <li class="lead">{{$comment->comment}}</li>
          @empty
            <h4>No Comments</h4>
          @endforelse
        </ol>
</div>
</div>
</div>
@endsection
