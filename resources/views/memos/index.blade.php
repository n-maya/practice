@extends('memos.layout')

@section('content')
    <div class="container mt-4">
    <div class="row">
        @foreach ($memos as $memo)
            <div class="mb-4 col-lg-4 ">
            <div class="card small">
                <div class="card-header h5">
                    {{ $memo->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {!! nl2br(e(str_limit($memo->body, 200))) !!}
                    </p>
                </div>
                <div class="card-footer">
                    <small class="mr-2">
                        投稿日時 {{ $memo->created_at->format('Y.m.d') }}
                    </small>
                </div>
            </div>
          </div>

        @endforeach
    </div>
    </div>
@endsection
