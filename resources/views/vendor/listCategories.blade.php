@extends('layouts.vendor.main')

@section('title')
    Vendor Dashboard
@endsection


@section('content')
<div class="container-fluid">
    <a href="/vendor/categories/create" class="btn btn-primary btn-sm mb-2">+ Categories</a>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td><a href="/vendor/categories/{{ $category->id }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-eye"></i></a></td>
                        <td><a href="/vendor/categories/edit/{{ $category->id }}" class="btn btn-primary btn-sm"><i class="fa-sharp fa-solid fa-user-pen"></i></a></td>
                        <td><a href="/vendor/categories/status/edit/{{ $category->id }}"
                                class=""><i class="fa-solid fa-toggle-{{ $category->status ? 'on' : 'off' }} fa-2xl"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection