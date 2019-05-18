@extends('background-switcher.layout')

@section('content')

<div class="container-fluid">
<div class="row justify-content-center mt-4">
<div class="col-xs-12 col-md-2">


  <h3 class="text-md-center mb40 mt60 ml-3 ml-md-0">Choose Color</h3>


  <fieldset class="mb-4 mt-4 ml-3">
    <form method="POST" action="{{ route('background.switch')}}">
        @csrf

            <div class="form-group" class=”form-inline”>

              <div>
                <label for="id">
                    ID
                </label>
                <select name="id">
                    @foreach ($records as $record)
                        <option value="{{ $record->id }}">{{$record->id}}</option>
                    @endforeach
                </select>
              </div>


              <div>

              <label for="topbar">
                  Topbar
              </label>

                <input
                    id="topbar"
                    name="topbar"
                    type="radio"
                    value="red"
                >赤

                <input
                    id="topbar"
                    name="topbar"
                    type="radio"
                    value="blue"
                >青

                <input
                    id="topbar"
                    name="topbar"
                    type="radio"
                    value="white"
                >白
            </div>


            <div>

            <label for="body">
                Body
            </label>

              <input
                  id="body"
                  name="body"
                  type="radio"
                  value="red"
              >赤

              <input
                  id="body"
                  name="body"
                  type="radio"
                  value="blue"
              >青

              <input
                  id="body"
                  name="body"
                  type="radio"
                  value="white"
              >白

          </div>

            <button type="submit" class="btn btn-primary">
                変更
            </button>


          </div>
          </form>
          </fieldset>
</div>
</div>
</div>
@endsection
