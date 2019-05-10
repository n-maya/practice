@extends('memos.layout')

@section('content')

    <div class="container mt-4">

      <a href="{{ route('memos.create') }}" class="btn btn-primary mb-2">
          メモを新規作成する
      </a>

    <div class="row">
        @foreach ($memos as $memo)
            <div class="mb-4 col-lg-4">
            <div class="card small" >
                <div class="card-header h5" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{ $memo->title }}
                </div>

                <div class="card-body">
                    <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        {!! nl2br(e(str_limit($memo->body, 200))) !!}
                    </p>
                </div>
                <div class="card-footer">
                    <small class="mr-2">
                        作成日時 {{ $memo->created_at->format('Y.m.d') }}
                    </small>
                    <a class="ml-1 btn btn-outline-primary btn-sm" href="{{ route('memos.edit', ['memo' => $memo]) }}" >
                        編集
                    </a>

                    <form
                    style="display: inline-block;"
                    method="POST"
                    action="{{ route('memos.destroy', ['memo' => $memo]) }}"
                    >
                    @csrf
                    @method('DELETE')

                    <button class="ml-1 btn btn-outline-danger btn-sm">削除する</button>
                    </form>
                </div>
            </div>
          </div>

        @endforeach
    </div>
    </div>
@endsection
