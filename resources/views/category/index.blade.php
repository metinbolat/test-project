@extends('layouts.layout')
@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">Kategori</th>
    </tr>
  </thead>
  <tbody>
    @forelse($categories as $category)
    <tr>
        <td> {{$category->name}} </td>
    </tr>
    @empty
    <tr>
        <td> Hiç kategori bulunamadı. </td>
    </tr>
    @endforelse
  </tbody>
</table>

@endsection