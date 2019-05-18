@extends('calendar.layout')

@section('content')
        <div class="container">

          <a href="" class="btn btn-primary mb-2">
              予定を新規作成
          </a>

            <div class="panel panel-primary">
              <div class="panel-heading">MY Event Details</div>
              <div class="panel-body" >
                  {!! $calendar_details->calendar() !!}
              </div>
            </div>

            </div>
@endsection
