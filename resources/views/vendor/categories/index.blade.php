@extends('layouts.app')

@section('title')
   Welcome | GetProduct 
@endsection


@section('content')
<a href="/categories/create" class="btn btn-primary btn-sm">+ Categories</a>
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
            <td>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox"  {{ $category->status ? "checked" : "" }} id="status-switch{{ $category->id }}">
              </div>
          </td>
            <td><a href="/categories/{{ $category->id }}" class="btn btn-primary btn-sm">Show</a></td>
            <td><a href="/categories/edit/{{ $category->id }}" class="btn btn-primary btn-sm">Edit</a></td>
          </tr>
        @endforeach
    </tbody>
  </table> 
  

  @push('head') 
  <script>
  </script>
  @endpush 

@endsection