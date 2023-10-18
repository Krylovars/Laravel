@extends('layouts.admin')

@section('title', 'Админ панель: Категории')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Categories
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary float-right">Create
                            category</a>
                    </div>

                    <div class="card-body">
                        @if (session()->get('text'))
                            <div class="alert alert-success">
                                {{ session()->get('text') }}
                            </div>
                        @endif


                        @if (session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif


                        @if (session()->get('fail'))
                            <div class="alert alert-success">
                                {{ session()->get('fail') }}
                            </div>
                        @endif


                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Parent Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->parent)
                                                {{ $category->parent->name }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                                                class="btn btn-xs btn-info">Edit</a>
                                            <form
                                                action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}"
                                                method="POST" style="display: inline-block;">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-xs btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
