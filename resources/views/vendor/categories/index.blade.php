@extends('layouts.vendor.main')

@section('title')
   Categories
@endsection


@section('content')
<div class="container-fluid">
  <a href="/categories/create" class="btn btn-primary btn-sm mb-2">+ Categories</a>
  <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">status</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $category)
          <tr>
              <td>{{ $category->name }}</td>
              <td>{{ $category->status == 0 ? "Inactive" : "Active" }}</td>
              <td><a href="/vendor/categories/{{ $category->id }}" class="btn btn-primary btn-sm">Show</a></td>
              <td><a href="/vendor/categories/edit/{{ $category->id }}" class="btn btn-primary btn-sm">Edit</a></td>
            </tr>
          @endforeach
      </tbody>
  </table> 
</div>

  @push('head') 
  <script>
  </script>
  @endpush 

@endsection