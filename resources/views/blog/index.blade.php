@extends('layouts.layout')
@section('content')

<div class="col-4 mt-2">
    <a href="{{ route('blog.create')}}" class="btn btn-success">Yeni </a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Başlık</th>
      <th scope="col">Kategori</th>
      <th scope="col">Tarih</th>
      <th scope="col">Eylemler</th>
    </tr>
  </thead>
  <tbody>
    @forelse($blogs as $blog)
    <tr>
        <td>{{ $blog->title }}</td>
      <td>{{ $blog->category->name }}</td>
      <td>{{ $blog->created_at }}</td>
      <td><a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-primary">Düzenle</a></td>
      <td>
        <form method="post" action="{{ route('blog.delete', $blog->id) }}">
            @csrf
        <button type="submit" class="btn btn-danger">Sil</button>
        </form>
      </td>
      @empty
      @endforelse
    </tr>
  </tbody>
</table>

@endsection