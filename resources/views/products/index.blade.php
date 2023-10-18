@extends('layouts.admin')

@section('title', 'Админ панель: Товары')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        Product
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right">Create
                            product</a>
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
                                    <th>img</th>
                                    <th>Product Name</th>
                                    <th>price</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            @foreach ($product->imgs as $img)
                                                <img style="height: 50px;" src="{{asset('storage/productsImage/').'/'.$img->file_name}}">
                                            @endforeach
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>

                                        <td>
                                            <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}"
                                                class="btn btn-xs btn-info">Edit</a>
                                            <form
                                                action="{{ route('admin.products.destroy', ['product' => $product->id]) }}"
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
