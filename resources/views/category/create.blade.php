@extends('layouts.layout')
@section('content')



<div class="col-5 mt-3">
    <h1>Yeni Kategori</h1>
</div>
@if(isset($status))
<div class="col-5 mt-5">
  <span class="text-{{$status['type']}}"> {{$status['message']}} </span>
</div>
@endif
<div class="col-5 mt-5">
<form method="post" action="{{ route('category.store') }}">
    @csrf
  <div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Kategori</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>
@endsection