@extends('reminder.layout')

@section('content')

<div class="container-fluid">
<div class="row justify-content-center mt-4">
<div class="col-xs-12 col-md-5">

  <h3 class="text-center mb40 mt60">What is the plan??</h3>


  <fieldset class="mb-4 mt-4">
  <form method="POST" action="{{ route('reminder.store') }}">
      @csrf

          <div class="form-group">
          <div class="form-inline border-bottom">
              <label for="body">Plan&nbsp;&nbsp;&nbsp;:</label>
              <input
                  id="body"
                  name="body"
                  class="{{ $errors->has('body') ? 'is-invalid' : '' }} type mb-1 ml-1"
                  value="{{ old('body') }}"
                  type="text"
                  required
              >
              @if ($errors->has('body'))
                  <div class="invalid-feedback">
                      {{ $errors->first('body') }}
                  </div>
              @endif
          </div>

          <div class="form-group mt-3">
          <div class="form-inline border-bottom">
              <label for="email">Email&nbsp;:</label>
              <input
                  id="email"
                  name="email"
                  class="{{ $errors->has('email') ? 'is-invalid' : '' }} type mb-1 ml-1"
                  value="{{ old('email') }}"
                  type="text"
                  required
              >
              @if ($errors->has('email'))
                  <div class="invalid-feedback">
                      {{ $errors->first('email') }}
                  </div>
              @endif
          </div>
          </div>

          <div class="form-group">
            <div class="form-group">
            <div class="form-inline border-bottom">
                <label  for="date">Date&nbsp;&nbsp;:</label>
              <input
                  id="send_at"
                  name="send_at"
                  class="form-control {{ $errors->has('send_at') ? 'is-invalid' : '' }} type mb-1 ml-1 mt-2"
                  value="{{ old('send_at') }}"
                  type="datetime-local"
                  required
                  style="font-size:15px;"
              >
              @if ($errors->has('send_at'))
                  <div class="invalid-feedback">
                      {{ $errors->first('send_at') }}
                  </div>
              @endif
          </div>

          <div class="mt-5">
              <a class="btn btn-secondary" href="{{ url('/reminder/index') }}">
                  キャンセル
              </a>
              <button type="submit" class="btn btn-info">
                  作成する
              </button>
          </div>
  </form>
  </fieldset>

  <div class="col-xs-12">
    <h3 class="text-center mb40 mt60">We remind...</h3>
            @foreach ($reminds as $remind)
            <div class="card small mb-3" >

                <div class="card-body">
                    <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <p><u class="text-bold">Plan</u><p>
                        <p class="mb-3 card-text">{{ $remind->body }}</p>
                        <p><u class="text-bold">Email</u><p>
                        <p>{{ $remind->email }}</p>
                        <p><u class="text-bold">Date</u><p>
                        <p>{{ $remind->send_at }}</p>
                    </p>
                </div>

                <div class="card-footer">
                    <form
                    style="display: inline-block;"
                    method="POST"
                    action="{{ route('reminder.destroy', ['remind' => $remind]) }}"
                    >
                    @csrf
                    @method('DELETE')
                    <button class="ml-1 btn btn-outline-danger btn-sm">削除する</button>
                    </form>
                </div>
            </div>
            @endforeach

  </div>
</div>
</div>
</div>

@endsection
