@extends('gallery.layout')

@section('content')
<form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="file" name="file">
  <button type="submit">保存</button>
</form>
@endsection
