@extends('layouts.layout')
@section('content')

<div class="col-5 mt-3">
    <h1>Yeni Blog</h1>
</div>
<div class="col-5 mt-5">
<form method="post" action="{{ route('blog.store') }}">
    @csrf
  <div class="row mb-3">
    <label for="title" class="col-sm-2 col-form-label">Başlık</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title" name="title">
    </div>
  </div>
  <div class="row mb-3">
    <label for="slug" class="col-sm-2 col-form-label">Kalıcı Bağlantı</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="slug" name="slug">
    </div>
    <label for="category" class="col-sm-2 col-form-label">Başlık</label>
    <div class="col-sm-4">
      <select name="category" id="category">
        @forelse($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @empty
        <option value="">Kategori Bulunamadı</option>
        @endforelse
      </select>
    </div>
  </div>
  
  <div class="row mb-3">
  <label for="body" class="col-sm-2 col-form-label">İçerik</label>
  <div class="col-sm-10">
      <textarea class="form-control" id="body" name="body"> </textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
</div>
@endsection